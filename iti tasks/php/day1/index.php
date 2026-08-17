<?php

// 1. Print "Welcome to php"
echo "Welcome to php";


// 2. Define variables
$x = 5;
$y = 'Welcome ';
$z = True;


// 3. Display the type of each variable (using var_dump)
var_dump($x);
var_dump($y);
var_dump($z);



// 4. Write a php script to print numbers from 0 to 15 using 2 methods
echo "Method 1 (For loop): ";
for ($i = 0; $i <= 15; $i++) {
    echo $i . " ";
}


echo "Method 2 (While loop): ";
$j = 0;
while ($j <= 15) {
    echo $j . " ";
    $j++;
}



// 5. Define a constant with value "ITI"
define("INSTITUTE", "ITI");


// 6. Print the gettype of all variables
echo "gettype(\$x): " . gettype($x) . "\n";
echo "gettype(\$y): " . gettype($y) . "\n";
echo "gettype(\$z): " . gettype($z) . "\n\n";



// 7. Print the isset of all variables
echo "isset(\$x): " . var_export(isset($x), true) . "\n";
echo "isset(\$y): " . var_export(isset($y), true) . "\n";
echo "isset(\$z): " . var_export(isset($z), true) . "\n\n";


// 8. Print the empty of all variables
echo "empty(\$x): " . var_export(empty($x), true) . "\n";
echo "empty(\$y): " . var_export(empty($y), true) . "\n";
echo "empty(\$z): " . var_export(empty($z), true) . "\n\n";



// 9. Add two numbers m and n and check result > 50
$m = 30;
$n = 25;
$result = $m + $n;

if ($result > 50) {
    echo "Accepted\n\n";
} else {
    echo "Not accepted\n\n";
}



// 10. Number to String Function
function numberToString($num) {
    return (string)$num; 
}

// Example calls:
// numberToString(123); // returns '123'
// numberToString(999); // returns '999'

?>

<!-- 10 (HTML Table Output part) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Lab 1 Table</title>
</head>
<body>

<?php
$num1 = 123;
$str1 = numberToString($num1);

$num2 = 999;
$str2 = numberToString($num2);

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Function Call</th><th>Input Type</th><th>Return Value</th><th>Return Type</th></tr>";
echo "<tr><td>numberToString($num1)</td><td>" . gettype($num1) . "</td><td>'$str1'</td><td>" . gettype($str1) . "</td></tr>";
echo "<tr><td>numberToString($num2)</td><td>" . gettype($num2) . "</td><td>'$str2'</td><td>" . gettype($str2) . "</td></tr>";
echo "</table>";
?>

</body>
</html>




