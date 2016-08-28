<?php

namespace Padosoft\Test\traits;

trait FileSystemTestable
{
    /**
     * Remove created path during test
     * @param $baseDir
     */
    protected function initFileAndPath($baseDir)
    {
        $dir = $baseDir . '/resources/';
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

        $dir = $baseDir . '/resources/subdir/';
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
     * @param $baseDir
     */
    protected function removeCreatedPathDuringTest($baseDir)
    {
        if (is_dir($baseDir . '/pippo.txt')) {
            rmdir($baseDir . '/pippo.txt');
        }
        if (is_dir($baseDir . '/dummy/')) {
            rmdir($baseDir . '/dummy/');
        }
        if (file_exists($baseDir . '/resources/new/dummy.txt')) {
            unlink($baseDir . '/resources/new/dummy.txt');
        }
        if (is_dir($baseDir . '/resources/new/')) {
            rmdir($baseDir . '/resources/new/');
        }
        if (file_exists($baseDir . '/resources/new2/dummy.txt')) {
            unlink($baseDir . '/resources/new2/dummy.txt');
        }
        if (is_dir($baseDir . '/resources/new2/')) {
            rmdir($baseDir . '/resources/new2/');
        }

        /*
        $dir = $baseDir . '/resources/subdir/';

        $file = $dir . 'dummy.txt';
        if (file_exists($file)) {
            unlink($file);
        }
        if (is_dir($dir)) {
            rmdir($dir);
        }

        $dir = $baseDir . '/resources/';

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
