<?php
require_once 'controllers/OrderController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {

  $controller = new OrderController();

  // Validating data from the order
  $errors = $controller->validateOrder($_POST);

  if($errors) {
    header('Content-Type: application/json');
    echo json_encode($errors);

  } else {
    $result = $controller->processOrder($_POST);
    header('Content-Type: application/json');
    echo json_encode($result);

  }
 
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Here coupon functionality is handled
    $_POST = json_decode(file_get_contents('php://input'), true);

    if($_POST['code']) {
      $controller = new OrderController();
      $result = $controller->handleCoupon($_POST['code']);
      header('Content-Type: application/json');
      echo json_encode($result);
    }
    
} else {
    // Display the view  
    include 'views/checkout_form.php';
}




