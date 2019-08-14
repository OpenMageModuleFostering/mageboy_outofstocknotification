<?php
/**
 * Out of stock notification List admin grid container
 *
 * @author Krishna ijjada
 */
class Mageboy_Outofstocknotification_Block_Adminhtml_Subcriber extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	public function __construct()
    {
        $this->_blockGroup = 'outofstocknotification';
        $this->_controller = 'adminhtml_subcriber';
        $this->_headerText = Mage::helper('outofstocknotification')->__('Out of Stock Subscribers');
        parent::__construct();
        $this->_removeButton('add');
    }
}
