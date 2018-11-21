<?php

declare(strict_types=1);

namespace Orchid\Suspicion\Rules;


use Orchid\Suspicion\BaseRule;
use Orchid\Suspicion\History;
use Orchid\Suspicion\RuleContract;
use IPTools\IP;
use IPTools\Network;
use IPTools\Range;

/**
 * Class IpRule
 */
class IpRule extends BaseRule implements RuleContract
{

    /**
     * @param History $history
     *
     * @return int
     * @throws \Exception
     */
    public function check(History $history): int
    {
        if ($history->getIp() === null) {
            return 20;
        }

        $range = (string)Network::parse($history->getIp());

        $subnet = Range::parse($range)->contains(new IP($this->autoDetectorIp()));

        if ($subnet) {
            return -100;
        }

        return 20;
    }

    /**
     * @return mixed
     */
    private function autoDetectorIp()
    {
        return $_SERVER['HTTP_CLIENT_IP']
            ?? $_SERVER['HTTP_X_FORWARDED_FOR']
            ?? $_SERVER['HTTP_X_FORWARDED']
            ?? $_SERVER['HTTP_FORWARDED_FOR']
            ?? $_SERVER['HTTP_FORWARDED']
            ?? $_SERVER['REMOTE_ADDR'];
    }
}