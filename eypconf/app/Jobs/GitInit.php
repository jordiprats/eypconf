<?php

namespace App\Jobs;

use App\Platform;
use App\User;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GitInit implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  protected $platform;
  protected $user;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct(Platform $platform)
  {
    $this->platform = $platform;

    if(User::where('id', $platform->user_id)->count() == 1)
    {
      $this->user = User::where('id', $platform->user_id)->first();
    }
    else
    {
      $this->platform=NULL;
      $this->user=NULL;
    }
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    if($this->platform==NULL) throw new Exception ('platform is NULL');
    if($this->user==NULL)     throw new Exception ('user is NULL');

    if($this->platform->status==Platform::BUILD_STATE)
    {
      // creem contenidor de dades
      // docker run -d -n $platform->id -t eyp/git-repo
      $cmd="docker run -d --name platformid_".$this->platform->id." -t eyp/git-repo";
      echo "nou container dades /".$cmd."/: ".exec($cmd)."\n";

      //inicialitzem estructura
      $cmd="docker run -i --volumes-from platformid_".$this->platform->id." -t eyp/git-repo /bin/bash /usr/local/bin/init.repo.sh \"".$this->platform->platform_name."\" \"".$this->user->username."\"";
      echo "creant estructura /".$cmd."/: ".exec($cmd)."\n";

      // creem repo pel contenidor
      $cmd="docker run -i --volumes-from platformid_".$this->platform->id." -t eyp/git git -C /repo init";
      echo "repo init /".$cmd."/: ".exec($cmd)."\n";

      // afegim tots els fitxers
      $cmd="docker run -i --volumes-from platformid_".$this->platform->id." -t eyp/git git -C /repo add --all";
      echo "add all /".$cmd."/: ".exec($cmd)."\n";

      // commit inicial
      $cmd="docker run -i --volumes-from platformid_".$this->platform->id." -t eyp/git git -C /repo commit -m 'template'";
      echo "commit template /".$cmd."/: ".exec($cmd)."\n";

      echo "\nCHECKS\n======\n\n";

      //is git repo?
      $returncode=666;
      $output=[];
      $cmd="docker run -i --volumes-from platformid_".$this->platform->id." -t eyp/git git -C /repo status";
      echo "git status/".$cmd."/: ".exec($cmd, $output, $returncode)."\n";
      if($returncode!=0) throw new Exception ('not a valid git repo'); else echo "git OK\n";

      //check README.md
      $returncode=666;
      $output=[];
      $cmd="docker run -i --volumes-from platformid_".$this->platform->id." -t eyp/git [ -f /repo/README.md ]";
      echo "readme precense/".$cmd."/: ".exec($cmd, $output, $returncode)."\n";
      if($returncode!=0) throw new Exception ('README.md absent'); else echo "README.md OK\n";

      $this->platform->setStatus($this->platform->status+1);
    }
    else throw new Exception ('the fuck are you talking about?');
  }
}
