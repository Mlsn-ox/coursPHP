<?php
$pdo = new PDO("mysql:host=localhost;dbname=planetarium", "root", "1234");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://randomuser.me/api/?results=200&nat=us,dk,fr,gb,nl,ca&inc=name");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$header = ["Accept: application/json"];
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$results = json_decode(curl_exec($ch), true);
curl_close($ch);
$planets = $results["results"];

foreach ($planets as $planet) {
    $planetName = $planet['name']['last'] . mt_rand(1, 9999);
    $diam = round(mt_rand(15000, 160000), -3);
    $color = '#' . substr(md5(rand()), 0, 6);
    $atmo = round(mt_rand(2000, 10000), -1);

    $sql = "INSERT into planet(planet_name, planet_diameter, planet_color, planet_atmo) 
            VALUES (?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $planetName,
        $diam,
        $color,
        $atmo
    ]);
};
