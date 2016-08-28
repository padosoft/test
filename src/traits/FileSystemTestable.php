<?php

namespace Padosoft\Test\traits;

trait FileSystemTestable
{
    /**
     * Remove created path during test
     */
    protected function initFileAndPath()
    {
        $dir = __DIR__ . '/resources/';
        if (!is_dir($dir)) {
            mkdir($dir, '0777', true);
        }

        $file = $dir . 'dummy.txt';
        if (!file_exists($file)) {
            file_put_contents($file, 'dummy');
        }

        $file = $dir . 'dummy.csv';
        if (!file_exists($file)) {
            file_put_contents($file, 'dummy;');
        }

        $dir = __DIR__ . '/resources/subdir/';
        if (!is_dir($dir)) {
            mkdir($dir, '0777', true);
        }

        $file = $dir . 'dummy.txt';
        if (!file_exists($file)) {
            file_put_contents($file, 'dummy');
        }
    }

    /**
     * Remove created path during test
     */
    protected function removeCreatedPathDuringTest()
    {
        if (is_dir(__DIR__ . '/pippo.txt')) {
            rmdir(__DIR__ . '/pippo.txt');
        }
        if (is_dir(__DIR__ . '/dummy/')) {
            rmdir(__DIR__ . '/dummy/');
        }
        if (file_exists(__DIR__ . '/resources/new/dummy.txt')) {
            unlink(__DIR__ . '/resources/new/dummy.txt');
        }
        if (is_dir(__DIR__ . '/resources/new/')) {
            rmdir(__DIR__ . '/resources/new/');
        }
        if (file_exists(__DIR__ . '/resources/new2/dummy.txt')) {
            unlink(__DIR__ . '/resources/new2/dummy.txt');
        }
        if (is_dir(__DIR__ . '/resources/new2/')) {
            rmdir(__DIR__ . '/resources/new2/');
        }

        /*
        $dir = __DIR__ . '/resources/subdir/';

        $file = $dir . 'dummy.txt';
        if (file_exists($file)) {
            unlink($file);
        }
        if (is_dir($dir)) {
            rmdir($dir);
        }

        $dir = __DIR__ . '/resources/';

        $file = $dir . 'dummy.txt';
        if (file_exists($file)) {
            unlink($file);
        }
        $file = $dir . 'dummy.csv';
        if (file_exists($file)) {
            unlink($file);
        }
        if (is_dir($dir)) {
            rmdir($dir);
        }
        */
    }
}
