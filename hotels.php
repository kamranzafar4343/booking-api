<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show booking.com data through api</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container my-5">
    <h2 class="mb-4">available hotels</h2>
    <div class="row" id="hotel-list">
      <?php
        // fetch data from api
        $url = "https://booking-com15.p.rapidapi.com/api/v1/hotels/searchHotels?dest_id=-2092174&search_type=CITY&adults=1&children_age=0%2C17&room_qty=1&page_number=1&units=metric&temperature_unit=c&languagecode=en-us&currency_code=AED&location=US";

        $curl = curl_init();
        curl_setopt_array($curl, [
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Key: 1c905a5797msh46a41f93b8a113cp16e23bjsn0cbf01b2eee3",
            "X-RapidAPI-Host: booking-com15.p.rapidapi.com"
          ]
        ]);

        $respnse = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
          echo " <div class='alert alert-danger'>error in fetching data :  $err</div>";
        } 

        else {
          echo "<div class='alert alert-success'>data fetched successfully</div>";
            $data = json_decode($respnse, true);

          $hotels = $data['hotels'] ?? [];

          foreach ($hotels as $hotel) {
            $name = htmlspecialchars($hotel['name'] ?? 'No Name');
            $image = $hotel['optimizedThumbUrls']['srpDesktop'] ?? 'https://via.placeholder.com/400x200?text=No+Image';
            $address = htmlspecialchars($hotel['address']['streetAddress'] ?? 'Address not available');
            $price = $hotel['ratePlan']['price']['current'] ?? 'Price not listed';
        
            echo "<div class='col-md-4 mb-4'>
                <div class='card h-100 shadow-sm'>
                    <img src='{$image}' class='card-img-top' alt='Hotel Image'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$name}</h5>
                        <p class='card-text'>{$address}</p>
                        <p class='card-text'><strong>Price:</strong> {$price}</p>
                    </div>
                </div>
            </div>";
        }
        
        }
      ?>
    </div>
  </div>
</body>
</html>