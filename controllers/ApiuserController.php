<?php

namespace app\controllers;

use yii\rest\ActiveController;

class ApiuserController extends ActiveController
{
    public $modelClass = 'app\models\Users';



    public function actionIndex()
    {

        return $this->render('index');
    }

}
