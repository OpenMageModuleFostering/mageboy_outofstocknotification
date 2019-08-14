<?php
/**
 * Out of stock notification item resource model
 *
 * @author Krishna Ijjada
 */

class Mageboy_Outofstocknotification_Model_Mysql4_Subscriber extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init('outofstocknotification/info', 'id');
    }
}
