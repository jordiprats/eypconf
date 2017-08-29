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

    if($this->platform->status==0)
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

      //TODO: check del q s'ha fet

      $this->platform->status++;

      $this->platform->save();
    }
  }
}
