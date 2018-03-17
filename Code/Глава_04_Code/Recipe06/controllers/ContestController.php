<?php

namespace app\controllers;

use app\models\Contest;
use app\models\ContestPrizeAssn;
use app\models\Prize;
use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;
use yii\web\Controller;

class ContestController extends Controller
{
    public function actionCreate()
    {
        $contestName = 'Happy New Year';

        $firstPrize = new Prize();
        $firstPrize->name = 'Iphone 6s';
        $firstPrize->amount = 4;

        $secondPrize = new Prize();
        $secondPrize->name = 'Sony Playstation 4';
        $secondPrize->amount = 2;

        $contest = new Contest();
        $contest->name = $contestName;

        $prizes = [$firstPrize, $secondPrize];
        if ($contest->validate() && Model::validateMultiple($prizes)) {
            $contest->save(false);
            foreach ($prizes as $prize) {
                $prize->save(false);
                $contestPrizeAssn = new ContestPrizeAssn();
                $contestPrizeAssn->prize_id = $prize->id;
                $contestPrizeAssn->contest_id = $contest->id;
                $contestPrizeAssn->save(false);
            }

            return $this->renderContent(
                'All prizes have been successfully saved!'
            );
        } else {
            return $this->renderContent(
                VarDumper::dumpAsString($contest->getErrors())
            );
        }
    }

    public function actionUpdate()
    {
        $prizes = Prize::find()->all();
        if (Model::loadMultiple($prizes, Yii::$app->request->post()) && Model::validateMultiple($prizes)) {
            foreach ($prizes as $prize) {
                $prize->save(false);
            }

            return $this->renderContent(
                'All prizes have been successfully saved!'
            );
        }

        return $this->render('update', ['prizes' => $prizes]);
    }
}
