<?php

namespace Tests\Browser;

use Tests\Browser\Pages\SpeedTest;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SpeedTestTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testSpeedTest()
    {
	    $this->browse(function ($browser) {
            $browser->visit(new SpeedTest());
        });
    }
}
