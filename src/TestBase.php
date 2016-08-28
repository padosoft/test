<?php

namespace Padosoft\Test;

use Padosoft\Test\traits\ExceptionTestable;
use Padosoft\Test\traits\FileSystemTestable;
use Padosoft\Test\traits\ReflectionTestable;

/**
 * User: Lore
 * Date: 05/12/2015
 * Time: 12:38
 */
class TestBase extends \PHPUnit_Framework_TestCase
{
    use ReflectionTestable , ExceptionTestable, FileSystemTestable;

    protected function setUp()
    {

    }

    protected function tearDown()
    {

    }
}
