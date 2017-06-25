<?php

namespace App\Entity;

/**
 *
 */
class Site
{
    private $config = [];

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param array $config
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $key
     * @param mixed|null $default
     * @return mixed|null
     */
    public function getConfigValue(string $key, $default = null)
    {
        if (!array_key_exists($key, $this->config)) {
            return $default;
        }
        return $this->config[$key];
    }
}
