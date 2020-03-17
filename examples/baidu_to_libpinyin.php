<?php

require __DIR__ . '/../vendor/autoload.php';

use leychan\Convert\Convertor as Convertor;
use leychan\Convert\FileHandler as FileHandler;

$src = '/home/chenlei/tmp/ch3.txt';
$dst = '/home/chenlei/tmp/ch3_cvt.txt';

$glob = FileHandler::readFile($src);
$glob_new = fopen($dst, 'w+');

while ($glob->valid()) {
    $line = $glob->current();
    $line = Convertor::baiduToLibpiyin($line);
    FileHandler::writeFile($glob_new, $line . "\n");
    $glob->next();
}
fclose($glob_new);