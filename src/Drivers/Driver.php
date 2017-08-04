<?php

namespace Unity\Component\Config\Drivers;

use Unity\Component\Config\Drivers\ArrayFile\Exceptions\BadConfigStringException;

abstract class Driver implements DriverInterface
{
    /**
     * Denotes the config string notation
     *
     * @param $config
     * @param $filename
     * @param $keys
     * @throws BadConfigStringException
     */
    function denote($config, &$filename, &$keys)
    {
        $exp = explode('.', $config);

        if(count($exp) < 1)
            throw new BadConfigStringException;

        $filename = $exp[0];

        unset($exp[0]);

        foreach ($exp as $param)
            $keys[] = $param;
    }
}