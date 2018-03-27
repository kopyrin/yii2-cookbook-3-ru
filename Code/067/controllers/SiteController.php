<?php

namespace app\controllers;

use app\models\Article;
use Yii;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionTest()
    {
        $article = new Article();
        $article->name = 'Valentine\'s Day\'s coming? Aw crap! I forgot to get a girlfriend again!';
        $article->description = 'Bender is angry at Fry for dating a robot. Stay away from our women.
         You’ve got metal fever, boy. Metal fever';

        $article->on(ActiveRecord::EVENT_AFTER_INSERT, function($event) {
            $followers = ['john2@teleworm.us', 'shivawhite@cuvox.de', 'kate@dayrep.com' ];
            foreach($followers as $follower) {
                 Yii::$app->mailer->compose()
                    ->setFrom('techblog@teleworm.us')
                    ->setTo($follower)
                    ->setSubject($event->sender->name)
                    ->setTextBody($event->sender->description)
                    ->send();
            }
            echo 'Emails have been sent';
        });

        if (!$article->save()) {
            echo VarDumper::dumpAsString($article->getErrors());
        };
    }

    public function actionTestNew()
    {
        $article = new Article();
        $article->name = 'Valentine\'s Day\'s coming? Aw crap! I forgot to get a girlfriend again!';
        $article->description = 'Bender is angry at Fry for dating a robot. Stay away from our women.
         You’ve got metal fever, boy. Metal fever';

        // $event is an object of yii\base\Event or a child class
        $article->on(Article::EVENT_OUR_CUSTOM_EVENT, function($event) {
            $followers = ['john2@teleworm.us', 'shivawhite@cuvox.de', 'kate@dayrep.com' ];
            foreach($followers as $follower) {
                Yii::$app->mailer->compose()
                    ->setFrom('techblog@teleworm.us')
                    ->setTo($follower)
                    ->setSubject($event->sender->name)
                    ->setTextBody($event->sender->description)
                    ->send();
            }
            echo 'Emails have been sent';
        });

        if ($article->save()) {
            $article->trigger(Article::EVENT_OUR_CUSTOM_EVENT);
        }
    }
}
