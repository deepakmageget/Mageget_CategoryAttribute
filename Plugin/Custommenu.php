<?php
 
namespace Mageget\CategoryAttribute\Plugin;
 
class Custommenu
{
    public function afterGetHtml(\Magento\Theme\Block\Html\Topmenu $menu, $html)
    {
        $giftTopUrl = $menu->getUrl('giftr/search/result'); /* Here is the menu link which are redirect after click */
        $baseUrl = $menu->getUrl('*/*/*', ['_current' => true, '_use_rewrite' => true]);
        if (strpos($baseUrl,'giftr/search/result') !== false) {
            $html .= "<li class=\"level0 nav-5 active level-top parent ui-menu-item\">";
        } else {
            $html .= "<li class=\"level0 nav-4 level-top parent ui-menu-item\">";
        }
        $html .= "<a href=\"" . $giftTopUrl . "\" class=\"level-top ui-corner-all\"><span>" . __("Gift Registry") . "</span></a>";
        $html .= "</li>";
        return $html;
    }
}