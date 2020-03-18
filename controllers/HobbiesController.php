<?php

namespace app\controllers;

use yii\rest\ActiveController;

class HobbiesController extends ActiveController
{
    public $modelClass = 'app\models\Hobbies';



    public function actionIndex()
    {

        return $this->render('index');
    }

}
