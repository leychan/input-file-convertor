<?php

namespace leychan\Convert;

class FileHandler
{
    static $handle = '';
    public static function readFile($path) :\Generator {
        if ($handle = fopen($path, 'r')) {
            while (!feof($handle)) {
                yield trim(fgets($handle));
            }
            fclose($handle);
        }
    }

    public static function writeFile($path, $content) {
        self::$handle = fopen($path, 'w');
        fputs(self::$handle, $content);
    }

    public static function closeFile() {
        if (!empty(self::$handle)) {
            fclose(self::$handle);
        }
    }
}