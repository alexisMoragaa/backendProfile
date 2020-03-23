<?php

namespace app\controllers;
use yii;
use yii\rest\ActiveController;
use app\models\Blogs;
use yii\web\UploadedFile;
class BlogController extends ActiveController
{
$this->enableCsrfValidation = false;
  public function behaviors() {
    $behaviors = parent::behaviors();

    unset($behaviors['authenticator']);
    $behaviors['corsFilter'] = [
        'class' => '\yii\filters\Cors',
        'cors' => [
            'Origin' => ['http://localhost:3000', '*'],
            'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
            'Access-Control-Request-Headers' => ['http://localhost:3000','*'],
        ],
    ];

    return $behaviors;
}

public $modelClass = 'app\models\Blogs';





public function actionGetForm(){

  $blog = new Blogs;
  if(Yii::$app->request->post()){


        $blog->imgFile = UploadedFile::getInstance($blog, 'imgFile');

        var_dump($blog->imgFile); die();


      $request = Yii::$app->request->post();
      $blog->titleBlog = $request['titleBlog'];
      $blog->imgBlog = $request['imgBlog'];
      $blog->contentBlog = $request['contentBlog'];
      $blog->idUser = $request['idUser'];
      $blog->save();
    return $blog;
  }else{
    return "llegamos";
  }

}
}
