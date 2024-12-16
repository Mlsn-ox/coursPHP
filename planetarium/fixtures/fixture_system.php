<?php
$pdo = new PDO("mysql:host=localhost;dbname=planetarium", "root", "1234");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://randomuser.me/api/?results=33&inc=login");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$header = ["Accept: application/json"];
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$results = json_decode(curl_exec($ch), true);
curl_close($ch);
$systems = $results["results"];

foreach ($systems as $system) {
    $systemName = $system['login']['username'];
    $systemDistance = rand(2, 200);
    $i = rand(0, 9);
    switch ($i) {
        case 0:
            $systemType = "O";
            break;
        case 1:
            $systemType = "A";
            break;
        case 2:
            $systemType = "B";
            break;
        case 3:
            $systemType = "F";
            break;
        case 4:
            $systemType = "G";
            break;
        case 5:
            $systemType = "K";
            break;
        default:
            $systemType = "M";
    }
    $sql = "INSERT INTO system_solar(system_name, system_distance, system_type) 
            VALUES (?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $systemName,
        $systemDistance,
        $systemType
    ]);
};
