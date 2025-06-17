<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $jina_kamili
 * @property string $nenosiri
 * @property integer $role_id
 * @property Roles $role
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    // Role constants
    const ROLE_ADMIN = 1;
    const ROLE_MHASIBU = 2;
    const ROLE_MCHUNGAJI = 3;
    const ROLE_KATIBU = 4;

    public static function tableName()
    {
        return 'user';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function rules()
    {
        return [
            [['jina_kamili', 'nenosiri'], 'required'],
            ['jina_kamili', 'match', 'pattern' => '/^[A-Za-z]+\s[A-Za-z]+$/', 'message' => 'Jina kamili lazima liwe na majina mawili yaliyotenganishwa na nafasi (mf. Anna Paul).'],
            ['nenosiri', 'match', 'pattern' => '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/', 'message' => 'Nenosiri lazima liwe mchanganyiko wa herufi na namba.'],
            ['role_id', 'in', 'range' => [self::ROLE_ADMIN, self::ROLE_MHASIBU, self::ROLE_MCHUNGAJI, self::ROLE_KATIBU]],
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($jina_kamili)
    {
        return static::findOne(['jina_kamili' => $jina_kamili]);
    }

    public function validatePassword($nenosiri)
    {
        return Yii::$app->security->validatePassword($nenosiri, $this->nenosiri);
    }

    public function setPassword($nenosiri)
    {
        $this->nenosiri = Yii::$app->security->generatePasswordHash($nenosiri);
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return true;
    }

    /**
     * Relational method: role anayotumia user huyu
     */
    public function getRole()
    {
        return $this->hasOne(Roles::class, ['id' => 'role_id']);
    }

    /**
     * Check kama user ni admin kwa jina la role
     */
    public function isAdmin()
    {
        return $this->role && strtolower($this->role->jina) === 'admin';
        // tumetumia strtolower kwa usalama kama jina limeandikwa kama 'ADMIN' au 'admin'
    }

    /**
     * Get jina la role kwa kutumia constants
     */
    public function getRoleName()
    {
        switch ($this->role_id) {
            case self::ROLE_ADMIN:
                return 'Admin';
            case self::ROLE_MHASIBU:
                return 'Mhasibu';
            case self::ROLE_MCHUNGAJI:
                return 'Mchungaji';
            case self::ROLE_KATIBU:
                return 'Katibu';
            default:
                return 'Haijulikani';
        }
    }
}
