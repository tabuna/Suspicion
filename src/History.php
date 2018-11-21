<?php

declare(strict_types=1);

namespace Orchid\Suspicion;

/**
 * Class History
 */
class History
{
    /**
     * @var string
     */
    private $userAgent;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var string
     */
    private $lastLogin;

    /**
     * History constructor.
     *
     * @param null $userAgent
     * @param null $ip
     * @param null $lastLogin
     */
    public function __construct($userAgent = null, $ip = null, $lastLogin = null)
    {
        $this->userAgent = $userAgent;
        $this->ip = $ip;
        $this->lastLogin = $lastLogin;
    }

    /**
     * @return string
     */
    public function getUserAgent(): ?string
    {
        return $this->userAgent
            ?? $_SERVER['USER_AGENT']
            ?? $_SERVER['HTTP_USER_AGENT'];
    }

    /**
     * @param string $userAgent
     *
     * @return History
     */
    public function setUserAgent(string $userAgent): self
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * @return string
     */
    public function getIp(): ?string
    {
        return $this->ip
            ?? $_SERVER['HTTP_CLIENT_IP']
            ?? $_SERVER['HTTP_X_FORWARDED_FOR']
            ?? $_SERVER['HTTP_X_FORWARDED']
            ?? $_SERVER['HTTP_FORWARDED_FOR']
            ?? $_SERVER['HTTP_FORWARDED']
            ?? $_SERVER['REMOTE_ADDR'];
    }

    /**
     * @param string $ip
     *
     * @return History
     */
    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastLogin(): ?string
    {
        return $this->lastLogin ?? date("Y-m-d H:i:s");
    }

    /**
     * @param string $lastLogin
     *
     * @return History
     */
    public function setLastLogin(string $lastLogin): self
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

}