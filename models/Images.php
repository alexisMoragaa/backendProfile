<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property int $idImage
 * @property string $title
 * @property string $description
 * @property string $urlImage
 * @property int $idImgGallery
 *
 * @property ImgGallery $idImgGallery0
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'urlImage', 'idImgGallery'], 'required'],
            [['idImgGallery'], 'integer'],
            [['title'], 'string', 'max' => 150],
            [['description'], 'string', 'max' => 350],
            [['urlImage'], 'string', 'max' => 600],
            [['idImgGallery'], 'exist', 'skipOnError' => true, 'targetClass' => ImgGallery::className(), 'targetAttribute' => ['idImgGallery' => 'idImgGallery']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idImage' => 'Id Image',
            'title' => 'Title',
            'description' => 'Description',
            'urlImage' => 'Url Image',
            'idImgGallery' => 'Id Img Gallery',
        ];
    }

    /**
     * Gets query for [[IdImgGallery0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdImgGallery0()
    {
        return $this->hasOne(ImgGallery::className(), ['idImgGallery' => 'idImgGallery']);
    }
}
