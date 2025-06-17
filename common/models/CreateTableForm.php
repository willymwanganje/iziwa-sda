<?php

namespace common\models;

use Yii;
use yii\base\Model;

class CreateTableForm extends Model
{
    public $table_name;
    public $columns = [];

    public function rules()
    {
        return [
            [['table_name'], 'required'],
            [['table_name'], 'match', 'pattern' => '/^[a-zA-Z_][a-zA-Z0-9_]*$/', 'message' => 'Jina la jedwali si sahihi.'],
            [['columns'], 'validateColumns'],
        ];
    }

    public function validateColumns($attribute, $params)
    {
        if (!is_array($this->columns)) {
            $this->addError($attribute, 'Columns lazima ziwe kwenye mfumo wa array.');
            return;
        }

        $allowedTypes = ['string', 'integer', 'boolean', 'text', 'date', 'datetime', 'float'];

        foreach ($this->columns as $index => $column) {
            if (empty($column['name']) || empty($column['type'])) {
                $this->addError($attribute, "Kila column lazima iwe na jina na aina.");
            } elseif (!in_array(strtolower($column['type']), $allowedTypes)) {
                $this->addError($attribute, "Aina ya data si sahihi kwa column: {$column['name']}");
            }
        }
    }

    public function createTable()
    {
        $columnsSql = [];

        // Column ya kwanza: ID (auto increment primary key)
        $columnsSql[] = "`id` SERIAL PRIMARY KEY";

        foreach ($this->columns as $column) {
            $name = preg_replace('/[^a-zA-Z0-9_]/', '', $column['name']);
            $type = strtolower($column['type']);

            switch ($type) {
                case 'string':
                    $sqlType = 'VARCHAR(255)';
                    break;
                case 'text':
                    $sqlType = 'TEXT';
                    break;
                case 'integer':
                    $sqlType = 'INTEGER';
                    break;
                case 'boolean':
                    $sqlType = 'BOOLEAN';
                    break;
                case 'date':
                    $sqlType = 'DATE';
                    break;
                case 'datetime':
                    $sqlType = 'TIMESTAMP';
                    break;
                case 'float':
                    $sqlType = 'REAL';
                    break;
                default:
                    continue 2; // skip unknown type
            }

            $columnsSql[] = "`$name` $sqlType";
        }

        $tableName = preg_replace('/[^a-zA-Z0-9_]/', '', $this->table_name);

        $sql = "CREATE TABLE IF NOT EXISTS \"$tableName\" (" . implode(", ", $columnsSql) . ")";

        Yii::$app->db->createCommand($sql)->execute();
    }
}
