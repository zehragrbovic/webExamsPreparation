<?php
require '../vendor/autoload.php';

require "dao/CountriesDao.class.php";

Flight::register('country_dao', "CountriesDao");

/** TODO
* Use PDO connection to connect to MySQL Database
*
* Update configuration variables used to connect to MySQL database
*
* NOTE: Do not create new connection within each endpoint. Use connection variable which was set using Flight
*
* NOTE: Do not add new files to the project
*
* NOTE: table that contains investors is named investors and table with tranfers is named transfers
*
* NOTE: If you are having issues with non working routes in flightPHP you have to enable MOD_REWRITE on Apache
*/
$servername = "localhost";
$username = "root";
$password = "root";
$schema = "midterm-prep1";

//private $conn;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Flight::set("connection", $conn);
    //echo "CONNECTED";
} catch(PDOException $e) {
    echo "FAILED TO CONNECT DATABASE" . $e->getMessage();
}

Flight::route('GET /countries', function(){
    /** TODO
    * write a query that will list all countries from the database with following fields:
    * Code, Name, Continent, Population, GNP
    *
    * Output results should be sorted by GNP in descending order.
    *
    * This endpoint should return output in JSON format
    */
    
    Flight::json(Flight::country_dao()->get_all());
});

Flight::route('GET /countries_graph', function(){
    /** TODO
    * write a query that will total population of the countries.
    *
    * EXAMPLE: {  "name": "USA",
    *             "y": 500000000
    *          },
    *         {  "name": "Canada",
    *             "y": 500000000
    *          },...
    *
    * This data is used for ploting pie chart at frontend.
    *
    * This endpoint should return output in JSON format
    */
});

Flight::start();
?>
