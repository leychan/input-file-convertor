<?php

namespace leychan\Convert;

class Convertor
{
    /**
     * @desc 转换一行百度输入法词库内容到libpinyin词库格式
     * @user chenlei
     * @param $line
     * @return string
     */
    public static function baiduToLibpiyin($line) :string {
        $line = str_replace(array('(', ')', '|'), array(' ', '', '\''), $line);
        $line = preg_replace('/\d+/', '', $line);
        return trim($line);
    }
}