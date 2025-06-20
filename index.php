<?php
/**
 * PHPTRAVELS assignment
 * fetch hotel data of Dubai
 * parses and formats to required JSON structure.
 */

// api key and host
$apiKey = '81357f4e6amshd9747382dea2034p13a7f2jsn886ab9aa5f60';
$apiHost = 'booking-com15.p.rapidapi.com';

// date
$arrival = '2025-07-01';
$departure = '2025-07-05';
$adults = 2;
$nights =  (strtotime($departure) - strtotime($arrival)) / (60* 60*24); 

// dubai coordinates have been used in url
$url = "https://booking-com15.p.rapidapi.com/api/v1/hotels/searchHotelsByCoordinates?latitude=25.1411914&longitude=55.18524679999999&arrival_date={$arrival}&departure_date={$departure}&adults={$adults}&room_qty=1&units=metric&page_number=1&temperature_unit=c&languagecode=en-us&currency_code=EUR";

// cURL request -> call the api
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "x-rapidapi-host: $apiHost",
        "x-rapidapi-key: $apiKey"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
    die("API Error: $err");
}

// echo "<pre>";
// print_r(json_decode($response, true));
// echo "</pre>";
// exit;

$data = json_decode($response, true);

// error handling
if (!isset($data['data']['result']) || !is_array($data['data']['result'])) {
    die("Invalid result");
}


$hotelData = [];

// foreach mapping
foreach ($data['data']['result'] as $hotel) {
    $netPrice = floatval($hotel['composite_price_breakdown']['net_amount']['value'] ?? 0);
    $pricePerNight= $netPrice > 0 ? $netPrice  / $nights : 0;

    $hotelData[] = [
        "hotel_id" => $hotel['hotel_id'] ?? '',
        "img" => $hotel['main_photo_url'] ?? '',
        "name" => $hotel['hotel_name'] ?? '',
        "location" => trim(($hotel['city'] ?? '') . ' ' . ($hotel['countrycode'] ?? '')),
        "address" => $hotel['default_wishlist_name'] ?? 'Unknown',
        "stars" => intval($hotel['class'] ?? 0),
        "rating" => floatval($hotel['review_score'] ?? 0),
        "latitude" => floatval($hotel['latitude'] ?? 0),
        "longitude" => floatval($hotel['longitude'] ?? 0),
        "actual_price" => round($netPrice, 2),
        "actual_price_per_night" => round($pricePerNight, 2),
        "markup_price" => round($netPrice * 1.15, 2),
        "markup_price_per_night" => round($pricePerNight * 1.15, 2),
        "currency" => "USD",
        "booking_currency" => $hotel['currencycode'] ?? 'USD',
        "service_fee" => "0",
        "supplier_name" => "hotels",
        "supplier_id" => "1",
        "redirect" => "",
        "booking_data" => (object)[],
        "color" => "#FF9900"
    ];
}

// show data in json
header('Content-Type: application/json');
echo json_encode($hotelData, JSON_PRETTY_PRINT);