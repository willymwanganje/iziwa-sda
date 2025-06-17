<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "matukio".
 *
 * @property integer $id
 * @property string $jina
 * @property string $maelezo
 * @property string $tarehe_ya_kuanza
 * @property string $tarehe_ya_kwisha
 * @property string $picha
 */
class Matukio extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matukio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jina', 'tarehe_ya_kuanza', 'tarehe_ya_kwisha'], 'required'],
            [['maelezo'], 'string'],
            [['tarehe_ya_kuanza', 'tarehe_ya_kwisha'], 'safe'],
            [['jina', 'picha'], 'string', 'max' => 255],
            [['picha'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jina' => 'Jina la Tukio',
            'maelezo' => 'Maelezo',
            'tarehe_ya_kuanza' => 'Tarehe ya Kuanza',
            'tarehe_ya_kwisha' => 'Tarehe ya Kwisha',
            'picha' => 'Picha ya Tukio',
        ];
    }
}