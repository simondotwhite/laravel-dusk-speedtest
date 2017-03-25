<?php

namespace Tests\Browser;

use Tests\Browser\Pages\SpeedTestNoLogin;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SpeedTestNoLoginTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testSpeedTest()
    {
	    $this->browse(function ($browser) {
            $browser->visit(new SpeedTestNoLogin());
        });
    }
}
