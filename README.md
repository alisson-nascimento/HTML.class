# HTML.class
HTML.class provides a simple, elegant and objective way to write HTML tags in PHP

## Include HTML class
    <?php include 'HTML.class.php' ?>
Now you can use the static functions to write HTML tags and its attributes in chain mode.

## Writing Elements
    /* You can echo this code */
    echo HTML::h1('This is a title');
    /* or call output() function */
    HTML::h2('This is a second title')->output();
    /* and use chain mode to set attributes */
    echo HTML::a('A link to google.com')->href('http:://google.com.br')->class('link');

### Start a block
    echo HTML::begin('div')->class('block')->id('content');
    echo HTML::p(There is some content);
    echo HTML::end('div');

## Especial Tags Function
You can write any tag with same structure shown above, except these guys:

    /* Let's use this list */
    $list = ["1"=>"First","Second","Third"];

### Select
    echo HTML::select($list, "2", $empty="Position")->id("select")->name("select");

### Radio
    echo HTML::radio($list, "2")->id("radios")->name("radios")->class("hotizontal");

### Checkbox
    echo HTML::checkbox($list, ["1" , "2"])->id("checkbox")->name("checkbox")->class("hotizontal");

### Style
Now, we gonna write some CSS.
This code: 

    $style = ['.btn-group' => [
                   ' .btn'=> [                    
                            'color'=>'#ccc',
                            'padding'=>'0',
                            '.primary'=>[
                                        'color'=>'#08c',
                                        '.active'=>['color'=>'#08c'],
                            ],
                            '.danger'=>['color'=>'#F66']
                    ],
                ],
            ];
    echo HTML::style($style)

Out this:

    <style>
         .btn-group{
          }
         .btn-group .btn{
	          color:#ccc;
	          padding:0;
          }
         .btn-group .btn.primary{
	          color:#08c;
          }
         .btn-group .btn.primary.active{
	          color:#081;
          }
         .btn-group .btn.danger{
	          color:#08c;
          }
    </style>