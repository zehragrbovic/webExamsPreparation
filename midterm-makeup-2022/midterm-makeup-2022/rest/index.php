<?php
require '../vendor/autoload.php';
require "dao/InvestorsDao.class.php";
require "dao/TransfersDao.class.php";

Flight::register('investor_dao', "InvestorsDao");
Flight::register('transfer_dao', "TransfersDao");
/** TODO
* Use PDO connection to connect to MySQL Database
*
* Update configuration variables used to connect to MySQL database
*
* NOTE: Do not create new connection within each endpoint. Use connection variable which was set using Flight
*
* NOTE: Do not add new files to the project LOLLLLLLLLL
*
* NOTE: table that contains investors is named investors and table with tranfers is named transfers
*
* NOTE: If you are having issues with non working routes in flightPHP you have to enable MOD_REWRITE on Apache
*/
$servername = "localhost";
$username = "root";
$password = "root";
$schema = "midterm-prep3";

$conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
Flight::set("connection", $conn);

Flight::route('GET /transfers/report_by_day', function(){
    /** TODO
    * write a query that will list total number of transactions and total amount of transfers
    * per day.
    *
    * List should be sorted by the total amount and number of transactions having the highest values on the top.
    *
    * This endpoint should return output in JSON format
    */
    Flight::json(Flight::transfer_dao()->get_daily());
});

Flight::route('GET /transfers/report_by_investors', function(){
    /** TODO
    * write a query that will list total number of transactions and total amount of transfers
    * per investor.
    *
    * List should be sorted by the total transferred amount and number of transactions having the highest values on the top.
    *
    * This endpoint should return output in JSON format
    */
    Flight::json(Flight::transfer_dao()->get_per_investor());
});

Flight::route('GET /transfers/report_by_day_and_investors', function(){
    /** TODO
    * write a query that will list total number of transactions and total amount of transfers
    * per investor for each day.
    *
    * List should be sorted by the total transferred amount and number of transactions having the highest values on the top.
    *
    * This endpoint should return output in JSON format
    */
    Flight::json(Flight::transfer_dao()->get_all());
});

Flight::start();
?>
