<?php
/**
 * Out of stock notification item model
 *
 */
class Mageboy_Outofstocknotification_Model_Subscriber extends Mage_Core_Model_Abstract
{
    /**
     * Init model
     */
    protected function _construct()
    {
        $this->_init('outofstocknotification/info');
    }
}
