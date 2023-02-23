<?php
$premenna = "Ahoj svet";
$premenna2 = 1;
$premenna3 = 0.7;
$premenna4 = 'c';

echo $premenna . "<br>";
print $premenna2 . "<br>";
print_r($premenna3);
var_dump($premenna2);

if (is_integer($premenna2)) {
    echo "Je to cislo" . "<br>";
} elseif (is_float($premenna3)) {
    echo "Sem sa nikdy nedostanem" . "<br>";
} else {
    echo "Nie je to cislo" . "<br>";
}

for ($i = 0; $i < 10; $i++) {
    echo "Uz som sa vypisal " . $i . " krat <br>";
}
$p = 0;
while ($p < 10) {
    echo "While " . $p . "<br>";
    //$p++;
    //$p = $p + 1;
    $p += 1;
}

//klasicke pole
$pole1 = [1, 2, 3, 4, 5];
//kalsike poles definovanzmi klucmi
$pole2 = [
    0 => 1,
    1 => 2,
    2 => 5,
    3 => 88,
];
//associativne pole
$pole3 = [
    'lol' => 14,
    'pol' => 14,
    'mol' => 14,
    'sol' => 14,
];
//multidimenzionalne asssociativne pole
$pole4 = [
    'pole1' => [
        0 => 1,
        1 => 1,
        2 => 1,
        3 => 1,
    ],
    'pole2' => [
        0 => 1,
        1 => 1,
        2 => 1,
        3 => 1,
    ],
];
//hybridne multidimezionalne associativne pole
$pole5 = [
    'pole1' => [
        0 => 1,
        1 => 1,
        2 => 1,
        3 => 1
    ],
    'pole2' => [
        0 => 1,
        1 => 12,
        2 => 13,
        3 => 15
    ],
    0 => 1
];

echo $pole5['pole2'][1] . "<br>";

/*
klasicke pole
$pole1 = [1, 2, 3, 4, 5];
*/

foreach ($pole1 as $prvok) {
    echo $prvok;
}

foreach ($pole5 as $kluc => $prvok) {
    if($kluc === 'pole2') {
        foreach ($prvok as $key => $item) {
            if($key === 1) {
                echo "<br>" . $item . "<br>";
            }
        }
    }
}

switch ($premenna2) {
    case 1:
        echo "Som jedna";
        break;
    case 2:
        echo "Som dva";
        break;
    case 3:
        echo 12;
        echo 25;
        echo 44;
        break;
    default:
        echo "Niesom nic s uvedeneho <br>";
}
?>