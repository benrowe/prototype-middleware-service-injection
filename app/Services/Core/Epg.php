<?php

namespace App\Services\Core;

/**
 * Default EPG service
 *
 * @package App\Services\Core
 */
class Epg implements Contracts\Epg
{

    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            'data' => [
                '1',
                '2',
                '3'
            ],
        ];
    }
}
