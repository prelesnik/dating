<?php

/**
 * Class PremiumMember creates a PremiumMember Object for the dating website
 * @author Mike Prelesnik
 * @version 1.0
 */
class PremiumMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    //getters and setters
    /**
     * Gets the indoor interests
     * @return Array $inDoorInterests the indoor interests
     */
    public function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /**
     * Sets the indoor interests
     * @param Array $inDoorInterests the indoor interests
     */
    public function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * Gets the outdoor interests
     * @return Array $outDoorInterests the outdoor interests
     */
    public function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    /**
     * Sets the outdoor interests
     * @param Array $outDoorInterests the outdoor interests
     */
    public function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }

}