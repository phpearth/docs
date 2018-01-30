#!/usr/bin/env php
<?php

/**
 * Script for testing and validating Markdown. Features here are temporary and
 * will change in the near future.
 */

$docsDir = realpath(__DIR__.'/..');

$exitCode = 0;

$exclude = ['.git', '.github', '.editorconfig', '.gitignore', '.travis.yml', 'LICENSE'];

function getHttpResponseCode($url)
{
    $headers = get_headers($url);

    return substr($headers[0], 9, 3);
}

$filter = function ($file, $key, $iterator) use ($exclude) {
    if ($iterator->hasChildren() && !in_array($file->getFilename(), $exclude)) {
        return true;
    }
    return ($file->isFile() && !in_array($file->getFilename(), $exclude));
};

$innerIterator = new \RecursiveDirectoryIterator(
    $docsDir,
    \RecursiveDirectoryIterator::SKIP_DOTS
);

$iterator = new \RecursiveIteratorIterator(
    new \RecursiveCallbackFilterIterator($innerIterator, $filter)
);

foreach ($iterator as $pathName => $fileInfo) {
    $content = file_get_contents($pathName);

    // Internal links
    preg_match_all('/\[.+\]\(((?!http)\/.+)(\).*)/i', $content, $matches);
    foreach ($matches[1] as $file) {
        if (!file_exists($docsDir.$file)) {
            $exitCode = 2;
            echo '[WARNING] Missing link in '.$pathName.': '.$file.PHP_EOL;
        }
    }

    // External links
    preg_match_all('/\[.+\]\((https?\:\/\/.+)(\s|\))/iU', $content, $matches);
    foreach ($matches[1] as $url) {
        /*$code = getHttpResponseCode($url);
        if ($code != '200') {
            $exitCode = 2;
            echo '[WARNING] '.$code.' error in '.$pathName.': '.$url.PHP_EOL;
        }
        */
    }
}

exit($exitCode);
