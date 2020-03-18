<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hobbies".
 *
 * @property int $idHobbie
 * @property string $nameHobbie
 * @property string $imageHobbie
 * @property string $descriptionHobbie
 * @property int $idUser
 * @property int $idImgGallery
 *
 * @property Users $idUser0
 */
class Hobbies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hobbies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nameHobbie', 'imageHobbie', 'descriptionHobbie', 'idUser', 'idImgGallery'], 'required'],
            [['idUser', 'idImgGallery'], 'integer'],
            [['nameHobbie', 'imageHobbie'], 'string', 'max' => 150],
            [['descriptionHobbie'], 'string', 'max' => 350],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['idUser' => 'idUser']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idHobbie' => 'Id Hobbie',
            'nameHobbie' => 'Name Hobbie',
            'imageHobbie' => 'Image Hobbie',
            'descriptionHobbie' => 'Description Hobbie',
            'idUser' => 'Id User',
            'idImgGallery' => 'Id Img Gallery',
        ];
    }

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(Users::className(), ['idUser' => 'idUser']);
    }
}
