<?php

namespace app\models;

use Yii;


class Blogs extends \yii\db\ActiveRecord
{

public $imgFile;
    public static function tableName()
    {
        return 'blogs';
    }


    public function rules()
    {
        return [
            [['titleBlog', 'imgBlog', 'contentBlog', 'idUser'], 'required'],
            [['contentBlog'], 'string'],
            [['idUser'], 'integer'],
            [['titleBlog'], 'string', 'max' => 200],
            [['imgBlog'], 'string', 'max' => 300],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['idUser' => 'idUser']],
            [['imgFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'idBlog' => 'Id Blog',
            'titleBlog' => 'Title Blog',
            'imgBlog' => 'Img Blog',
            'contentBlog' => 'Content Blog',
            'idUser' => 'Id User',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('resouces/blogsImg/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return 'resouces/blogsImg/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
        } else {
            return false;
        }
    }


    public function getIdUser0()
    {
        return $this->hasOne(Users::className(), ['idUser' => 'idUser']);
    }
}
