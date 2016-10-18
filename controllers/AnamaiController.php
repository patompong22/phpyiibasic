<?php

namespace app\controllers;

class AnamaiController extends \yii\web\controller{
    
    public function actionTest(){
        $title= 'Anamai';

        $a=3;
        $b=5;
        $c=$a*$b;
                return $this->render('test',['title'=>$title,'c'=>$c]);
        
    }
}
