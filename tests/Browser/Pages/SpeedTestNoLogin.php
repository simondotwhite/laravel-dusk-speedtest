<?php

namespace Tests\Browser\Pages;

use App\SpeedTestHistory;
use Laravel\Dusk\Browser;

class SpeedTestNoLogin extends Page
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
        if(!empty(env('SPEEDTEST_EMAIL')) || !empty(env('SPEEDTEST_PASSWORD'))) {
            return;
        }

        \Log::info('SpeedTest Started');
        
        $browser->waitFor('.start-text', 30)
            ->press('.start-text')
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

        \Log::info('SpeedTest Finished');
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
