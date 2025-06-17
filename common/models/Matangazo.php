<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\ForbiddenHttpException;

class Matangazo extends ActiveRecord
{
    public static function tableName()
    {
        return 'matangazo';
    }

    public function rules()
    {
        return [
            [['kichwa_cha_habari', 'maelezo'], 'required'],
            [['maelezo'], 'string'],
            [['tarehe_ya_tangazo', 'muda_mwisho_kuonekana'], 'safe'],
            [['aliyeweka_id'], 'integer'],
            [['imechapishwa'], 'boolean'],
            [['kichwa_cha_habari'], 'string', 'max' => 255],
            [['aina_ya_tangazo'], 'string', 'max' => 100],
            [['aliyeweka_id'], 'exist', 'skipOnError' => true, 'targetClass' => Admini::class, 'targetAttribute' => ['aliyeweka_id' => 'id']],
        ];
    }

    public function getAliyeweka()
    {
        return $this->hasOne(Admini::class, ['id' => 'aliyeweka_id']);
    }

    public static function userHasAccessRole()
    {
        $user = Yii::$app->user->identity;
        if (!$user) return false;

        $admin = Admini::findOne(['id' => $user->id]);
        if (!$admin || !$admin->role) return false;

        $allowedRoles = ['Admin', 'Mhasibu', 'Mchungaji', 'Katibu'];
        return in_array($admin->role->jina_la_role, $allowedRoles);
    }

    public function beforeSave($insert)
    {
        if (!self::userHasAccessRole()) {
            throw new ForbiddenHttpException('Huna ruhusa ya kuhifadhi tangazo.');
        }

        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->tarehe_ya_tangazo = date('Y-m-d H:i:s');
                if (!$this->aliyeweka_id && Yii::$app->user->identity) {
                    $this->aliyeweka_id = Yii::$app->user->identity->id;
                }
            }
            return true;
        }
        return false;
    }

    public function beforeDelete()
    {
        if (!self::userHasAccessRole()) {
            throw new ForbiddenHttpException('Huna ruhusa ya kufuta tangazo.');
        }

        return parent::beforeDelete();
    }
}
