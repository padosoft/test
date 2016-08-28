<?php

namespace Padosoft\Test\traits;

trait ExceptionTestable
{
    /**
     * @param $expected
     * @return bool
     */
    protected function expectedIsAnException($expected) : bool
    {
        if (is_array($expected)) {
            return false;
        }

        return strpos($expected, 'Exception') !== false
        || strpos($expected, 'PHPUnit_Framework_') !== false
        || strpos($expected, 'TypeError') !== false
        || strpos($expected, 'SoapFault') !== false;
    }
}
