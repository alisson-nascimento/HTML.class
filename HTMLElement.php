<?php
/**
Source : http://davidwalsh.name/create-html-elements-php-htmlelement-class
Adapted by: Alisson Nascimento <alisson.sa.nascimento@gmail.com>
  
*/
class HTMLElement
{
	/** 
	    @var $type
	*/
	public $type = null;
	public $attributes = array();
	public $self_closers =  array('input','img','hr','br','meta','link');
    public $style = null;
	
	/* constructor */
	public function __construct($type, $self_closer = false){
		$this->type = strtolower($type);
		if($self_closer){
		    $this->self_closers[] = $this->type;
		}		
	}
	
	/* get */
	public function get($attribute){
		return $this->attributes[$attribute];
	}
	
	/* set -- array or key,value */
	public function set($attribute,$value = ''){
		if(!is_array($attribute)){
			$this->attributes[$attribute] = $value;
		}
		else{
			$this->attributes = array_merge($this->attributes,$attribute);
		}
        return $this;
	}
	
	/* remove an attribute */
	public function remove($att){
		if(isset($this->attributes[$att]))
		{
			unset($this->attributes[$att]);
		}
	}
	
	/* clear */
	public function clear(){
		$this->attributes = array();
	}
	
	/* inject */
	public function inject($object){
		if(@get_class($object) == __class__)
		{
			$this->attributes['text'].= $object->build();
		}
        return $this;
	}
	
	/* build */
	public function build(){
		//start
		$build = '<'.$this->type;
		
		//add attributes
		if(count($this->attributes))
		{
			foreach($this->attributes as $key=>$value)
			{
				if($key != 'text') { $build.= ' '.$key.'="'.$value.'"'; }
			}
		}
		
		//closing
		if(!in_array($this->type,$this->self_closers))
		{
			$build.= '>'.$this->attributes['text'].'</'.$this->type.'>';
		}
		else
		{
			$build.= '>';
		}
		
		//return it
		return $build;
	}
	
	/* spit it out */
	public function output(){
        return $this->build();
	}
        
    public function __toString() {
        return $this->build();
    }
        
    public function __call($name, $arguments) {            
        $this->set($name, $arguments[0]);            
        return $this;
    }
    
    
    /* 
        Especial Functions        
    */
    
    public function data($attr, $value) {
        $this->set("data-$attr", $value);
        return $this;
    }
    
    public function style($css, $value = null) {
        
        if(is_array($css)){
            $style = null;
            foreach($css as $item => $value){
                $style = "$item:$value;";
            }
        }else{
            $style = "$css:$value;";            
        }
        
        $this->set("style", isset($this->attributes['style'])?$this->get('style').$style:$style);
        
        return $this;
    }
}
