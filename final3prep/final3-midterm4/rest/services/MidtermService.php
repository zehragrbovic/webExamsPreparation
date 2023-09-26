<?php
require_once __DIR__."/../dao/MidtermDao.php";

class MidtermService {
    protected $dao;

    public function __construct(){
        $this->dao = new MidtermDao();
    }

    /** TODO
    * Implement service method to add content to database
    */
    public function input_data($data){

    }

    /** TODO
    * Implement service method for route /midterm/summary/@country
    */
    public function summary($country){

    }


    /** TODO
    * Implement service method for route /midterm/encoded
    */
    public function encoded(){

    }

    /** TODO
    * Implement service method for route /midterm/ip
    */
    public function ip($ip_address){

    }
}
?>
