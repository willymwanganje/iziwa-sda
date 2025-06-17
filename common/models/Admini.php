<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "admini".
 *
 * @property int $id
 * @property string $jina_la_admin
 * @property string|null $barua_pepe
 * @property string|null $namba_ya_simu
 * @property int|null $role_id
 *
 * @property Roles $role
 * @property Matangazo[] $matangazo
 */
class Admini extends ActiveRecord
{
    public static function tableName()
    {
        return 'admini';
    }

    public function rules()
    {
        return [
            [['jina_la_admin'], 'required'],
            [['role_id'], 'integer'],
            [['jina_la_admin'], 'string', 'max' => 100],
            [['barua_pepe'], 'string', 'max' => 150],
            [['namba_ya_simu'], 'string', 'max' => 20],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::class, 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    public function getRole()
    {
        return $this->hasOne(Roles::class, ['id' => 'role_id']);
    }

    public function getMatangazo()
    {
        return $this->hasMany(Matangazo::class, ['aliyeweka_id' => 'id']);
    }
}
