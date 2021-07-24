<?php
    require_once 'common.php';
    session_start();
    $dao = new OfferDAO;
    $id = $_GET['id'];
    $status = false;
    $user = $_SESSION['user'];
    $fullname = $user->getFullname();
?>

<?php include 'header.php'; ?>

<?php
    echo "<div align='center'>";
    if (isset($_POST['title'])){
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $pax = $_POST['pax'];
        $user = $_SESSION['user'];
        $host = $user->getUsername();
        $category = $_POST['category'];
        $status = $dao->edit($id, $title, $desc, $pax, $host, $category);
    }
    
    if ($status){
        echo"<br><br><br><br><h2>Your team has been edited</h2><h2><br>";
        echo "<a href='my_offers.php'>View My Teams</a></h2>";
        exit;
    }

    echo "<br><br><h2>Edit your team details</h2>";
    echo "<form method='POST'>";
    echo "<table border = '1'>";
    echo "<th>Title</th> 
            <td><input type='text' name='title'><br></td>";
    echo "<tr><th>Description</th><td><input type='text' name='desc'></td><br>";
    echo "<tr><th>Pax</th><td> <input type='text' name='pax'><br></td>";
    echo "<tr><th>Category</th><td> <input type='text' name='category'><br></td>";
    echo "</table>";
    echo "<br><input type='submit'>";
    echo "</form>";

    echo "</div>";
?>