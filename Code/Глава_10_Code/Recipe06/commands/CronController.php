<?php

namespace app\commands;

use yii\console\Controller;
use yii\helpers\Console;
use Yii;

/**
 * Console crontab actions
 */
class CronController extends Controller
{
    /**
     * Regenerates timestamp
     */
    public function actionTimestamp()
    {
        file_put_contents(Yii::getAlias('@app/timestamp.txt'), time());
        $this->stdout('Done!', Console::FG_GREEN, Console::BOLD);
        $this->stdout(PHP_EOL);
    }
}
