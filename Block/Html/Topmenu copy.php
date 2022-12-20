<?php
namespace Mageget\CategoryAttribute\Block\Html;

class Topmenu extends \Magento\Theme\Block\Html\Topmenu
{

 
    protected function _addSubMenu($child, $childLevel, $childrenWrapClass, $limit)
    {


      $html = '';
        if (!$child->hasChildren()) {
            return $html;
        }

        $colStops = [];
        if ($childLevel == 0 && $limit) {
            $colStops = $this->_columnBrake($child->getChildren(), $limit);
         
        }
        $results_per_ul = 5;
        $li_count = count($child->getChildren());
        $number_of_page = ceil ($li_count / $results_per_ul);
   
//    echo "<pre>";
//    print_r($childLevel);
//     echo "<br/>";
    // echo $li = $this->_getHtml($child, $childrenWrapClass, $limit, $colStops);
    // exit;
        foreach($child as $data){
          $childname = $data['name'];
          $assignclass = $data['custom_select_options'];
         
            if(!empty($assignclass)){
                
                $comibineclass = 'deep-new-'.$assignclass;
                $html .= '<ul class="level' . $childLevel . ' ' . $childrenWrapClass .' '.$comibineclass.'">';
                $html .= $this->_getHtml($child, $childrenWrapClass, $limit, $colStops);
                $html .= '</ul>';
         
            }else{
             
                $html .= '<ul class="level' . $childLevel . ' ' . $childrenWrapClass .'">';
                $html .= $this->_getHtml($child, $childrenWrapClass, $limit, $colStops);
                 $html .= '</ul>';
            }


            $html .= '<div class="outdiv"></div>';
          




        }
    //    echo $limit;
        return $html;
    }





    protected function _getMenuItemClasses(\Magento\Framework\Data\Tree\Node $item)
    {
        $classes = [];

        $classes[] = 'level' . $item->getLevel();
        $classes[] = $item->getPositionClass();

        if ($item->getIsFirst()) {
            $classes[] = 'first';
        }

        if ($item->getIsActive()) {
            $classes[] = 'active';
        } elseif ($item->getHasActive()) {
            $classes[] = 'has-active';
        }

        if ($item->getIsLast()) {
            $classes[] = 'last';
        }

        if ($item->getClass()) {
            $classes[] = $item->getClass();
          }

        if ($item->hasChildren()) {
            $classes[] = 'parent';
            
        }

        $classes[] = 'custom-deep-class';

        return $classes;
    }
}