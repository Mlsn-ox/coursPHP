<?php

/* MANIPULATION DE TABLEAUX */

$nihon = ["Tokyo", "Osaka", "Nara", "Hiroshima", "Sapporo"];

echo "<pre>";
print_r($nihon);
echo "<pre>";

array_shift($nihon);
echo "<pre>";
print_r($nihon);
echo "<pre>";

if (in_array("Osaka", $nihon)) {
    echo "Osaka est là";
};
echo "<br>";

foreach ($nihon as &$nihonCity) {
    echo "Je veux aller à $nihonCity";
    echo "<br>";
};

echo count($nihon);

sort($nihon);
echo "<pre>";
print_r($nihon);
echo "<pre>";


/* FONCTIONS */

function trouverMax($arr)
{
    if ($arr) {
        return max($arr);
    } else {
        return null;
    }
};

function isPalindrome($str)
{
    $str = strtolower(str_replace(' ', '', $str));
    if ($str == strrev($str)) {
        return true;
    } else {
        return false;
    }
};


function calcStats($arr)
{
    if ($arr) {
        $newArr = array(
            "Somme" => array_sum($arr),
            "Nbr Elem" => count($arr),
            "Moyenne" => (array_sum($arr) / count($arr))
        );
    } else {
        $newArr = array(
            "Somme" => null,
            "Nbr Elem" => null,
            "Moyenne" => null
        );
    }
    print_r($newArr);
    return $newArr;
};

function triTablAss($a)
{
    ksort($a);
    foreach ($a as $key => $val) {
        echo "$key = $val\n";
    }
}
