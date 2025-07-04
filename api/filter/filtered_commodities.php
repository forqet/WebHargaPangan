<?php

require_once "../../configs/connection.php";

// Ambil parameter dari GET
$id_market     = $_GET["id_market"] ?? 'all';
$status        = $_GET["status"] ?? 'all';
$id_kecamatan  = $_GET["id_kecamatan"] ?? 'all';
$keyword       = $_GET["keyword"] ?? 'all';

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    // Base SQL
    $sql = "SELECT 
                MAX(commodities.id) AS id_commodity, 
                MAX(commodities.name) AS commodity_name, 
                MAX(commodities.icon) AS icon, 
                MAX(commodities.unit) AS unit, 
                MAX(commodities.image) AS image, 
                MAX(market_commodities.price) AS price, 
                MAX(market_commodities.status) AS status, 
                MAX(market_commodities.percent) AS percent 
            FROM market_commodities
            INNER JOIN commodities ON commodities.id = market_commodities.id_commodity
            INNER JOIN markets ON markets.id = market_commodities.id_market
            INNER JOIN regions ON markets.id_region = regions.id";

    // Kondisi dinamis
    $conditions = [];

    if ($id_market !== 'all') {
        $conditions[] = "markets.id = '$id_market'";
    }

    if ($status !== 'all') {
        $conditions[] = "market_commodities.status = '$status'";
    }

    if ($id_kecamatan !== 'all') {
        $conditions[] = "regions.id = '$id_kecamatan'";
    }

    if ($keyword !== 'all') {
        $conditions[] = "commodities.name LIKE '%$keyword%'";
    }

    // Gabungkan kondisi ke query
    if (count($conditions) > 0) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }

    $sql .= " GROUP BY commodities.id";

    $result = $connection->query($sql);
    $data = [];

    foreach ($result as $row) {
        $data[] = $row;
    }

    if ($result && count($data) > 0) {
        http_response_code(200);
        echo json_encode(["message" => "success", "data" => $data]);
    } else {
        http_response_code(400);
        echo json_encode(["message" => "error", "data" => null]);
    }
}

?>
