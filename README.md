📄 PHPTRAVELS Technical Assignment
🔥 Advanced PHP Integration & Data Handling Task
📝 General Overview
At PHPTRAVELS, we deliver robust open-source travel booking solutions to agencies and
agents globally. Our systems seamlessly integrate with external providers to enrich travel
product offerings (hotels, tours, flights, cars).
This task will test your ability to:
✅ Integrate a third-party scraping API
✅ Handle data parsing and transformation in PHP
✅ Build a proper API wrapper and use RapidAPI
✅ Apply clean code practices and output results in our standardized hotel data format
Your solution will simulate fetching hotel data for Dubai from Booking.com using a
third-party scraping API via RapidAPI. You’ll reformat the data into our custom PHP object
array and display the output in JSON.
🌐 Booking.com: What You Need to Know
Booking.com does not provide a public API for hotel availability or pricing. For testing
purposes, we leverage scraping APIs available through RapidAPI. This mimics real-world
scenarios where developers must integrate data from providers without official APIs.
🚀 RapidAPI: The Integration Platform
● RapidAPI is a marketplace offering APIs from various providers.
● You’ll subscribe to a Booking.com scraping API (use any provider on RapidAPI that
simulates Booking.com data).
● Obtain:
○ X-RapidAPI-Key (API Key)
○ X-RapidAPI-Host (API Host)
Use the free subscription plan if available to avoid any costs during development.
📈 Task Breakdown
1️⃣Connect to RapidAPI and Fetch Data
🔗 Use cURL or Guzzle in PHP to query the API with static parameters:
● Location: Dubai
● Check-in Date: 2025-07-01
● Check-out Date: 2025-07-05
● Guests: 2 adults, 1 room
2️⃣Parse and Reformat Response Data
● Map fields from the API response into the following PHP array structure:
$hotelData = []; // Initialize hotel data array
foreach ($apiResponse['hotels'] as $hotel) {
$hotelData[] = (object)[
"hotel_id" => $hotel['id'],
"img" => $hotel['image'] ?? '',
"name" => $hotel['name'],
"location" => $hotel['city'] . ' ' . $hotel['country'],
"address" => $hotel['address'],
"stars" => $hotel['stars'],
"rating" => $hotel['rating'],
"latitude" => $hotel['latitude'],
"longitude" => $hotel['longitude'],
"actual_price" => round(floatval($hotel['price']), 2),
"actual_price_per_night" =>
round(floatval($hotel['price_per_night']), 2),
"markup_price" => round(floatval($hotel['price'] * 1.15), 2),
// 15% markup
"markup_price_per_night" =>
round(floatval($hotel['price_per_night'] * 1.15), 2),
"currency" => "USD",
"booking_currency" => "USD",
"service_fee" => "0",
"supplier_name" => "hotels",
"supplier_id" => "1",
"redirect" => "",
"booking_data" => (object)[],
"color" => "#FF9900",
];
}
🔹 Important: Use array_push or [] syntax to append formatted objects to $hotelData.
🔹 Keep your logic within one PHP file.
3️⃣Sample Mock Response JSON
Below is a simulated JSON output (what we expect from your PHP script after formatting):
[
{
"hotel_id": "123",
"img": "https://example.com/image1.jpg",
"name": "Grand Dubai Hotel",
"location": "Dubai UAE",
"address": "123 Sheikh Zayed Road",
"stars": 5,
"rating": 9.1,
"latitude": 25.276987,
"longitude": 55.296249,
"actual_price": 450.00,
"actual_price_per_night": 150.00,
"markup_price": 517.50,
"markup_price_per_night": 172.50,
"currency": "USD",
"booking_currency": "USD",
"service_fee": "0",
"supplier_name": "hotels",
"supplier_id": "1",
"redirect": "",
"booking_data": {},
"color": "#FF9900"
},
{
"hotel_id": "456",
"img": "https://example.com/image2.jpg",
"name": "Dubai Marina Resort",
"location": "Dubai UAE",
"address": "789 Jumeirah Beach Road",
"stars": 4,
"rating": 8.5,
"latitude": 25.080429,
"longitude": 55.140259,
"actual_price": 300.00,
"actual_price_per_night": 100.00,
"markup_price": 345.00,
"markup_price_per_night": 115.00,
"currency": "USD",
"booking_currency": "USD",
"service_fee": "0",
"supplier_name": "hotels",
"supplier_id": "1",
"redirect": "",
"booking_data": {},
"color": "#FF9900"
}
]
4️⃣Testing and Delivery
✅ Write all logic in one PHP file.
✅ Include API call, data parsing, formatting, and JSON output.
✅ Add inline comments to explain key logic (API call, error handling, foreach mapping, array
push).
✅ Upload the completed file to GitHub, GitLab, or any public platform where we can review
and test it live.
🎯 Professional Expectations
● Use clean, readable PHP code (naming conventions, indentation).
● Apply error handling for API failures (timeouts, empty data).
● Avoid hardcoding credentials; use a config variable (but for this task, you can inline for
simplicity).
● Format all price fields to 2 decimal places; ensure type safety (floats, integers).
📣 Important Notes
🔸 This task is from PHPTRAVELS. Your performance will be a deciding factor in your
selection.
🔸 You may use any Booking.com scraper API from RapidAPI for testing.
🔸 The core skill we’re evaluating is your ability to integrate APIs, map data correctly, and
deliver clean code.
