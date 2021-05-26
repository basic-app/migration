<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\Migration;

use Webmozart\Assert\Assert;
use Exception;

trait MigrationTrait
{

    protected $table;

    protected $columnClass = Column::class;

    public function createColumn(array $data = []) : Column
    {
        $class = $this->columnClass;

        return $class::factory($data);
    }

    public function int($constraint = null) : Column
    {
        return $this->createColumn()->int($constraint);
    }

    public function integer($constraint = null) : Column
    {
        return $this->int($constraint);
    }

    public function tinyInt($constraint = null) : Column
    {
        return $this->createColumn()->tinyInt($constraint);
    }

    public function tinyInteger($constraint = null) : Column
    {
        return $this->tinyInt($constraint);
    }

    public function smallInt($constraint = null) : Column
    {
        return $this->createColumn()->smallInt($constraint);
    }

    public function smallInteger($constraint = null) : Column
    {
        return $this->smallInt($constraint);
    }    

    public function mediumInt($constraint = null) : Column
    {
        return $this->createColumn()->mediumInt($constraint);
    }

    public function mediumInteger($constraint = null) : Column
    {
        return $this->mediumInt($constraint);
    }

    public function created() : Column
    {    
        return $this->createColumn()->created();
    }

    public function updated() : Column
    {
        return $this->createColumn()->updated();
    }

    public function date() : Column
    {
        return $this->createColumn()->date();
    }

    public function time() : Column
    {
        return $this->createColumn()->time();
    }

    public function datetime() : Column
    {
        return $this->createColumn()->datetime();
    }

    public function varchar($constraint = 255) : Column
    {
        return $this->createColumn()->varchar($constraint);
    }

    public function string($constraint = 255) : Column
    {
        return $this->varchar($constraint);
    }

    public function text($constraint = 65535) : Column
    {
        return $this->createColumn()->text($constraint);
    }

    public function bool($default = 1) : Column
    {
        return $this->createColumn()->bool($default);
    }

    public function boolean($default = 1) : Column
    {
        return $this->bool($default = 1);
    }

    public function char($constraint) : Column
    {
        return $this->createColumn()->char($constraint);
    }

    public function lang($default = null) : Column
    {
        return $this->createColumn()->char(2)->default($default);
    }

    public function decimal($constraint1, $constraint2) : Column
    {
        return $this->createColumn()->decimal($constraint1, $constraint2);
    }

    public function primaryKey($constraint = null, $autoIncrement = true) : Column
    {
        return $this->createColumn()->primaryKey($constraint, $autoIncrement);
    }

    public function foreignKey($constraint = null) : Column
    {
        return $this->createColumn()->foreignKey($constraint);
    }

    public function foreignKeyName(string $field)
    {
        return $this->table . '_' . $field . '_foreign';
    }

    public function addForeignKey(string $field, string $foreignTable, string $foreignTableField, string $onDelete = 'RESTRICT',string $onUpdate = 'RESTRICT')
    {
        Assert::notEmpty($this->table, 'Table not defined.');

        $allowActions = [
            'CASCADE',
            'SET NULL',
            'NO ACTION',
            'RESTRICT',
            'SET DEFAULT',
        ];
        
        $sql = 'ALTER TABLE :table ADD CONSTRAINT :keyName FOREIGN KEY (:field) REFERENCES :foreignTable (:foreignTableField)';

        $keyName = $this->foreignKeyName($field);

        $sql = strtr($sql, [
            ':table' => $this->db->escapeIdentifiers($this->table),
            ':keyName' => $this->db->escapeIdentifiers($keyName),
            ':field' => $this->db->escapeIdentifiers($field),
            ':foreignTable' => $this->db->escapeIdentifiers($foreignTable),
            ':foreignTableField' => $this->db->escapeIdentifiers($foreignTableField)
        ]);  
            
        if ($onDelete && in_array($onDelete, $allowActions, true))
        {
            $sql .= ' ON DELETE ' . $onDelete;
        }

        if ($onUpdate && in_array($onUpdate, $allowActions, true))
        {
            $sql .= ' ON UPDATE ' . $onUpdate;
        }

        $sql .= ';';

        return $this->db->query($sql);
    }

    public function dropForeignKey(string $field)
    {
        Assert::notEmpty($this->table, 'Table not defined.');

        return $this->forge->dropForeignKey($this->table, $this->foreignKeyName($field));
    }

    public function createView(string $name, string $sql)
    {
        if (!$this->db->simpleQuery('CREATE VIEW `' . $this->db->DBPrefix . $name . '` AS ' . $sql))
        {
            throw new Exception($this->db->error());
        }
    }

    public function dropView(string $name)
    {
        if (!$this->db->simpleQuery('DROP VIEW `' . $this->db->DBPrefix . $name . '`'))
        {
            throw new Exception($this->db->error());
        }
    }

}