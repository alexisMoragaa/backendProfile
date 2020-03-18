<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $idUser
 * @property string $name
 * @property string $lastName
 * @property string $email
 * @property string $bornDate
 *
 * @property Hobbies[] $hobbies
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'lastName', 'email', 'bornDate'], 'required'],
            [['bornDate'], 'safe'],
            [['name', 'lastName', 'email'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUser' => 'Id User',
            'name' => 'Name',
            'lastName' => 'Last Name',
            'email' => 'Email',
            'bornDate' => 'Born Date',
        ];
    }

    /**
     * Gets query for [[Hobbies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHobbies()
    {
        return $this->hasMany(Hobbies::className(), ['idUser' => 'idUser']);
    }
}
