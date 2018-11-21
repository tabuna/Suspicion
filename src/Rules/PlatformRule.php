<?php

declare(strict_types=1);

namespace Orchid\Suspicion\Rules;

use Orchid\Suspicion\BaseRule;
use Orchid\Suspicion\RuleContract;
use Orchid\Suspicion\History;

/**
 * Class LanguageRule
 */
class PlatformRule extends BaseRule implements RuleContract
{

    /**
     * @param History $history
     *
     * @return int
     */
    public function check(History $history): int
    {
        if ($this->agent->platform() === $this->historyAgent->platform()) {
            return 0;
        }

        return 20;
    }
}