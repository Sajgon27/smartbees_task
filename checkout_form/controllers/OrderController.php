<?php

require_once 'classes/OrderClass.php';
require_once 'classes/CouponClass.php'; 

class OrderController {

    public function processOrder($data) {

        $order = new Order($data);
        $result = $order->saveToDatabase();     
        return $result;
    }

    public function validateOrder($data) {
        $errors = [];
        $notRequiredFields = ['password', 'confirm-password','shipping_country','shipping_address','shipping_postal_code','shipping_city', 'coupon-code', 'client_note'];
        foreach ($data as $field => $value) {
            if (in_array($field, $notRequiredFields)) {
            continue;  
            }
            $value = trim($value);

            if (empty($value)) {
                $errors[$field] = "Wypełnij wymagane pola.";
            }
            
            if ($field === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $errors[$field] = "Podany adres email nie jest poprawny.";
            }

            if ($field === 'phone_number' && !preg_match('/^\d{9}$/', $value)) {
                $errors[$field] = "Podany numer telefonu nie jest poprawny (9 cyfer).";
            }

            if (!isset($data['terms-conditions'])) {
            $errors['terms-conditions'] = "Musisz zaakceptowawć regulamin."; 
            }   

        }
        
        if(!empty($errors)) {
            return $errors;
        }
}

public function handleCoupon($data) {
    $coupon = new Coupon();
    $result = $coupon->validateCoupon($data);
    return $result;
}
}