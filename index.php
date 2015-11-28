<?php
include 'HTML.class.php';

echo HTML::begin('html');
    echo HTML::begin('head');
        echo HTML::link()->href('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css')->rel('stylesheet');
    echo HTML::end('head');

    echo HTML::begin('body');
        echo HTML::h1("HTML Elements Generator Class");

        echo HTML::p('HTML.class provides a simple, elegant and objective way to write HTML tags in PHP');

        echo HTML::begin('ol');
            echo HTML::li()->inject(HTML::a('Require HTML class and intance a HTML object')->href('#first'));
            echo HTML::li()->inject(HTML::a('Writing Elements')->href('#second'));
            echo HTML::li()->inject(HTML::a('Especial Elements')->href('#third'));
            echo HTML::li()->inject(HTML::a('Especial Attributes')->href('#fourth'));   
        echo HTML::end('ol');
         
        echo HTML::h2('Require HTML class')->id('first');
            echo HTML::begin('div');
                echo HTML::pre(HTML::escape("<?php include 'HTML.class.php' ?>"));
                echo "Now you can use the static functions to write HTML tags and its attributes in chain mode";
            echo HTML::end('div');
            
        echo HTML::h2('Writing Elements')->id('second');
        
            echo HTML::begin('pre');
                
                echo " /* You can echo this code */"; 
                echo HTML::br();
                echo "echo HTML::h1('This is a title');";
                echo HTML::br();
                
                echo " /* or call output() function */";
                echo HTML::br();
                echo "HTML::h2('This is a second title')->output();";
                echo HTML::br();
                
                echo " /* and use chain mode to set attributes */";
                echo HTML::br();
                echo "echo HTML::a('A link to google.com')->href('http:://google.com.br')->class('link');";
                echo HTML::br();
                
            
            echo HTML::end('pre');
            
            echo HTML::h3('Start a block'); 
            
                echo HTML::begin('pre');

                    echo "echo HTML::begin('div')->class('block')->id('content');";
                    echo HTML::br();
                    echo "echo HTML::p(There is some content);";
                    echo HTML::br();
                    echo "echo HTML::end('div');";
                   
                echo HTML::end('pre');
            
        echo HTML::h2('Especial Elements')->id('third');
            echo "You can write any tag with same structure shown above, except these guys:";
            echo HTML::begin('pre');
                $list = array("1"=>"Primeiro", "2"=>"Segundo","3"=>"Terceiro");
                echo '$list = array("1"=>"Primeiro", "2"=>"Segundo","3"=>"Terceiro");';
            echo HTML::end('pre');
            
            echo HTML::h3('Select');
                echo HTML::select($list, "1", $empty="Position")->id('select')->name('select');            
                echo HTML::begin('pre');

                    echo 'echo HTML::select($list, "2", $empty="Position")->id("select")->name("select");';

                echo HTML::end('pre');
            
            echo HTML::h3('Radio');
                echo HTML::radio($list, "2")->id('radios')->name('radios')->class('hotizontal');

                echo HTML::begin('pre');

                        echo 'echo HTML::radio($list, "2")->id("radios")->name("radios")->class("hotizontal");';

                echo HTML::end('pre');
            
            echo HTML::h3('Checkbox');
                echo HTML::checkbox($list, array("1" , "2"))->id('checkbox')->name('checkbox')->class('hotizontal');

                echo HTML::begin('pre');

                    echo 'echo HTML::checkbox($list, array("1" , "2"))->id("checkbox")->name("checkbox")->class("hotizontal");';

                echo HTML::end('pre');
            
            echo HTML::h3('Style');  
            
            $style = array('.btn-group' => array(
                ' .btn'=> array(
                    
                    'color'=>'#ccc',
                    'padding'=>'0',
                    '.primary'=>array(
                        'color'=>'#08c',
                        '.active'=>array(
                            'color'=>'#081',
                        ),
                    ),
                    '.danger'=>array(
                        'color'=>'#08c',
                    )
                ),
                ),
            );
            
           
            
            echo HTML::pre("\$style = array('.btn-group' => array(
                ' .btn'=> array(
                    
                    'color'=>'#ccc',
                    'padding'=>'0',
                    '.primary'=>array(
                        'color'=>'#08c',
                        '.active'=>array(
                            'color'=>'#081',
                        ),
                    ),
                    '.danger'=>array(
                        'color'=>'#08c',
                    )
                ),
                ),
            );");
            
             echo HTML::pre('HTML::style($style)');
            
            echo HTML::pre(htmlspecialchars(HTML::style($style)));
            
        echo HTML::h2('Especial Attributes')->id('fourth');
        
    echo HTML::end('body'); 
echo HTML::end('html'); 
