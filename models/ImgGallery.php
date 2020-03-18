<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "img_gallery".
 *
 * @property int $idImgGallery
 * @property string $nameGallery
 * @property string $descriptionGallery
 *
 * @property Images[] $images
 */
class ImgGallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'img_gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nameGallery', 'descriptionGallery'], 'required'],
            [['nameGallery'], 'string', 'max' => 150],
            [['descriptionGallery'], 'string', 'max' => 350],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idImgGallery' => 'Id Img Gallery',
            'nameGallery' => 'Name Gallery',
            'descriptionGallery' => 'Description Gallery',
        ];
    }

    /**
     * Gets query for [[Images]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['idImgGallery' => 'idImgGallery']);
    }
}
