<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link https://basic-app.com
 */
abstract class BaseMigration extends \CodeIgniter\Database\Migration
{

    CONST COLUMN = Column::class;

    public static function createColumn(array $data = [])
    {
        $class = static::COLUMN;

        return $class::factory($data);
    }

    public static function int($constraint = null)
    {
        return static::createColumn()->int($constraint);
    }

    public static function integer($constraint = null)
    {
        return static::int($constraint);
    }

    public static function tinyInt($constraint = null)
    {
        return static::createColumn()->tinyInt($constraint);
    }

    public static function tinyInteger($constraint = null)
    {
        return static::tinyInt($constraint);
    }

    public static function smallInt($constraint = null)
    {
        return static::createColumn()->smallInt($constraint);
    }

    public static function smallInteger($constraint = null)
    {
        return static::smallInt($constraint);
    }    

    public static function mediumInt($constraint = null)
    {
        return static::createColumn()->mediumInt($constraint);
    }

    public static function mediumInteger($constraint = null)
    {
        return static::mediumInt($constraint);
    }

    public static function created()
    {    
        return static::createColumn()->created();
    }

    public static function updated()
    {
        return static::createColumn()->updated();
    }

    public static function date()
    {
        return static::createColumn()->date();
    }

    public static function time()
    {
        return static::createColumn()->time();
    }

    public static function datetime()
    {
        return static::createColumn()->datetime();
    }

    public static function varchar($constraint = 255)
    {
        return static::createColumn()->varchar($constraint);
    }

    public static function string($constraint = 255)
    {
        return static::varchar($constraint);
    }

    public static function text($constraint = 65535)
    {
        return static::createColumn()->text($constraint);
    }

    public static function bool($default = 1)
    {
        return static::createColumn()->bool($default);
    }

    public static function boolean($default = 1)
    {
        return static::bool($default = 1);
    }

    public static function char($constraint)
    {
        return static::createColumn()->char($constraint);
    }

    public static function decimal($constraint1, $constraint2)
    {
        return static::createColumn()->decimal($constraint1, $constraint2);
    }

    public static function primaryKey($constraint = null, $autoIncrement = true)
    {
        return static::createColumn()->primaryKey($constraint, $autoIncrement);
    }

    public static function foreignKey($constraint = null)
    {
        return static::createColumn()->foreignKey($constraint);
    }

}