<?php
require_once "BaseDao.php";

class MidtermDao extends BaseDao {

    public function __construct(){
        parent::__construct();
    }

    /** TODO
    * Implement DAO method used to add content to database
    */
    public function input_data($data){

    }

    /** TODO
    * Implement DAO method to return summary as requested within route /midterm/summary/@country
    */
    public function summary($country){

    }

    /** TODO
    * Implement DAO method to return list as requested within route /midterm/encoded
    */
    public function encoded(){

    }

    /** TODO
    * Implement DAO method to return location(s) as requested within route /midterm/ip
    */
    public function ip($ip_address){

    }
}
?>
