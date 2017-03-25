<?php

namespace Tests\Browser\Pages;

use App\SpeedTestHistory;
use Illuminate\Support\Facades\Log;
use Laravel\Dusk\Browser;

class SpeedTest extends Page
{
    public function url()
    {
        return 'https://beta.speedtest.net';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @return void
     */
    public function assert(Browser $browser)
    {
        if(empty(env('SPEEDTEST_EMAIL')) || empty(env('SPEEDTEST_PASSWORD'))) {
            return;
        }

        Log::info('Logged in SpeedTest Started');

        $browser->visit('https://beta.speedtest.net/results')
            ->waitFor('#login-link', 30)
            ->press('#login-link')
            ->type('#login-email', env('SPEEDTEST_EMAIL'))
            ->type('#login-password', env('SPEEDTEST_PASSWORD'))
            ->press('#login-button')
            ->waitFor('.start-text', 30)
            ->press('.start-text')
            ->waitfor('.download-speed', 300)
            ->waitFor('.survey-label', 300)
            ->screenshot('SpeedTest');

        $sponsor = $browser->text('.sponsor-name');
        $location = $browser->text('.location');
        $ping = $browser->text('#ping-value');
        $download = $browser->text('.download-speed');
        $upload = $browser->text('.upload-speed');

       SpeedTestHistory::create([
            'sponsor' => $sponsor,
            'location' => $location,
            'ping' => $ping,
            'download' => $download,
            'upload' => $upload,
        ]);

        Log::info('SpeedTest Finished');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
