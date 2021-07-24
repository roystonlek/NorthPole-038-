<?php
    require_once 'common.php';
    session_start();
    $dao = new OfferDAO;
    $id = $_GET['id'];
    $status = $dao->delete($id);
    header("Location:my_offers.php");
?>