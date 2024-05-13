<?php
require_once "RiderModel.php";
require_once "RiderView.php";


$dbConnection = new mysqli("localhost", "root", "", "rider");
if ($dbConnection->connect_error) {
    die("Connection failed: " . $dbConnection->connect_error);
}

$riderModel = new RiderModel($dbConnection);
$riderView = new RiderView();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    if ($action == 'delete') {
        $riderModel->deleteRider($id);
        header("Location: RiderController.php");
    } elseif ($action == 'edit') {
        $rider = $riderModel->getRiderById($id);
        $riderView->renderUpdateForm($rider);
        exit;
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $riderModel->updateRider($id, $name);
    header("Location: RiderController.php");
}

$riders = $riderModel->getAllRiders();
$riderView->renderRiders($riders);

$dbConnection->close();
?>