<?php 

class InvestorsDao {

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

    public function get_all() {
        $stmt = $this->conn->prepare("SELECT * FROM investors");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_by_id($id) {
        $stmt = $this->conn->prepare("SELECT * FROM investors WHERE id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}

?>