<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <style>
        * {
            background-color: #cacaca;
        }
    </style>
</head>

<body>
    <h1>Cours PHP</h1>

    <?php

    // echo "niktamér";
    echo "<h2>logie</h2>";
    echo "<div><button>fuck you PHP</button></div><br>";
    echo 80085;
    echo "<br>";

    $uneVariable;
    $uneAutrevariable = 27;
    $encoreVariable = 42;

    echo $uneAutrevariable + $encoreVariable;
    echo "<br>";


    $text = "chaine de caractère";
    $integer = 45; // Integer
    $virgule = 41.25; // Float
    $oui = true;
    $non = false; // Booléen
    $tableau = [70, "poulet", true, "autruche"];
    $objet = new DateTime(); // Obj qui permet de manipuler des dates
    $tableAssociatif = [
        "nom" => "Ochs",
        "age" => 10,
        "aUnChat" => true
    ]; //Les tableaux associatifs sont des tableaux qui ont pour index une string
    echo $tableAssociatif["nom"];
    echo "<br><br>";

    foreach ($tableAssociatif as $key => $value) {
        echo $value;
        echo "<br>";
    };
    // "true" == 1 == true == "1"
    // "false" == 0 == false == "0"
    echo "<br><br>";
    echo "<ul>";
    foreach ($tableAssociatif as $key => $value) {
        echo "<li>$key : $value</li>";
    };
    echo "</ul>";
    echo "<br><br>";

    // les fonctions : permet de répéter un bloc de code quand on en a besoin
    // ex de fct native php

    $minus = "Je suis pas petit !!!";
    echo $minus;
    echo "<br><br>";
    echo strtoupper($minus);
    echo "<br><br>";
    function multiplierParDeuxEntier(int $nbr)
    {
        echo "<br>";
        echo $nbr * 2;
    };
    echo "<br><br>";

    multiplierParDeuxEntier($integer);
    multiplierParDeuxEntier(4589632);
    echo "<pre>";
    var_dump($tableau);
    echo "<pre>";
    print_r($tableau);

    ?>

</body>

</html>