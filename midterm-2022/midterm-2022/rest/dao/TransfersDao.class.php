<?php 

class TransfersDao {

    private $conn;

    /*
    * Class constructor used to establosh connection with database.
    */

    public function __construct() {

        try {
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $schema = "midterm-prep2";
            $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //    echo "Connected sucessfully";
        
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }

    public function add($transfer) {
        $stmt = $this->conn->prepare("INSERT INTO transfers (sender_id, recipient_id, amount) VALUES (:sender_id, :recipient_id, :amount)");
        $stmt->execute($transfer);
        $transfer['id'] = $this->conn->lastInsertId();
        return $transfer;
    }

    public function get_all() {
        $stmt = $this->conn->prepare("SELECT * FROM transfers JOIN investors ON transfers.sender_id = investors.id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>