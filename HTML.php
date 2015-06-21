<?php
/**
 * HTML Class
 *
 * @author Alisson Nascimento
 */

require('HTMLElement.php');

class Html {
    
    public function __construct() {}
    
    public function __call($name, $arguments=array()) {
        if(empty($arguments)){$arguments[0]='';}
        $elementObject = new HTMLElement($name);
        $elementObject->set('text', $arguments[0]);
        return $elementObject;
    }
    
    public function begin($tag){
        $elementObject = new HTMLElement($tag, true);
        $elementObject->set('text', '');
        return $elementObject;
    }
    
    public function end($tag){
        return "</{$tag}>";
    }
    
    public function select($opcoes = array(), $selected = array(), $empty = false){
        
        $selected = is_array($selected)?$selected:array($selected);
        
        $elementObject = new HTMLElement('select');
        $elementObject->set('text', '');
        if(!is_bool($empty)){
            $option = new HTMLElement('option');
            $stringOption = $option->value('')->set('text', $empty);
            $elementObject->inject($stringOption);
        }else if($empty){
            $option = new html_element('option');
            $stringOption = $option->value('')->set('text', '');
            $elementObject->inject($stringOption);
        }
        
        foreach($opcoes as $value => $text){
            if(is_array($text)){
                $optgroup = new HTMLElement('optgroup');
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
                    $option = new HTMLElement('option');
                    $stringOption = $option->value($value)->set('text', $text)->set('selected', 'selected');
                    $elementObject->inject($stringOption);
                }else{
                    $option = new HTMLElement('option');
                    $stringOption = $option->value($value)->set('text', $text);
                    $elementObject->inject($stringOption);
                }   
            }
            
        }
        
        return $elementObject;
    }
}
