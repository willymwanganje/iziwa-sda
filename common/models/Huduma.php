<?php

// common/models/Huduma.php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Exception;

class Huduma extends ActiveRecord
{
    public static function tableName()
    {
        return 'huduma';
    }

    public function rules()
    {
        return [
            [['jina'], 'required'],
            [['maelezo'], 'string'],
             [['huduma'], 'string'],
            [['jina'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jina' => 'Jina',
            'maelezo' => 'Maelezo',
            'huduma' => 'huduma',
        ];
    }

    /**
     * Create new row (record)
     */
    public static function createRow($data)
    {
        $model = new self();
        $model->load($data, '');
        if (!$model->validate()) return $model;
        $model->save(false);
        return $model;
    }

    /**
     * Update row (record)
     */
    public static function updateRow($id, $data)
    {
        $model = self::findOne($id);
        if (!$model) throw new Exception("Record not found");
        $model->load($data, '');
        if (!$model->validate()) return $model;
        $model->save(false);
        return $model;
    }

    /**
     * Delete row
     */
    public static function deleteRow($id, $confirm = false)
    {
        if (!$confirm) throw new Exception("Action not confirmed");
        $model = self::findOne($id);
        if (!$model) throw new Exception("Record not found");
        return $model->delete();
    }

    /**
     * Add column dynamically
     */
    public static function addColumn($name, $type, $confirm = false)
    {
        if (!$confirm) throw new Exception("Action not confirmed");
        $mappedType = self::mapType($type);
        Yii::$app->db->createCommand()->addColumn(self::tableName(), $name, $mappedType)->execute();
        return true;
    }

    /**
     * Delete column dynamically
     */
    public static function deleteColumn($name, $confirm = false)
    {
        if (!$confirm) throw new Exception("Action not confirmed");
        Yii::$app->db->createCommand()->dropColumn(self::tableName(), $name)->execute();
        return true;
    }

    /**
     * Drop the entire table
     */
    public static function dropTable($confirm = false)
    {
        if (!$confirm) throw new Exception("Action not confirmed");
        Yii::$app->db->createCommand()->dropTable(self::tableName())->execute();
        return true;
    }

    /**
     * Create table dynamically
     */
    public static function createTable($name, $columns, $confirm = false)
    {
        if (!$confirm) throw new Exception("Action not confirmed");

        $cols = [];
        foreach ($columns as $column) {
            $cols[$column['name']] = self::mapType($column['type']);
        }

        Yii::$app->db->createCommand()->createTable($name, $cols)->execute();
        return true;
    }

    /**
     * Helper: Map data types
     */
    private static function mapType($type)
    {
        $type = strtolower($type);
        $map = [
            'int' => 'integer',
            'integer' => 'integer',
            'string' => 'string',
            'text' => 'text',
            'bool' => 'boolean',
            'boolean' => 'boolean',
            'varchar' => 'string',
        ];
        return $map[$type] ?? 'string';
    }
}
