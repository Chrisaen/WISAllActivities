
<?php
const MSG = "WELCOME to WIS <br>";
echo MSG;
?>

<?php
define("TEXT","PHP");           
define("TEXT1", "PHP");          
define("1TEXT", "PHP");        
define("1_TEXT", "PHP");       
define("TEXT_1", "PHP");      
define("__TEXT__", "PHP");   
?>


<?php
echo 'I am at Line number '. __LINE__;
echo "<br>";
?>


<?php
echo 'FILE NAME '. __FILE__;
echo "<br>";
?>


<?php
function show() {
echo 'In the function '.__FUNCTION__;
}
show();
echo "<br>";
?>

<?php
class MainClass
{
function show() {
echo "<br>".__CLASS__;
}
function test() {
echo "<br>".__METHOD__;
}
}
$obj = new MainClass;
echo $obj->show();
echo $obj->test();
?>
