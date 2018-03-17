<?php

namespace app\controllers;

use app\models\Car;
use app\models\FamilyCar;
use yii\helpers\Html;
use yii\web\Controller;

/**
 * Class TestController.
 */
class TestController extends Controller
{
    public function actionIndex()
    {
        echo Html::tag('h1', 'All cars');

        $cars = Car::find()->all();
        foreach ($cars as $car) {
            // Each car can be of class Car, SportCar or FamilyCar
            echo get_class($car) . ' ' . $car->name . '<br />';
        }

        echo Html::tag('h1', 'Family cars');

        $familyCars = FamilyCar::find()->all();
        foreach ($familyCars as $car) {
            // Each car should be FamilyCar
            echo get_class($car) . ' ' . $car->name . '<br />';
        }
    }
}
