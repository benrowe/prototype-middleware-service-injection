<?php

namespace App\Entity;

/**
 *
 */
class Site
{
    private $config = [];

    private $id = 0;

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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }
}
