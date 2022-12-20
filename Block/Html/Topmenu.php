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
        $html1 = [];
        $colStops = [];
        if ($childLevel == 0 && $limit) {
          
            $colStops = $this->_columnBrake($child->getChildren(), $limit);
               
        }
      
    //     echo "<pre>";
    //    print_r($child->getChildren());
    //    exit;
        $results_per_ul = 5;
        $li_count = count($child->getChildren()); //24 2 1 2 1 21411
        $number_of_page = ceil ($li_count / $results_per_ul);
        $htmlul='';

        // if($childLevel==1){
        //     $htmlul1 = $this->_getHtml($child, $childrenWrapClass, $limit, $colStops);
        // }
        $htmlul1 = $this->_getHtml($child, $childrenWrapClass, $limit, $colStops);
    
        // $htmlul1 = explode("</li>",$htmlul1);
    //   $htmlul1 = json_encode($htmlul1);
    //    implode ("</li>",$htmlul1);  
    //    print_r($htmlul1);


    //    echo "<script>";
    //    echo "console.log('$htmlul1');";
    // //    echo "alert('$htmlul1');";
    //    echo "</script>";

    //    var_dump($htmlul1);



        foreach($child as $data){
          
     $lavelli = $data['level'];
        
          $childname = $data['name'];
          $assignclass = $data['custom_select_options'];
          
        //   echo "<pre>";
        //   print_r($data);


      

            $htmlul .= '<ul class="level' . $childLevel . ' ' . $childrenWrapClass .'">';
            $htmlul .= $this->_getHtml($child, $childrenWrapClass, $limit, $colStops);
            $htmlul .= '</ul>';
            



            // if(!empty($assignclass)){
               
            //     $comibineclass = 'deep-new-'.$assignclass;
            //     $htmlul .= '<ul class="level' . $childLevel . ' ' . $childrenWrapClass .' '.$comibineclass.'">';
            //     $htmlul .= $this->_getHtml($child, $childrenWrapClass, $limit, $colStops);
            //     $htmlul .= '</ul>';
         
            // }else{
             
            //     $htmlul .= '<ul class="level' . $childLevel . ' ' . $childrenWrapClass .'">';
            //     $htmlul .= $this->_getHtml($child, $childrenWrapClass, $limit, $colStops);
            //     $htmlul .= '</ul>';
            // }
       
    

        }
   
        $html1 = $htmlul;
        // echo $htmlul;
        return $html1;
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