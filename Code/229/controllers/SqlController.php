<?php
namespace app\controllers;
use yii\base\Controller;
use Yii;
use app\models\User;
use yii\base\Exception;


class SqlController extends Controller
{
    public function actionSimple()
    {
        $userName = $_GET['username'];
        $password = md5($_GET['password']);
        $sql = "SELECT * FROM user WHERE username = '$userName' AND password = '$password' LIMIT 1;";
        $connection = Yii::$app->db;
        $command = $connection->createCommand($sql);
        $user = $command->queryOne();
        if ($user) {
            echo "Success";
        } else {
            echo "Failure";
        }
    }

    public function actionPrepared()
    {
        $userName = $_GET['username'];
        $password = md5($_GET['password']);
        $sql = "SELECT * FROM user WHERE username = :username AND password = :password LIMIT 1;";
        $connection = Yii::$app->db;
        $command = $connection->createCommand($sql);
        $command->bindValue('username', $userName);
        $command->bindValue('password', $password);
        $user = $command->queryOne();
        if ($user) {
            echo "Success";
        } else {
            echo "Failure";
        }
    }

    public function actionAr()
    {
        $userName = $_GET['username'];
        $password = md5($_GET['password']);
        $result = User::findOne(['username' => $userName,'password' => $password]);
        if ($result) {
            echo "Success";
        } else {
            echo "Failure";
        }
    }

    public function actionWrongAr()
    {
        $userName = $_GET['username'];
        $password = md5($_GET['password']);
        $result = User::find()->where("`username` = '$userName' AND `password` = '$password'")->one();
        if ($result) {
            echo "Success";
        } else {
            echo "Failure";
        }
    }

    public function actionIn()
    {
        $names  = ['Alex', 'Qiang'];
        $users = User::find()->where(['username' => $names])->all();

        foreach ($users as $user) {
            echo $user->username . "<br />";
        }
    }

    public function actionColumn()
    {
        $attr = $_GET['attr'];
        $value = $_GET['value'];
        $users = User::find()->where([$attr => $value]);
        foreach ($users as $user) {
            echo $user->username."<br />";
        }
    }

    public function actionWhiteList()
    {
        $attr = $_GET['attr'];
        $value = $_GET['value'];
        $allowedAttr = array('username', 'id');

        if (!in_array($attr, $allowedAttr)) {
            throw new Exception("Attribute specified is not allowed.");
        }
        $users = User::find()->where([$attr => $value])->all();

        foreach($users as $user) {
            echo $user->username . "<br />";
        }
    }

}
