<?php
    require ('HTML.php');
    $html = new HTML();
?>

<?=$html->h1("HTML Elements Generator Class")?>

<?=$html->p('These are simple classes to write HTML elements in a simple and elegant way in PHP')?>

<?php
   
   $li  = $html->li()->inject($html->a('Require classes and intance a  HTML object')->href('#'))->output();
   $li .= $html->li()->inject($html->a('First Element - Basic')->href('#'))->output();
   $li .= $html->li()->inject($html->a('Especial Elements')->href('#'))->output();
   $li .= $html->li()->inject($html->a('Especial Attributes')->href('#'))->output();
   
   echo $html->ol($li);
?>

