<?php

class CountriesDao {

    public function __construct() {
        
        try {
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $schema = "midterm-prep1";
            $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //    echo "Connected sucessfully";
        
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }

    public function get_all() {
        $stmt = $this->conn->prepare("SELECT Code, Name, Continent, Population, GNP FROM country ORDER BY GNP");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>