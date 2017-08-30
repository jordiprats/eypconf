<?php

namespace App\Jobs;

use App\Platform;
use App\User;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateNewItem implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  protected $platform;
  protected $user;
  protected $type;
  protected $name;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct(Platform $platform, string $type, string $name)
  {
    $this->platform = $platform;
    $this->type = $type;
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
    if($this->platform==NULL) throw new Exception ('platform is NULL');
    if($this->user==NULL)     throw new Exception ('user is NULL');

    if($this->platform->status==Platform::BUILD_STATE)
      throw new Exception ('platform\'s git have not been created yet');
  }
}
