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
        $number_of_ul = ceil ($li_count / $results_per_ul);
   
    //    echo "<pre>";
    //    print_r($childLevel);
    //    echo "<br/>";
      
    //    exit;
        foreach($child as $data){
        //   $li = $this->_getHtml($child, $childrenWrapClass, $limit, $colStops);
         $childname = $data['name'];
          $assignclass = $data['custom_select_options'];
          $html .= '<div>';

          $html1 = $this->_getHtml($child, $childrenWrapClass, $limit, $colStops);
        //   $newArray = array_slice($html1 , 0, 5, true);
           
          for($i=1; $i<=$number_of_ul; $i++){
            
            // if(!empty($assignclass)){
                // echo $i;

                // $comibineclass = 'deep-new-'.$assignclass;
               
                $html .= '<ul class="level' . $childLevel . ' ' . $childrenWrapClass .'">';
              
                  print_r($html1);
                // for($j=0; $j<=5; $j++)
                // {
                $html .= $this->_getHtml($child, $childrenWrapClass, $limit, $colStops);
                // }
                              
                $html .= '</ul>';
                
               
            // }else{
             
            //     $html .= '<ul class="level' . $childLevel . ' ' . $childrenWrapClass .'">';
            //     $html .= $this->_getHtml($child, $childrenWrapClass, $limit, $colStops);
            //     $html .= '</ul>';
                
            // }
        
            // $j=1;
          }
         
          
            $html .= '</div>';

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

        // $classes[] = 'custom-deep-class';

        return $classes;
    }
}