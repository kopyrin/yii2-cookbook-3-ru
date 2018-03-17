<?php

namespace app\actions;

use Yii;
use yii\base\Action;

class CreateAction extends Action
{
    public $modelClass;

    public function run()
    {
        $model = new $this->modelClass();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->controller->redirect(['view', 'id' => $model->getPrimaryKey()]);
        } else {
            return $this->controller->render('//crud/create', [
                'model' => $model
            ]);
        }
    }
}
