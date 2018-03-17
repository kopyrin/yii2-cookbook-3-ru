<?php

namespace app\filters;

use app\services\AgreementChecker;
use Yii;
use yii\base\ActionFilter;

class AgreementFilter extends ActionFilter
{
    public function beforeAction($action)
    {
        $checker = new AgreementChecker();
        if (!$checker->isAllowed()) {
            Yii::$app->response->redirect(['/content/agreement'])->send();
            return false;
        }
        return true;
    }
}