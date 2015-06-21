<?php
    require ('HTML.php');
    $html = new HTML();
?>

<?=$html->h1("HTML Elements Generator Class")?>

<?=$html->p('HTML.class provides a simple, elegant and objective way to write HTML tags in PHP')?>

<?php
 echo $html->begin('ol');
   echo $html->li()->inject($html->a('Require classes and intance a HTML object')->href('#'));
   echo $html->li()->inject($html->a('First Element - Basic')->href('#'));
   echo $html->li()->inject($html->a('Especial Elements')->href('#'));
   echo $html->li()->inject($html->a('Especial Attributes')->href('#'));   
 echo $html->end('ol');
?>

