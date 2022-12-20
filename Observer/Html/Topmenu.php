<?php
namespace Mageget\CategoryAttribute\Observer\Html;

use \Magento\Framework\Event\Observer;
use \Magento\Framework\Event\ObserverInterface;

class Topmenu implements ObserverInterface {
    public function execute(Observer $observer) {
        $menu = $observer->getData('menu');
        $transportObject = $observer->getData('transportObject');
        $transportObject->setData('html', '<h1>Deepak Kumar Bind</h1>');
    }
}