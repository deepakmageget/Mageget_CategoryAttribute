<?php
namespace Mageget\CategoryAttribute\Setup;
 
use Magento\Eav\Model\Entity\Attribute\Source\Boolean;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
 
class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;
 
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }
 
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
 
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
 
        /* Remove Category Attribute */
        $eavSetup->removeAttribute(\Magento\Catalog\Model\Category::ENTITY, 'custom_select_options');
 
        /* Add Category Attribute */
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'custom_select_options',
            [
                'type' => 'varchar',
                'label' => 'Custom Select Options',
                'input' => 'multiselect',
                'visible' => true,
                'required' => false,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
                'group' => 'General Information',
            ]
        );
 
        $setup->endSetup();
    }
}