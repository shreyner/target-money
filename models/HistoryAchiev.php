<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "historyAchiev".
 *
 * @property integer $id
 * @property string $description
 * @property integer $money
 * @property integer $id_target
 *
 * @property Target $idTarget
 */
class HistoryAchiev extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'historyAchiev';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['money', 'id_target'], 'required'],
            [['money', 'id_target'], 'integer'],
            [['description'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'money' => 'Money',
            'id_target' => 'Id Target',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTarget()
    {
        return $this->hasOne(Target::className(), ['id' => 'id_target']);
    }
}
