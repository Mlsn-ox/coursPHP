<?php



//PARTIE 1
$name = "Melisiane Ochs";

echo strlen($name);

echo strtoupper($name);

echo str_replace(' ', '-', $name);

//PARTIE 2
$random = rand(1, 100);

echo $random;

$sqrt = sqrt($random);
echo $sqrt;

echo round($sqrt);

//PARTIE 3
$fruits = ["jabuticaba", "kiwano", "ramboutan", "pitaya", "arbouse"];

print_r($fruits);

array_push($fruits, "bananane");
print_r($fruits);

array_shift($fruits);
print_r($fruits);

sort($fruits);
print_r($fruits);
