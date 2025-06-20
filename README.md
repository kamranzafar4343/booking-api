# 🧳 PHPTRAVELS Technical Assignment - Booking.com Hotel Data Integration

This project demonstrates an integration of a **Booking.com scraping API** (via [RapidAPI](https://rapidapi.com)) to fetch hotel listings for **Dubai**, transform the response into a clean, standardized structure, and output the result in **JSON format**.

## 📌 Project Summary

- 🔗 **API Integration** with RapidAPI (Booking.com scraping API)
- 🔄 **Data Parsing & Mapping** into PHP object structure
- 💡 **Output Format** matches PHPTRAVELS requirements
- 📁 **Single PHP File** (no framework or dependency)
- ✅ **Clean Code**, **Inline Comments**, and **Proper Error Handling**

---

## 🔧 Requirements Met

| Requirement | Status |
|-------------|--------|
| Fetch hotel data using coordinates via RapidAPI | ✅ Done |
| Format API response into custom PHP object array | ✅ Done |
| Output standardized JSON format | ✅ Done |
| All logic in one PHP file | ✅ Done |
| Comments for API call, error handling, foreach, array push | ✅ Done |
| Price rounding (2 decimals) and type safety | ✅ Done |
| Uploaded publicly on GitHub | ✅ You are here |

---

## 🧠 Technologies Used

- PHP (Plain procedural)
- cURL (for HTTP requests)
- JSON handling
- RapidAPI Booking.com API

---

## 🚀 How It Works

1. Calls the RapidAPI endpoint for Booking.com hotel data (hardcoded Dubai coordinates).
2. Parses the response JSON.
3. Maps and transforms each hotel record into a PHP object with fields like:
   - `hotel_id`, `name`, `img`, `price`, `markup_price`, `location`, `latitude`, etc.
4. Outputs the entire hotel list as a pretty-printed JSON.

---

## 📤 Sample Output

```json
[
  {
    "hotel_id": "10252733",
    "img": "https://cf.bstatic.com/xdata/images/hotel/square60/546843825.jpg",
    "name": "One&Only One Za'abeel",
    "location": "Dubai AE",
    "address": "Dubai",
    "stars": 5,
    "rating": 9,
    "latitude": 25.22794224273,
    "longitude": 55.290396610472,
    "actual_price": 2528.84,
    "actual_price_per_night": 632.21,
    "markup_price": 2908.17,
    "markup_price_per_night": 727.04,
    "currency": "USD",
    "booking_currency": "AED",
    "service_fee": "0",
    "supplier_name": "hotels",
    "supplier_id": "1",
    "redirect": "",
    "booking_data": {},
    "color": "#FF9900"
  }
]
