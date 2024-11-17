<?php
// I know it should be on git :)
class Database {
    private $host = 's147.cyber-folks.pl';
    private $dbname = 'hosting2verweb_checkout';
    private $username = 'hosting2verweb_checkout';
    private $password = 'h4Ph-Ocx8y-+xVYj';
    public $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
