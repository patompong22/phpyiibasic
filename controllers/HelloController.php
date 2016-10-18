<?php

namespace app\controllers;

class HelloController extends \yii\web\controller{
    
    public function actionFirst(){
        $title= 'Anamai';

        $a=3;
        $b=5;
        $c=$a*$b;
                return $this->render('first',['title'=>$title,'c'=>$c]);
        
    }
}
