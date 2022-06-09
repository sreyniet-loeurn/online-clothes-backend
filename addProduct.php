<?php
header("Access-Control-Allow-Origin: *");
// header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers:*');

// include 'DbConnect.php';
// $objDb = new DbConnect;
// $conn = $objDb->connect();

// $product = file_get_contents('php://input');
// $method = $_SERVER('REQUEST_METHOD');

// array for JSON response
$response = array();
 
$postdata = json_decode(file_get_contents("php://input"), true);
$name = $postdata['name'];
$price = $postdata['price'];
$des = $postdata['des'];

// check for required fields
//if (isset($_POST['name']) && isset($_POST['price'])) {
 if (isset($name) && isset($price) && isset($des)) {

    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = mysqli_query($db->connect(),"INSERT INTO product(name, price, des) VALUES('$name', '$price', '$des')");
 
    
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["name"] = $name;
        $response["price"] = $price;
        $response["des"] = $des;
 
        // echoing JSON response
        echo json_encode($response);
    }

}
?>