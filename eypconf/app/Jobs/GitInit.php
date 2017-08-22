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

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct(Platform $platform)
  {
    $this->platform = $platform;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    // creem contenidor de dades
    // docker run -d -n $platform->id -t eyp/git-repo
    echo exec("docker run -d --name platformid_".$this->platform->id." -t eyp/git-repo");

    // creem repo pel contenidor
    echo exec("docker run --volumes-from platformid_".$this->platform->id." -t eyp/git git -C /repo init");
  }
}
