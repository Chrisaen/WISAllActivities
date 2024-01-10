<?php

//integers
    $int_var = 12345;
    print "$int_var";
    $another_int = -12345 + 12345;
    print "$another_int";
    echo "<br>";

// doubles
    $many = 2.2888800;
    $many_2 = 2.2111200;
    $few = $many + $many_2;
    print "($many + $many_2 = $few)";
    echo "<br>";


// boolean
    $height = 50;
    $width =25;
    if ($height == $width) 
    { 
    echo "The object is a square";
    }
    else 
    { 
    echo "The object is not a square<br>";
    }
    

// strings
    $string1 = "Web Information System";
    $string2 = "Tutorials";
    $string3 = "Welcome to";
    echo " $string3  $string1 $string2 <br>";


// Local Variables
    $x = "Addition";
    function assignx () {
    $x = "Multiplication";
    print "\$x inside function is $x. <br> ";
    }
    assignx();
    print "\$x outside of function is $x.<br> ";


// Function Parameters

// multiply a value by 10 and return it to the caller
function addition ($value) {
    $value = $value + 10;
    return $value;
   }
   $retval = addition (10);
   Print "Return value is $retval\n <br>";

// Global Variables

$a = 1;
$b = 2;

function Sum()
{
    global $a, $b;

    $b = $a + $b;
} 

Sum();
echo $b;
echo "<br>"


// Static Variables
function static_var()  
{  
    // static variable  
    static $num = 5;  
    $total = 2;  
  
    $sum++;  
    $num++;  
  
    echo $num, "\n";  
    echo $sum, "\n";  
}  

       
?>
