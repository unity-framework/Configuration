<?php

namespace Unity\Component\Config\Drivers;

use Unity\Contracts\Config\Drivers\IDriver;

class YamlDriver implements IDriver
{
    /**
     * Returns the configuration as an array.
     *
     * @param $ymlfile
     *
     * @return array
     */
    public function parse($ymlfile) : array
    {
        return yaml_parse_file($ymlfile);
    }

    /**
     * Returns supported extensions.
     *
     * @return array
     */
    public function extensions() : array
    {
        return ['yml', 'yaml'];
    }
}