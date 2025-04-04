<?php

namespace Padosoft\Test;

use Padosoft\Test\traits\ExceptionTestable;
use Padosoft\Test\traits\FileSystemTestable;
use Padosoft\Test\traits\ReflectionTestable;
use PHPUnit\Framework\TestCase;

/**
 * User: Lore
 * Date: 05/12/2015
 * Time: 12:38
 */
class TestBase extends TestCase
{
    use ReflectionTestable , ExceptionTestable, FileSystemTestable;

    protected function setUp(): void
    {

    }

    protected function tearDown(): void
    {

    }
}
