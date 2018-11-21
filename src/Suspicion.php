<?php

declare(strict_types=1);

namespace Orchid\Suspicion;

use Exception;
use Jenssegers\Agent\Agent;
use Orchid\Suspicion\Rules\BrowserRule;
use Orchid\Suspicion\Rules\DeviceRule;
use Orchid\Suspicion\Rules\IpRule;
use Orchid\Suspicion\Rules\LanguageRule;
use Orchid\Suspicion\Rules\PlatformRule;
use Orchid\Suspicion\Rules\RobotRule;
use Orchid\Suspicion\Rules\TimeLastRule;

/**
 * Class Suspicion
 */
class Suspicion
{

    /**
     * @var RuleContract[]
     */
    public $rules = [
        BrowserRule::class,
        DeviceRule::class,
        IpRule::class,
        LanguageRule::class,
        PlatformRule::class,
        RobotRule::class,
        TimeLastRule::class,
    ];

    /**
     * @var int
     */
    private $credibility = 0;

    /**
     * @var Agent|null
     */
    private $agent;

    /**
     * Suspicion constructor.
     *
     * @param Agent|null $agent
     */
    public function __construct(Agent $agent = null)
    {
        $this->agent = $agent ?? new Agent;
    }

    /**
     * @param array $rules
     *
     * @return $this
     */
    public function setRules(array $rules = []): array
    {
        $this->rules = $rules;

        return $this;
    }

    /**
     * @param History $history
     *
     * @return int
     * @throws Exception
     */
    public function analyze(History $history): int
    {
        // for many usages
        $this->credibility = 0;

        $historyAgent = new Agent();
        $historyAgent->setUserAgent($history->getUserAgent());

        foreach ($this->rules as $rule) {

            $rule = new $rule($this->agent, $historyAgent);

            if (!($rule instanceof RuleContract)) {
                throw new Exception('Rule must inherit interface RuleContract');
            }

            $this->credibility += $rule->check($history);
        }

        return $this->credibility;
    }

}