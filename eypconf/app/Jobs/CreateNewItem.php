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
    $this->dir = $dir;
    $this->name = $name;

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
    echo "0\n";
    if($this->platform==NULL) throw new Exception ('platform is NULL');
    if($this->user==NULL)     throw new Exception ('user is NULL');

    echo "a\n";

    if($this->platform->status==Platform::BUILD_STATE)
      throw new Exception ('platform\'s git have not been created yet');
    echo "b\n";

    echo 'dir: /repo/'.$this->dir.'/'.$this->name."\n";

    //creem nou item

    // afegim tots els fitxers
    $cmd="docker run -i --volumes-from platformid_".$this->platform->id." -t eyp/git git -C /repo add --all";
    echo "add all /".$cmd."/: ".exec($cmd)."\n";

    // commit inicial
    $cmd="docker run -i --volumes-from platformid_".$this->platform->id." -t eyp/git git -C /repo commit -m 'template'";
    echo "commit template /".$cmd."/: ".exec($cmd)."\n";
  }
}
