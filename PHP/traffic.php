<?php
require_once __DIR__ . "../../vendor/autoload.php";
$client = new MongoDB\Client("mongodb://root:example@localhost:27017/");
    $database = $client->selectDatabase('dbforlab');

    $ip = $_GET["ip"];

    $collection = $database -> network;

$collection = $database->network;

// Insert sample data
$insertResult = $collection->insertOne([
    'adressIP' => '192.168.1.1',
    'inputTraffic' => '1500',
    'outputTraffic' => '3000'
]);
    $cursor = $collection->findOne(['adressIP' => $ip]);



    $inputTraffic = $cursor['inputTraffic']; 
    $outputTraffic = $cursor['outputTraffic']; 

    $totalTraffic = $inputTraffic + $outputTraffic;
    $data[] = array(
        'adressIp' => $ip,
        'totalTraffic' => $totalTraffic
    );

    echo "Total traffic to user with IP <b>{$ip}</b> is <b>{$totalTraffic}</b><br>";
    echo '<script src="../JS/script.js"></script>';

    echo "<script>
    const data = " . json_encode($data) . ";
    storageFunction('traffic');
    </script>";


echo "<button onclick=\"window.location.href='../index.php'\">Return</button>";

?>