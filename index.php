<?php
declare(strict_types=1);

namespace acme;
session_start();

use acme\sale\helper\VersionHelper as versionHelper;
use acme\controller\BasketController as BasketController;
use acme\test\OrderTest;

require_once("app/helper/DataLoaderHelper.php");
require_once("app/controller/BasketController.php");
require_once("test/OrderTest.php");

/**
 * Base Loader
 *
 * @version   0.1
 * @copyright Acme Widget Co.
 */
// Check PHP Version for 7.4
versionHelper::checkPHPVersion();

// Load Main Class
$mainController = new BasketController();
$mainController->MainController();

// Load Test Class
if (isset($_GET["test"]) && !empty($_GET["test"]) && $_GET["test"] == "order") {
    $orderTest = new OrderTest();

    print("<p>");
    print("<b>Total Cost for B01, G01: </b>" . $orderTest->basketTest1());
    print("<p>");
    print("<b>Total Cost for R01, R01: </b>" . $orderTest->basketTest2());
    print("<p>");
    print("<b>Total Cost for R01, G01: </b>" . $orderTest->basketTest3());
    print("<p>");
    print("<b>Total Cost for B01, B01, R01, R01, R01: </b>" . $orderTest->basketTest4());
}