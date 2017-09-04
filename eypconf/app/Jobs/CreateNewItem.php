<?php

namespace App\Jobs;

use App\Platform;
use App\User;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateNewItem implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  protected $platform;
  protected $user;
  protected $dir;
  protected $name;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct(Platform $platform, string $dir, string $name)
  {
    $this->platform = $platform;
    $this->dir = escapeshellcmd($dir);
    $this->name = escapeshellcmd($name);

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
      throw new Exception ('platform\'s git have not been created yet');

    echo 'mkdir: /repo/'.$this->dir.'/'.$this->name."\n";

    //creem nou item
    $cmd="docker run -i --volumes-from platformid_".$this->platform->id." -t eyp/git mkdir -p '/repo/".$this->dir.'/'.$this->name."'";
    echo "mkdir /".$cmd."/: ".exec($cmd)."\n";

    //gitkeep
    $cmd="docker run -i --volumes-from platformid_".$this->platform->id." -t eyp/git touch '/repo/".$this->dir.'/'.$this->name."/.gitkeep'";
    echo "gitkeep /".$cmd."/: ".exec($cmd)."\n";

    // afegim tots els fitxers
    $cmd="docker run -i --volumes-from platformid_".$this->platform->id." -t eyp/git git -C /repo add --all";
    echo "add all /".$cmd."/: ".exec($cmd)."\n";

    // commit inicial
    $cmd="docker run -i --volumes-from platformid_".$this->platform->id." -t eyp/git git -C /repo commit -m 'mkdir ".$this->dir.' // '.$this->name."'";
    echo "commit template /".$cmd."/: ".exec($cmd)."\n";

    echo "\nCHECKS\n======\n\n";

    $returncode=666;
    $output=[];
    $cmd="docker run -i --volumes-from platformid_".$this->platform->id." -t eyp/git git -C /repo status";
    echo "git status/".$cmd."/: ".exec($cmd, $output, $returncode)."\n";
    if($returncode!=0) throw new Exception ('error git status'); else echo "git OK\n";

    $returncode=666;
    $output=[];
    $cmd="docker run -i --volumes-from platformid_".$this->platform->id." -t eyp/git [ -f '/repo/".$this->dir.'/'.$this->name."/.gitkeep' ]";
    echo "gitkeep and directory precense/".$cmd."/: ".exec($cmd, $output, $returncode)."\n";
    if($returncode!=0) throw new Exception ('mkdir failed'); else echo "mkdir ok\n";

    //TODO: per un update del estat del canvi
  }
}
