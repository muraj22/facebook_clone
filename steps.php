<?php
class Cycle
{
    var $position;
    var $dataArray;
    var $dataArrayCount;
    
    function Cycle()
    {
        $this->dataArray = func_get_args();
        $this->dataArrayCount = count($this->dataArray);
    }
    
    function Display()
    {
        $this->position = (!isset($this->position) || $this->position >= ($this->dataArrayCount - 1)) ? 0 : $this->position += 1;
        return $this->dataArray[$this->position];
    }
    
}

$bgcolor = new Cycle('#000000', '#FFFFFF', '#FF0000');

echo $bgcolor->Display();
//returns #000000
echo $bgcolor->Display();
//returns #FFFFFF
echo $bgcolor->Display();
//returns #FF0000
echo $bgcolor->Display();
//returns #000000
?>