<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "Advert".
 *
 * @property integer $id
 * @property integer $price
 * @property string $address
 * @property integer $k_agent_detail
 * @property integer $bedroom
 * @property integer $livingroom
 * @property integer $parking
 * @property integer $kitchen
 * @property string $general_image
 * @property string $description
 * @property string $location
 * @property integer $hot
 * @property integer $sold
 * @property string $type
 * @property integer $recommend
 * @property integer $created_at
 * @property integer $updated_at
 */
class Advert extends \yii\db\ActiveRecord
{


    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }


    public function scenarios(){
        $scenarios = parent::scenarios();
        $scenarios['step2'] = ['general_image'];

        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Advert';
    }

    /**
     * @inheritdoc
     */


    public function rules()
    {
        return [
            [['price'], 'required'],
            [['k_agent_detail', 'bedroom', 'livingroom', 'parking', 'kitchen', 'hot', 'sold', 'recommend', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['address'], 'string', 'max' => 255],
            [['general_image'], 'string', 'max' => 200],
            [['location'], 'string', 'max' => 60],
            [['type'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */


    public function getUser()
    {

        return $this->hasOne(User::className(), ['id' =>'k_agent_detail']);
    }


    public function attributeLabels()
    {
        return [
            'idadvert' => 'ID',
            'price' => 'Цена',
            'address' => 'Адрес',
            'k_agent_detail' => 'K Agent Detail',
            'bedroom' => 'Количество спален',
            'livingroom' => 'Количество жилых комнат',
            'parking' => 'Парковка',
            'kitchen' => 'Количество кухонь',
            'general_image' => 'Главное фото',
            'description' => 'Описание',
            'location' => 'Местоположение',
            'hot' => 'Горячее предложение',
            'sold' => 'Продано',
            'type' => 'Тип',
            'recommend' => 'Рекомендованное',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
        ];
    }






}
