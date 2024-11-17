<?php 
require_once 'db.php';
class Coupon {
    public function validateCoupon($code) {
        $db = new Database();
        $pdo = $db->connect();
       
        $query = "SELECT * FROM coupons WHERE code = ? AND is_active = 1 LIMIT 1";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$code]);
        $coupon = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$coupon) {
            return [
                'success' => false,
                'message' => 'Błędny kod kuponu.'
                ];
        }
        return [
            'success' => true,
             'message' => 'Kupon został dodany pomyślnie.',
            'coupon' => $coupon
        ];
    }

}
