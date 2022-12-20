<?php
namespace Mageget\CategoryAttribute\Model\Theme\Html\Topmenu;

use Magento\Framework\DataObject;
use Magento\Theme\Block\Html\Topmenu;

class Plugin extends Topmenu
{
    public function aroundGetHtml(
        Topmenu $subject,
        $proceed,
        $outermostClass = '',
        $childrenWrapClass = '',
        $limit = 0
    ) {
        $this->_eventManager->dispatch(
            'page_block_html_topmenu_gethtml_before',
            ['menu' => $this->_menu, 'block' => $this]
        );

        $this->_menu->setOutermostClass($outermostClass);
        $this->_menu->setChildrenWrapClass($childrenWrapClass);

        $html = $this->_getHtml($this->_menu, $childrenWrapClass, $limit);

        $transportObject = new DataObject(['html' => $html]);
        $this->_eventManager->dispatch(
            'page_block_html_topmenu_gethtml_after',
            ['menu' => $this->_menu, 'transportObject' => $transportObject]
        );
        $html = $transportObject->getHtml();

        return $html;
    }

    /**
     * Add sub menu HTML code for current menu item
     *
     * @param \Magento\Framework\Data\Tree\Node $child
     * @param string $childLevel
     * @param string $childrenWrapClass
     * @param int $limit
     * @return string HTML code
     */
    protected function _addSubMenu($child, $childLevel, $childrenWrapClass, $limit)
    {
        $html = '';
        if (!$child->hasChildren()) {
            return $html;
        }

        $colStops = null;
        if ($childLevel == 0 && $limit) {
            $colStops = $this->_columnBrake($child->getChildren(), $limit);
        }

        $html .= '<div class="nav__flyout level' . $childLevel . '"><ul class="container">';
        $html .= $this->_getHtml($child, $childrenWrapClass, $limit, $colStops);
        $html .= '</ul></div>';

        return $html;
    }
}