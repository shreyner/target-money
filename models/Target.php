<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%target}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $target
 * @property string $create_up
 * @property string $terms_date
 *
 * @property HistoryAchiev[] $historyAchievs
 */
class Target extends \yii\db\ActiveRecord
{
    public $itog;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%target}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'target','create_up', 'terms_date'], 'required'],
            [['target'], 'integer'],
            [['create_up', 'terms_date'], 'safe'],
            [['target'],'number','min'=>1,'max'=>2147483646],
            [['name'], 'string', 'max' => 30],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'target' => 'Target',
            'create_up' => 'Create Up',
            'terms_date' => 'Terms',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistoryAchievs()
    {
        return $this->hasMany(HistoryAchiev::className(), ['id_target' => 'id']);
    }
}
