<?php
$x = 5; // global scope

function myTest() {
    static $x=0;
    $x += 15; //local scope
    // using x inside this function will generate an error
    echo "<p>Variable x inside function is: $x</p>";
}
myTest();
myTest();
myTest();
echo "<p>Variable x outside function is: $x</p>";

?> 