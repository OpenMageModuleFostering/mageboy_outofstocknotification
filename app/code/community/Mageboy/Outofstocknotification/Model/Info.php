<?php

/**
 * Out of stock notification item model
 *
 * @author Krishna Ijjada
 */

class Mageboy_Outofstocknotification_Model_Info extends Mage_Core_Model_Abstract
{
	protected function _construct()
    {
        
    }
    
    public function saveSubscrition($productId, $email)
    { 
    	Mage::getResourceSingleton('outofstocknotification/info')->saveSubscrition($productId, $email);    	
    }
    
    public function deleteSubscrition($id)
    {
    	Mage::getResourceSingleton('outofstocknotification/info')->deleteSubscrition($id);
    }
    
    public function getProducts()
    {
    	return Mage::getResourceSingleton('outofstocknotification/info')->getProducts();
    }
    
    public function saveProductAttributesInfo($productId, $supplier, $supplierSku)
    {
    	Mage::getResourceSingleton('outofstocknotification/info')->saveProductAttributesInfo($productId, $supplier, $supplierSku);
    }
    
    public function getSupplierAttributeId()
    {
    	return Mage::getResourceSingleton('outofstocknotification/info')->getSupplierAttributeId();
    }
    
    public function getSupplierValues($supplierAttributeId)
    {
    	return Mage::getResourceSingleton('outofstocknotification/info')->getSupplierValues($supplierAttributeId);
    }
    
    public function getCollection()
    {
    	return Mage::getResourceSingleton('outofstocknotification/info')->getCollection();
    }
}    
