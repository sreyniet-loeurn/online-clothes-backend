<?php
 header("Access-Control-Allow-Origin: *");
 header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
 header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
 header('Content-Type: application/json');
/*
 * Following code will update a Car information
 * A Car is identified by Car id (id)
 */
 
// array for JSON response
$response = array();
 
$postdata = json_decode(file_get_contents("php://input"), true);
$id = $postdata['id'];
$name = $postdata['name'];
$price = $postdata['price'];
$des = $postdata['des'];

// check for required fields
if (isset($id) && isset($name) && isset($price) && isset($des)) {
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql update row with matched pid
    $result = mysqli_query($db->connect(),"UPDATE product SET name = '$name', price = '$price', des = '$des' WHERE id = $id");
 
    // check if row inserted or not
    if ($result) {
        // successfully updated
        $response["name"] = $name;
        $response["price"] = $price;
        $response["des"] = $des;
 
        // echoing JSON response
        echo json_encode($response);
    } else {
 
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>