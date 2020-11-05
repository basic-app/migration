<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\Migration;

abstract class BaseMigration extends \CodeIgniter\Database\Migration
{

    CONST COLUMN = Column::class;

    public function createColumn(array $data = []) : Column
    {
        $class = static::COLUMN;

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

}