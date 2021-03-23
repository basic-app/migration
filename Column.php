<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\Migration;

use ArrayAccess;

class Column implements ArrayAccess
{

    use ArrayAccessTrait;

    protected $_data = [];

    const NULL = 'null';

    const TYPE = 'type';

    const CONSTRAINT = 'constraint';

    const UNSIGNED = 'unsigned';

    const AUTO_INCREMENT = 'auto_increment';

    const UNIQUE = 'unique';

    const DEFAULT = 'default';

    const TYPE_INT = 'INT';

    const TYPE_TINYINT = 'TINYINT';

    const TYPE_SMALLINT = 'SMALLINT';

    const TYPE_MEDIUMINT = 'MEDIUMINT';

    const TYPE_VARCHAR = 'VARCHAR';

    const TYPE_CHAR = 'CHAR';

    const TYPE_TEXT = 'TEXT';

    const TYPE_ENUM = 'ENUM';

    const TYPE_TIMESTAMP = 'TIMESTAMP';

    const TYPE_DATE = 'DATE';

    const TYPE_TIME = 'TIME';

    const TYPE_DATETIME = 'DATETIME';

    const TYPE_DECIMAL = 'DECIMAL';

    public function __construct(array $data = [])
    {
        $this->_data = $data;
    }

    public static function factory(array $data = [])
    {
        $class = get_called_class();

        $return = new $class($data);

        return $return;
    }    

    public function toArray()
    {
        return $this->_data;
    }

    public function type($type, $constraint = null)
    {
        $this->_data[static::TYPE] = $type;

        if ($constraint)
        {
            $this->_data[static::CONSTRAINT] = $constraint;
        }
    
        return $this;
    }

    public function constraint($constraint)
    {
        $this->_data[static::CONSTRAINT] = $constraint;

        return $this;
    }

    public function null()
    {
        $this->_data[static::NULL] = true;
    
        return $this;
    }

    public function notNull()
    {
        $this->_data[static::NULL] = false;
    
        return $this;
    }

    public function default($default)
    {
        $this->_data[static::DEFAULT] = $default;

        return $this;
    }

    public function unique()
    {
        $this->_data[static::UNIQUE] = true;
    
        return $this;
    }

    public function notUnique()
    {
        $this->_data[static::UNIQUE] = false;
    
        return $this;
    }

    public function autoIncrement()
    {
        $this->_data[static::AUTO_INCREMENT] = true;
    
        return $this;
    }

    public function notAutoIncrement()
    {
        $this->_data[static::AUTO_INCREMENT] = false;
    
        return $this;
    }

    public function unsigned()
    {
        $this->_data[static::UNSIGNED] = true;
    
        return $this;
    }

    public function notUnsigned()
    {
        $this->_data[static::UNSIGNED] = false;
    
        return $this;
    }

    public function int($constraint = null)
    {
        return $this->type(static::TYPE_INT, $constraint);
    }

    public function integer($constraint = null)
    {
        return $this->int($constraint);
    }

    public function tinyInt($constraint = null)
    {
        return $this->type(static::TYPE_TINYINT, $constraint);
    }

    public function tinyInteger($constraint = null)
    {
        return $this->tinyInt($constraint);
    }

    public function smallInt($constraint = null)
    {
        return $this->type(static::TYPE_SMALLINT, $constraint);
    }

    public function smallInteger($constraint = null)
    {
        return $this->smallInt($constraint);
    }

    public function mediumInt($constraint = null)
    {
        return $this->type(static::TYPE_MEDIUMINT, $constraint);
    }

    public function mediumInteger($constraint = null)
    {
        return $this->mediumInt($constraint);
    }

    public function date()
    {
        return $this->type(static::TYPE_DATE);
    }

    public function time()
    {
        return $this->type(static::TYPE_TIME);
    }

    public function datetime()
    {
        return $this->type(static::TYPE_DATETIME);
    }

    public function varchar($constraint = 255)
    {
        return $this->type(static::TYPE_VARCHAR, $constraint);
    }

    public function string($constraint = 255)
    {
        return $this->varchar($constraint);
    }

    public function text($constraint = 65535)
    {
        return $this->type(static::TYPE_TEXT, $constraint);
    }

    public function bool($default = 1)
    {
        return $this->tinyInt(1)->notNull()->unsigned()->default($default);
    }

    public function boolean($default = 1)
    {
        return $this->bool($default);
    }

    public function char($constraint)
    {
        return $this->type(static::TYPE_CHAR, $constraint);
    }

    public function decimal($constraint1, $constraint2)
    {
        return $this->type(static::TYPE_DECIMAL, $constraint1 . ',' . $constraint2);
    }

    public function primaryKey($constraint = null, $autoIncrement = true)
    {
        $return = $this->int($constraint);
    
        if ($autoIncrement)
        {
            $return->autoIncrement();
        }

        return $return;
    }

    public function created()
    {
        return $this->type(static::TYPE_TIMESTAMP . ' NULL DEFAULT CURRENT_TIMESTAMP');
    }

    public function updated()
    {
        return $this->datetime();
    }

    public function foreignKey($constraint = null)
    {
        return $this->int($constraint)->default(null);
    }

}