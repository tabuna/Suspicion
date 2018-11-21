<?php

declare(strict_types=1);

namespace Orchid\Suspicion;

/**
 * Interface RuleContract
 */
interface RuleContract
{
    /**
     * @param History $history
     *
     * @return int
     */
    public function check(History $history): int;
}