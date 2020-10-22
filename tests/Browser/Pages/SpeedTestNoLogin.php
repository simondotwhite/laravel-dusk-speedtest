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


        $browser
            // Cookie notice
            ->waitFor('#_evidon-banner-acceptbutton', 30)
            ->press('#_evidon-banner-acceptbutton')

            // Rest of the test
            ->waitFor('.start-text', 30)
            ->press('.start-text')
            ->waitFor('.result-container-meta', 300)
            ->screenshot('SpeedTest');

        $sponsor = $browser->text('.js-data-sponsor');
        $location = $browser->text('.js-sponsor-name');
        $ping = $browser->text('.ping-speed');
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
