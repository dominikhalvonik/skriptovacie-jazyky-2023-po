<?php
$premenna = "Ahoj svet";
$premenna2 = "1";
$premenna3 = 0.5;
$premenna4 = 'c';

/*
echo $premenna . "<br>";
print $premenna2 . "<br>";
var_dump($premenna3);
print_r($premenna4);
*/

/*
if(is_integer($premenna2)) {
    echo $premenna2;
} else {
    echo "Nie je to cislo";
}
*/

//pole
$pole = array(1,2,3,4,5,6);
//asociativne pole
$pole1 = [
    'prvy' => "Test",
    'druhy' => "Test2",
    'treti' => "Test3",
    'stv' => "Test5",
    'piaty' => "Test6",
];
//hybridne asociativne pole
$pole2 = [
    0 => "Test",
    'druhy' => "Test2",
    'treti' => "Test3",
    'stv' => "Test5",
    'piaty' => "Test6",
];
//multidimenzionalne hybridne asociativne pole
$pole3 = [
    "fdsafds" => [
        0 => 15,
        1 => 16,
        2 => 17,
        "super" => "man"
    ],
    'druhy' => "Test2",
    'treti' => "Test3",
    'stv' => "Test5",
    'piaty' => "Test6",
];

echo $pole2['treti'] . "<br>";
echo $pole3["fdsafds"][2] . "<br>";
echo $pole3["fdsafds"]["super"] . "<br>";

/*
for ($i = 0; $i < 100; $i++) {
    echo 22 . "<br>";
}

$l = 0;
while ($l < 10) {
    echo $l . "<br>";
    $l++;
    //++$l;
    //$l = $l + 1;
    //$l += 1;
}
*/
const FILIP = 1;
foreach ($pole as $prvok) {
    echo "Prvok pola ".FILIP." pole: " . $prvok ."<br>";
}

foreach ($pole1 as $kluc => $prvok) {
    if($kluc === "druhy" || $kluc === "piaty") {
        echo $prvok . "<br>";
    } elseif ($kluc === "prvy") {
        echo "I am th first!!!!<br>";
    } else {
        echo "I do not care.<br>";
    }
}

echo "Moja premenna $premenna <br>";
echo 'Moja premenna $premenna <br>';
echo 'Moja premenna ' . $premenna . '<br>';

$switch = 4;

switch ($switch) {
    case 5:
        echo "Je to 5 <br>";
        break;
    case 6:
        echo "Je to 6 <br>";
        break;
    case 7:
        echo "Je to 7 <br>";
        break;
    default:
        echo "i is not equal to 0, 1 or 2";
}
?>