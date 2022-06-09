<?php
 header("Access-Control-Allow-Origin: *");
 header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
 header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
 header('Content-Type: application/json');
/*
 * Following code will get single product details
 * A product is identified by product id (id)
 */
 
// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
$db = new DB_CONNECT();

$postdata = json_decode(file_get_contents("php://input"), true);
$q = $postdata['q'];
 
// check for post data
if (isset($q)) {
 
    // get a product from product table
    $result = mysqli_query($db->connect(),"SELECT * FROM product WHERE name LIKE '%$q%' ");
 
    if (!empty($result)) {
        // check for empty result
        if (mysqli_num_rows($result) > 0) {
 
            $response["product"] = array();
 
            while ($row = mysqli_fetch_array($result)) {
                // temp products$products array
                $products = array();
                $product["id"] = $row["id"];
                $product["name"] = $row["name"];
                $product["price"] = $row["price"];
                $product["des"] = $row["des"];
        
                // push single product into final response array
                array_push($response["product"], $product);
            }
 
            // echoing JSON response
            echo json_encode($response);
        } else {
            // no product found
            $response["success"] = 0;
            $response["message"] = "No product found";
 
            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        // no product found
        $response["success"] = 0;
        $response["message"] = "No product found";
 
        // echo no users JSON
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>