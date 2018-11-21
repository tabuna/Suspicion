<?php

declare(strict_types=1);

namespace Orchid\Suspicion\Rules;

use Orchid\Suspicion\BaseRule;
use Orchid\Suspicion\RuleContract;
use Orchid\Suspicion\History;
use DateTime;

/**
 * Class TimeLastRule
 */
class TimeLastRule extends BaseRule implements RuleContract
{

    /**
     * @param History $history
     *
     * @return int
     */
    public function check(History $history): int
    {
        $current   = new DateTime(date("Y-m-d H:i:s"));
        $last = new DateTime($history->getLastLogin());

        // less 10 minutes after last login
        if ($current->diff($last)->i < 10) {
            return 20;
        }

        return 0;
    }
}