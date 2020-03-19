<?php

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Images;
class ImageController extends ActiveController
{

  public function behaviors() {
    $behaviors = parent::behaviors();

    unset($behaviors['authenticator']);
    $behaviors['corsFilter'] = [
        'class' => '\yii\filters\Cors',
        'cors' => [
            'Origin' => ['*'],
            'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
            'Access-Control-Request-Headers' => ['*'],
        ],
    ];

    return $behaviors;
}

  public $modelClass = 'app\models\Images';


    public function actionIndex()
    {

        return $this->render('index');
    }


    public function actionImages($idGallery){
      return Images::find()->where(['idImgGallery' => $idGallery])->all();
    }

}
