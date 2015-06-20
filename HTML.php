<?php
/**
 * Description of HtmlViewLib
 *
 * @author alisson
 */

require('HTMLElement.php');

class Html {
    
    function __construct() {}
    
    function __call($name, $arguments=array()) {
        if(empty($arguments)){$arguments[0]='';}
        $elementObject = new HTMLElement($name);
        $elementObject->set('text', $arguments[0]);
        return $elementObject;
    }
    
    function select($opcoes = array(), $selected = '', $vazio = true){
        
        $selected = is_array($selected)?$selected:array($selected);
        
        $elementObject = new html_element('select');
        $elementObject->set('text', '');
        if($vazio){
            $option = new html_element('option');
            $stringOption = $option->value('')->set('text', '');
            $elementObject->inject($stringOption);
        }
        foreach($opcoes as $value => $text){
            if(is_array($text)){
                $optgroup = new html_element('optgroup');
                $stringOptionGroup = $optgroup->label($value)->text('');
                
                foreach ($text as $key_value => $text_value) {
                    
                   if(!empty($selected) && (in_array($key_value, $selected))){
                        $option = new html_element('option');
                        $stringOption = $option->value($key_value)->set('text', $text_value)->set('selected', 'selected');
                        $stringOptionGroup->inject($stringOption);
                    }else{
                        $option = new html_element('option');
                        $stringOption = $option->value($key_value)->set('text', $text_value);
                        $stringOptionGroup->inject($stringOption);
                    } 
                }
                $elementObject->inject($stringOptionGroup);
            }else{
                if(!empty($selected) && (in_array($value, $selected))){
                    $option = new html_element('option');
                    $stringOption = $option->value($value)->set('text', $text)->set('selected', 'selected');
                    $elementObject->inject($stringOption);
                }else{
                    $option = new html_element('option');
                    $stringOption = $option->value($value)->set('text', $text);
                    $elementObject->inject($stringOption);
                }   
            }
            
        }
        
        return $elementObject;
    }
}
