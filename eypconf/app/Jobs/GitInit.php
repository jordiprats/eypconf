<?php

namespace App\Jobs;

use App\Platform;

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

    if(User::where('id', $this->plaftorm->user_id)->count() == 1)
    {
      $this->user = User::where('username', $username)->first();
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
    if($this->user==NULL) throw new Exception ('user is NULL');

    if($this->platform->status==0)
    {
      // creem contenidor de dades
      // docker run -d -n $platform->id -t eyp/git-repo
      echo "nou container dades: ".exec("docker run -d --name platformid_".$this->platform->id." -t eyp/git-repo")."\n";

      //inicialitzem estructura
      echo "template: ".exec("docker run --volumes-from platformid_".$this->platform->id." -t eyp/git-repo /bin/bash /usr/local/bin/init.repo.sh ".$this->platform->platform_name." ".'demo')."\n";

      // creem repo pel contenidor
      echo "repo init: ".exec("docker run --volumes-from platformid_".$this->platform->id." -t eyp/git git -C /repo init")."\n";

      // afegim tots els fitxers
      echo "add all: ".exec("docker run --volumes-from platformid_".$this->platform->id." -t eyp/git git -C /repo add --all")."\n";

      // commit inicial
      echo "commit template: ".exec("docker run --volumes-from platformid_".$this->platform->id." -t eyp/git git -C /repo commit -m 'template'")."\n";

      $this->platform->status++;

      $this->platform->save();
    }
  }
}
