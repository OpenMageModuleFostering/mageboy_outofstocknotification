<?php

/**
/**
 * Out of stock notification module observer
 *
 * @author Krishna Ijjada
 * 
 * @category    Mageboy
 * @package     Mageboy_Outofstocknotification
 */
class Mageboy_Outofstocknotification_Model_Observer
{
	const OUTOFSTOCKNOTIFICATION_MAIL_TEMPLATE = 'outofstock_subscription';



	
	public function sendEmailToOutofstocknotification($observer)
    {  
        $product = $observer->getEvent()->getProduct();

		if ($product) {
			if ($product->getStockItem()) {
				$stockItem = Mage::getModel('cataloginventory/stock_item')->loadByProduct($product->getId());

		           //$isInStock = $product->getStockItem()->getIsInStock();
				$isInStock = $stockItem->getIsInStock();

			    if ($isInStock>=1) { 
			    	$subscriptions = Mage::getResourceModel('outofstocknotification/info')->getSubscriptions($product->getId());
			    	if (count($subscriptions) > 0) {
			    		
					//$prodUrl = $product->getProductUrl();
					$prodUrl = Mage::getBaseUrl();
					$prodUrl = str_replace("/index.php", "", $prodUrl);
					$prodUrl = $prodUrl.$product->getData('url_path');

			    		$storeId = Mage::app()->getStore()->getId();
		            	
		            	// get email template    
			    		$emailTemplate = Mage::getStoreConfig('outofstocknotification/mail/template', $storeId);
						if (!is_numeric($emailTemplate)) {
							$emailTemplate = self::OUTOFSTOCKNOTIFICATION_MAIL_TEMPLATE;
						}
				
						$translate = Mage::getSingleton('core/translate');
							
			    		foreach ($subscriptions as $subscription) {
			    			
			    			$translate->setTranslateInline(false);	
			               	Mage::getModel('core/email_template')
					            ->setDesignConfig(array('area'=>'frontend', 'store'=>$storeId))
					            ->sendTransactional(
					                $emailTemplate,
					                'support',
					                $subscription['email'],
					                '',
					                array(
					                	'product'     => $product->getName(),
					                	'product_url' => $prodUrl,			                	
					                ));			
					        $translate->setTranslateInline(true);
					        
					        Mage::getResourceModel('outofstocknotification/info')->deleteSubscription($subscription['id']);
			    		}
			    	}			
			    }
			}
		}
        //return $this;
    }
    
	public function cancelOrderItem($observer)
    {
        $item = $observer->getEvent()->getItem();

        $productId = $item->getProductId();
		if ($productId) {
    		$subscriptions = Mage::getResourceModel('outofstocknotification/info')->getSubscriptions($productId);
	    	if (count($subscriptions) > 0) {
	    		
	    		$product = Mage::getModel('catalog/product')->load($productId);
				$prodUrl = Mage::getBaseUrl();
				$prodUrl = str_replace("/index.php", "", $prodUrl);
				$prodUrl = $prodUrl.$product->getData('url_path');

	    		$storeId = Mage::app()->getStore()->getId();
            	
            	// get email template    	
	    		$emailTemplate = Mage::getStoreConfig('outofstocknotification/mail/template', $storeId);
				if (!is_numeric($emailTemplate)) {
					$emailTemplate = self::OUTOFSTOCKNOTIFICATION_MAIL_TEMPLATE;
				}
				 
				$translate = Mage::getSingleton('core/translate');
					
	    		foreach ($subscriptions as $subscription) {
	    			
	    			$translate->setTranslateInline(false);	
	               	Mage::getModel('core/email_template')
			            ->setDesignConfig(array('area'=>'frontend', 'store'=>$storeId))
			            ->sendTransactional(
			                $emailTemplate,
			                'support',
			                $subscription['email'],
			                '',
			                array(
			                	'product'     => $product->getName(),
			                	'product_url' => $prodUrl,			                	
			                ));			
			        $translate->setTranslateInline(true);
			        
			        Mage::getResourceModel('outofstocknotification/info')->deleteSubscription($subscription['id']);
	    		}
	    	}
		}
    }
}
