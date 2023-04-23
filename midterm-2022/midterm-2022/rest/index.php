<?php

require "../vendor/autoload.php";
require "dao/InvestorsDao.class.php";
require "dao/TransfersDao.class.php";

Flight::register('investor_dao', "InvestorsDao");
Flight::register('transfer_dao', "TransfersDao");

/** TODO
* Use PDO connection to connect to MySQL Database
*
* connect to MySQL database
*
* NOTE: table that contains investors is named investors and table with tranfers is named transfers
*
* NOTE: If you are having issues with non working routes in flightPHP you have to enable MOD_REWRITE on Apache
*/

Flight::route('GET /investors', function(){
    /** TODO
    * write a query that will list all investors
    *
    * This endpoint should return output in JSON format
    */
    Flight::json(Flight::investor_dao()->get_all());
});

Flight::route('GET /investors/@id', function($id){
    /** TODO
    * write a query that will list investor by given id
    *
    * This endpoint should return output in JSON format
    */
    Flight::json(Flight::investor_dao()->get_by_id($id));
});

Flight::route('POST /transfer', function(){
    /** TODO
    * write a query that will save transfer to transfers table
    *
    * This endpoint should return output in JSON format
    */
    $request = Flight::request()->data->getData();
    Flight::json(['message' => "Transfer successful.", 
                    'data' => Flight::transfer_dao()->add($request)
                ]);
});

Flight::route('GET /transfers', function(){
    /** TODO
    * write a query that will list all transfers
    *
    * Instead of investor_id it should list details about investor from investors table
    *
    * This endpoint should return output in JSON format
    */
    Flight::json(Flight::transfer_dao()->get_all());
});

Flight::start();
?>
