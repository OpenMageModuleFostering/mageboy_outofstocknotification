<?php
/**
 * Out of stock notification List admin grid
 *
 * @author Krishna Ijjada
 */
class Mageboy_Outofstocknotification_Block_Adminhtml_Subcriber_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    { 
        parent::__construct();
        $this->setId('subcribersGrid');
        $this->setUseAjax(true);
        $this->setDefaultSort('id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);

        $this->setTemplate('outofstocknotification/widget/grid.phtml');
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('outofstocknotification/subscriber_collection');
        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }

    protected function _prepareColumns()
    {
        $this->addColumn('email', array(
            'header'    => Mage::helper('outofstocknotification')->__('Email'),
            'width'     => '100px',
            'index'     => 'email',            
        ));
        
        $this->addColumn('product_id', array(
            'header'    => Mage::helper('outofstocknotification')->__('Product ID'),
            'width'     => '50px',
            'index'     => 'product_id',
            'type'      => 'number'
        ));
        
        $this->addColumn('sku', array(
            'header'    => Mage::helper('outofstocknotification')->__('SKU'),
            'width'     => '100px',
            'index'     => 'sku',            
        ));

        $this->addColumn('product_name', array(
            'header'    => Mage::helper('outofstocknotification')->__('Product Name'),
            'width'     => '100px',
            'index'     => 'product_id',			
        ));
        
        $this->addColumn('date', array(
            'header' => Mage::helper('outofstocknotification')->__('Subscribed On'),
            'index' => 'date',
            'type' => 'datetime',
            'width' => '100px',
        ));
                
        $this->addColumn('action', array(
            'header'    => Mage::helper('outofstocknotification')->__('Action'),
            'width'     => '50px',
            'index'     => 'id',			
		'filter'    => false,
              'sortable'  => false,  
        ));
         
        return parent::_prepareColumns();
    } 
}
