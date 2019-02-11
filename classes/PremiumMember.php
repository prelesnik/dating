<?php

class PremiumMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    //getters and setters
    /**
     * @return Array $inDoorInterests the indoor interests
     */
    public function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /**
     * @param Array $inDoorInterests the indoor interests
     */
    public function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * @return Array $outDoorInterests the outdoor interests
     */
    public function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    /**
     * @param Array $outDoorInterests the outdoor interests
     */
    public function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }

}