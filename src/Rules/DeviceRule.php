<?php

declare(strict_types=1);

namespace Orchid\Suspicion\Rules;

use Orchid\Suspicion\BaseRule;
use Orchid\Suspicion\History;
use Orchid\Suspicion\RuleContract;

/**
 * Class LanguageRule
 */
class DeviceRule extends BaseRule implements RuleContract
{

    /**
     * @param History $history
     *
     * @return int
     */
    public function check(History $history): int
    {
        if($this->agent->device() === $this->historyAgent->device()){
            return 0;
        }

        return 20;
    }
}