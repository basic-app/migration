<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\Migration;

trait ArrayAccessTrait
{

    public function offsetExists($offset) : bool
    {
        return array_key_exists($offset, $this->_data);
    }
    
    public function offsetGet($offset)
    {
        return $this->_data[$offset];
    }
    
    public function offsetSet($offset, $value)
    {
        $this->_data[$offset] = $value;
    }
    
    public function offsetUnset($offset)
    {
        unset($this->_data[$offset]);
    }

}