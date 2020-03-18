<?php

namespace leychan\Convert;

class FileHandler
{
    static protected $write_res; //读入的文本资源
    static protected $read_res; //要写入的文本资源

    public static function readFile() :\Generator {
        if (empty(self::$read_res)) {
            throw new \Exception('read_res should be set');
        }

        while (!feof(self::$read_res)) {
            yield trim(fgets(self::$read_res));
        }
        fclose(self::$read_res);

    }

    /**
     * @desc 写入数据到文本
     * @user chenlei
     * @param string $content
     * @throws \Exception
     */
    public static function writeFile(string $content) {
        if (empty(self::$write_res)) {
            throw new \Exception('write_res should be set');
        }
        fputs(self::$write_res, $content);
    }

    /**
     * @desc 释放当前写入的文本资源
     * @user chenlei
     */
    public static function closeWriteFile() {
        if (!empty(self::$write_res)) {
            fclose(self::$write_res);
        }
    }

    /**
     * @desc 设置将要进行读取的文件资源
     * @user chenlei
     * @param string $src
     */
    public static function setReadResource(string $src) {
        self::$read_res = fopen($src, 'r');
    }

    /**
     * @desc 设置将要写入的文件资源
     * @user chenlei
     * @param string $dst
     */
    public static function setWriteResource(string $dst) {
        self::$write_res = fopen($dst, 'w+');
    }

}