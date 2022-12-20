<?php
 
namespace Mageget\CategoryAttribute\Model\Config\Source;
 
use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
 
class CustomOptionList extends AbstractSource
{
 
    public function getOptionArray()
    {
        $options = [];
        $options[0] = (__('Select'));
        $options['full-width'] = (__('Full Width'));
        $options['half-width'] = (__('Half-width'));
        return $options;
    }
 
    public function getAllOptions()
    {
        $res = $this->getOptions();
        array_unshift($res, ['value' => '', 'label' => '']);
        return $res;
    }
 
    public function getOptions()
    {
        $res = [];
        foreach ($this->getOptionArray() as $index => $value) {
            $res[] = ['value' => $index, 'label' => $value];
        }
        return $res;
    }
 
    public function toOptionArray()
    {
        return $this->getOptions();
    }
}