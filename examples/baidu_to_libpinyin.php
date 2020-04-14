<?php

require __DIR__ . '/../vendor/autoload.php';

use leychan\Convert\Convertor as Convertor;
use leychan\Convert\FileHandler as FileHandler;

$user = getUser();

$src = "/home/{$user}/tmp/ch3.txt";
$dst = "/home/{$user}/tmp/ch3_cvt.txt";

FileHandler::setReadResource($src);
FileHandler::setWriteResource($dst);
$glob = FileHandler::readFile();

while ($glob->valid()) {
    $line = $glob->current();
    $line = Convertor::baiduToLibpiyin($line);
//    echo $line, PHP_EOL;
    FileHandler::writeFile($line . "\n");
    $glob->next();
}

FileHandler::closeWriteFile();
function getUser() {
    return trim(shell_exec('echo $USER'));
}