<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
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
        $array=[
            ['fname'=>'อาภาพร','lname'=>'นครสวรรค์','email'=>'arpaporn@hotmail.com'],
            ['fname'=>'ยุ้ย','lname'=>'ญาติเยอะ','email'=>'yuinaja@hotmail.com']
            ];
        print_r($array);
        echo '<hr>';
        
        foreach ($array as $key => $value) {
            //print_r($r);
            //echo $value.'<br>';
            foreach ($value as $k => $c) {
                echo $k. $c.'<hr>';
            }
            
        }
        
        
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
    
    
    public function actionTest(){

        $a=30;
        $b=89;
        $c=$a+$b;
        $arr=['orange','green','yellow','blue','red'];
        $title = 'ทดสอบ Controller and View';
        
        $person=[
            ['fname'=>'อาภาพร','lname'=>'นครสวรรค์','email'=>'arpaporn@hotmail.com'],
            ['fname'=>'ยุ้ย','lname'=>'ญาติเยอะ','email'=>'yuinaja@hotmail.com']
            ];
     
        return $this->render('test',['cat'=>$c
                    , 'ar' => $arr,
                      'person' => $person,
                      'title' => 'helloword'
                
                ]
            );
    }
}