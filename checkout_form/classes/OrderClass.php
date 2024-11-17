<?php
require_once 'db.php';
  class Order {
    private $name;
    private $surname;
    private $phone_number;
    private $billing_country;
    private $billing_postal_code ;
    private $billing_address;
    private $billing_city;
    private $delivery;
    private $payment_method;
    private $newsletter;
    private $shipping_address;
    private $shipping_country;
    private $shipping_postal_code;
    private $shipping_city;
    private $total_amount;
    private $client_note;

    public function __construct($data) {
        $this->name = htmlspecialchars($data['name']);
        $this->surname = htmlspecialchars($data['surname']);
        $this->phone_number = htmlspecialchars($data['phone_number']);
        $this->billing_country = htmlspecialchars($data['billing_country']);
        $this->billing_postal_code = htmlspecialchars($data['billing_postal_code']);
        $this->billing_address = htmlspecialchars($data['billing_address']);
        $this->billing_city = htmlspecialchars($data['billing_city']);
        $this->delivery = htmlspecialchars($data['delivery']);
        $this->payment_method = htmlspecialchars($data['payment_method']);
        $this->newsletter = htmlspecialchars($data['newsletter'] ?? '0');
        $this->shipping_address = htmlspecialchars($data['shipping_address'] ?? '0');
        $this->shipping_country = htmlspecialchars($data['shipping_country'] ?? '0');
        $this->shipping_postal_code = htmlspecialchars($data['shipping_postal_code'] ?? '0');
        $this->shipping_city = htmlspecialchars($data['shipping_city'] ?? '0');
        $this->total_amount = htmlspecialchars($data['total_amount'] ?? '0');
        $this->client_note = htmlspecialchars($data['client_note'] ?? '0');
    }

    public function saveToDatabase() {
        try {
            $db = new Database();
            $pdo = $db->connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $data = [
                'name'             => $this->name,
                'surname'          => $this->surname,
                'phone_number'     => $this->phone_number,
                'billing_country'  => $this->billing_country,
                'billing_postal_code' => $this->billing_postal_code,
                'billing_address'  => $this->billing_address,
                'billing_city'          => $this->billing_city,
                'delivery'         => $this->delivery,
                'payment_method'   => $this->payment_method,
                'newsletter'       => $this->newsletter,
                'shipping_address'       => $this->shipping_address,
                'shipping_country'       => $this->shipping_country,
                'shipping_postal_code'       => $this->shipping_postal_code,
                'shipping_city'       => $this->shipping_city,
                'total_amount'     => $this->total_amount,
                'client_note'      => $this->client_note,
            ];
        
            //Dynamically creating query
            $columns = implode(', ', array_keys($data));
            $placeholders = ':' . implode(', :', array_keys($data));
            $sql = "INSERT INTO orders ($columns) VALUES ($placeholders)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);


            // Getting order information back to frontend
            $lastInsertedId = $pdo->lastInsertId();
            $stmt = $pdo->prepare("SELECT * FROM orders WHERE order_number = :id");
            $stmt->bindParam(':id', $lastInsertedId);
            $stmt->execute();
            $newOrder = $stmt->fetch(PDO::FETCH_ASSOC);
            return [
                'status' => 'success',
                'order' => $newOrder
            ];

        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }


}
