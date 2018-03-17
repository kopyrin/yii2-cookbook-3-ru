<?php

namespace app\commands;

use yii\console\Controller;
use yii\helpers\FileHelper;

/**
 * Removes content of assets and runtime directories.
 */
class CleanController extends Controller
{
    public $assetPaths = ['@app/web/assets'];
    public $runtimePaths = ['@runtime'];

    /**
     * Removes temporary assets.
     */
    public function actionAssets()
    {
        foreach ((array)$this->assetPaths as $path) {
            $this->cleanDir($path);
        }

        $this->stdout('Done' . PHP_EOL);
    }

    /**
     * Removes runtime content.
     */
    public function actionRuntime()
    {
        foreach ((array)$this->runtimePaths as $path) {
            $this->cleanDir($path);
        }

        $this->stdout('Done' . PHP_EOL);
    }

    private function cleanDir($dir)
    {
        $iterator = new \DirectoryIterator(\Yii::getAlias($dir));
        foreach($iterator as $sub) {
            if(!$sub->isDot() && $sub->isDir()) {
                $this->stdout('Removed ' . $sub->getPathname() . PHP_EOL);
                FileHelper::removeDirectory($sub->getPathname());
            }
        }
    }
}