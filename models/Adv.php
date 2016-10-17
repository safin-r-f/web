<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%adv}}".
 *
 * @property integer $id
 * @property string $title
 * @property double $price
 * @property string $image
 * @property string $date_public
 * @property string $description
 * @property string $address
 * @property string $phone_number
 * @property string $email
 * @property string $id_category
 * @property string $creator
 */

class Adv extends \yii\db\ActiveRecord
{
    //задает дату создания объявления
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->date_public = date("Y-m-d H:i:s");
            return true;
        } else {
            return false;
        }
    }

    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'id_category']);
    }
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'creator']);
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%adv}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'price', 'image', 'date_public', 'phone_number', 'email', 'id_category', 'creator'], 'required'],
            [['price'], 'number'],
            [['date_public'], 'safe'],
            [['description', 'address'], 'string'],
            [['id_category', 'creator'], 'integer'],
            [['title', 'image', 'phone_number', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id объявления',
            'title' => 'заголовок объявления',
            'price' => 'цена',
            'image' => 'картинка',
            'date_public' => 'дата размещения',
            'description' => 'описание',
            'address' => 'адрес',
            'phone_number' => 'номер телефона в объявлении',
            'email' => 'почта в объявлении',
            'id_category' => 'id категории',
            'creator' => 'создатель объявления',
        ];
    }

    /**
     * @inheritdoc
     * @return AdvQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdvQuery(get_called_class());
    }
}
