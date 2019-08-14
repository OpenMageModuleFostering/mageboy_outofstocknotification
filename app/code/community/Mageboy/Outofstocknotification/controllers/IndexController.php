<?php

/**
 * Out of stock notification index controller
 *
 * @category    Mageboy
 * @package     Mageboy_Outofstocknotification
 */
class Mageboy_Outofstocknotification_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{ 

                $successmessage = Mage::getStoreConfig('outofstocknotification/mail/successmessage');
		$productId = $this->getRequest()->getPost('product');
		$email = $this->getRequest()->getPost('subscription_email');
		if ($email && $productId) {
			
			Mage::getModel('outofstocknotification/info')->saveSubscrition($productId, $email);
			echo $successmessage;
		}
		else {
			$this->_redirect('');
		}		
	}
	
    protected function _getSession()
    {
        return Mage::getSingleton('checkout/session');
    }
}
