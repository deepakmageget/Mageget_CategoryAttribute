<?php
namespace Mageget\CategoryAttribute\Block;

class CustomCateAttribute extends \Magento\Framework\View\Element\Template
{    
  
     /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $_categoryCollection;
  
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,        
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollection
    )
    {    
        $this->_categoryCollection = $categoryCollection;
        parent::__construct($context);
    }
    
    public function getCategoryCollection()
    {
        
        $collection = $this->_categoryCollection->create()
        ->addAttributeToSelect('*');
            // ->addAttributeToFilter('custom_select_options');


            
            // $collection = $this->_categoryCollection->create()
            // ->addAttributeToSelect('custom_select_options');



        return $collection;
    }
}