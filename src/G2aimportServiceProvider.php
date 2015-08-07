<?php

namespace Zborowski\G2aimport;

use Illuminate\Support\ServiceProvider;

class G2aimportServiceProvider extends ServiceProvider
{


     protected $commands = [
        'Zborowski\G2aimport\ImportG2ACommand'
    ];

    public function boot()
    {
      $this->publishes([
          __DIR__.'/migrations/' => database_path('migrations')
      ], 'migrations');
    }

    public function register()
    {
        $this->commands($this->commands);
    }
}
