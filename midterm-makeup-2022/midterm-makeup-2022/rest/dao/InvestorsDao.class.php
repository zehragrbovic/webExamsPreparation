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
            $schema = "midterm-prep3";
            $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //    echo "Connected sucessfully";
        
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }


}

?>