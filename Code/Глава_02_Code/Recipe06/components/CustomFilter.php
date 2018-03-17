<?php
namespace app\components;

use Yii;
use yii\base\ActionFilter;
use yii\web\HttpException;

class CustomFilter extends ActionFilter
{
    const WORK_TIME_BEGIN = 10;
    const WORK_TIME_END = 18;

    protected function canBeDisplayed()
    {
        $hours = date('G');

        return $hours >= self::WORK_TIME_BEGIN && $hours <= self::WORK_TIME_END;
    }

    public function beforeAction($action)
    {
        if (!$this->canBeDisplayed())
        {
            $error = 'This part of website works from '
                     . self::WORK_TIME_BEGIN . ' to '
                     . self::WORK_TIME_END . ' hours.';

            throw new HttpException(403, $error);
        }

        return parent::beforeAction($action);
    }

    public function afterAction($action, $result)
    {
        if (Yii::$app->request->url == '/test/index') {
            Yii::trace("This is the index action");
        }

        return parent::afterAction($action, $result);
    }
}