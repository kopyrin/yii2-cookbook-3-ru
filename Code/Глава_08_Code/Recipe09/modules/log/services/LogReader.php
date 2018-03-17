<?php

namespace app\modules\log\services;

use app\modules\log\models\LogRow;

class LogReader
{
    public function getRows($file)
    {
        $result = [];
        $handle = @fopen($file, "r");
        if ($handle) {
            while (($row = fgets($handle)) !== false) {
                $pattern = 
                    '#^' .
                    '(?P<time>\d{4}\-\d{2}\-\d{2} \d{2}:\d{2}:\d{2}) ' .
                    '\[(?P<ip>[^\]]+)\]' .
                    '\[(?P<userId>[^\]]+)\]' .
                    '\[(?P<sessionId>[^\]]+)\]' .
                    '\[(?P<level>[^\]]+)\]' .
                    '\[(?P<category>[^\]]+)\]' .
                    ' (?P<text>.*?)' .
                    '(\$\_(GET|POST|REQUEST|COOKIE|SERVER) = \[)?' .
                    '$#i';
                if (preg_match($pattern, $row, $matches)) {
                    if ($matches['text']) {
                        $result[] = new LogRow([
                            'time' => $matches['time'],
                            'ip' => $matches['ip'],
                            'userId' => $matches['userId'],
                            'sessionId' => $matches['sessionId'],
                            'level' => $matches['level'],
                            'category' => $matches['category'],
                            'text' => $matches['text'],
                        ]);
                    }
                }
            }
            fclose($handle);
        }
        return array_reverse($result);
    }
}

