<?php

namespace Unity\Component\Config\Contracts;

use Unity\Component\Config\Notation\NotationBag;

interface INotation
{
    /**
     * Denotes a string
     *
     * @param $notation
     *
     * @return NotationBag
     */
    static function denote($notation);
}