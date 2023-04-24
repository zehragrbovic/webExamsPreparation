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
            $schema = "midterm-prep3";
            $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //    echo "Connected sucessfully";
        
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }

    public function get_daily() {
        $stmt = $this->conn->prepare("SELECT SUM(amount), COUNT(id), created_at FROM transfers GROUP BY created_at ORDER BY SUM(amount) DESC, COUNT(id) DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_per_investor() {
        $stmt = $this->conn->prepare("SELECT SUM(amount), COUNT(id), sender_id FROM transfers GROUP BY sender_id ORDER BY SUM(amount) DESC, COUNT(id) DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_all() {
        $stmt = $this->conn->prepare("SELECT SUM(amount), COUNT(id), created_at, sender_id FROM transfers GROUP BY created_at, sender_id ORDER BY SUM(amount) DESC, COUNT(id) DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>