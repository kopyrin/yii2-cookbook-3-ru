<?php

namespace app\widgets;

use yii\base\Widget;

class ChartWidget extends Widget
{
    public $title;
    public $width = 300;
    public $height = 200;
    public $data = [];
    public $labels = [];

    public function run()
    {
        $path = 'http://chart.apis.google.com/chart';

        $query = http_build_query([
            'chtt' => $this->title,
            'cht' => 'pc',
            'chs' => $this->width . 'x' . $this->height,
            'chd' => 't:' . implode(',', $this->data),
            'chds' => 'a',
            'chl' => implode('|', $this->labels),
            'chxt' => 'y',
            'chxl' => '0:|0|' . max($this->data)
        ]);

        $url = $path  . '?' . $query;

        return $this->render('chart', [
            'url' => $url,
        ]);
    }
}