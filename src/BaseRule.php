<?php

declare(strict_types=1);


namespace Orchid\Suspicion;

use Jenssegers\Agent\Agent;

/**
 * Class BaseRule
 */
abstract class BaseRule implements RuleContract
{
    /**
     * @var Agent
     */
    public $agent;

    /**
     * @var Agent
     */
    public $historyAgent;

    /**
     * BaseRule constructor.
     *
     * @param Agent $agent
     * @param Agent $historyAgent
     */
    public function __construct(Agent $agent, Agent $historyAgent)
    {
        $this->agent        = $agent;
        $this->historyAgent = $historyAgent;
    }

}