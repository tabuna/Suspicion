<?php

declare(strict_types=1);

namespace Orchid\Suspicion\Tests;

use Jenssegers\Agent\Agent;
use Orchid\Suspicion\History;
use Orchid\Suspicion\Suspicion;
use PHPUnit\Framework\TestCase;

/**
 * Class SuspicionTest
 */
class SuspicionTest extends TestCase
{
    /**
     * @dataProvider exampleDataProvider
     */
    public function testCanSuspicion(History $history): void
    {
        $_SERVER['HTTP_CLIENT_IP'] = '82.254.254.196';
        $suspicion                 = new Suspicion($this->getMyAgent());

        $result = $suspicion->analyze($history);


        $this->assertEquals($result, -20);
    }

    /**
     * @return Agent
     */
    private function getMyAgent()
    {
        $agent = new Agent();
        $agent->setUserAgent('Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36');
        return $agent;
    }


    /**
     * @return array
     */
    public function exampleDataProvider()
    {
        return [
            [
                new History(
                    'Opera/9.80 (Windows NT 6.0; U; Distribution 00; ru) Presto/2.10.289 Version/12.02',
                    '82.254.254.196',
                    '2000-00-01 17:16:18'
                ),
            ],
        ];
    }

}



