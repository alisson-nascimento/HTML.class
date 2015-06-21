# HTML.class
HTML.class provides a simple, elegant and objective way to write HTML tags in PHP

## Structure

```php
$string = $object->tag()->attr()->attr()->...->attr()->output(); 
echo $object->tag()->attr()->attr()->...->attr(); 
```

## Example

```php
<?php

require('HTML.php');
$html = new HTML();

echo $html->h1('This is a title');
echo $html->a('Link to Github')->href('https://github.com/alissonnasc/HTML.class')
                               ->style('text-decoration', 'none');

$img = $html->img()->src('img/some-image.png'); 
// $img is a object from HTMLElement Class

$p = $html->p()->inject($img)->output();
// method *output()* return result string
// method *inject()* add another object to make the string
echo $p;

//OR

echo $html->p($img->output()); 
// this is which I prefer, call method *toString()* directly =) 


```

## Documentation 

Soon.
