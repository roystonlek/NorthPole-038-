<html>
    
<body>
    

    <?php
        require_once 'common.php';
        // Add code here or elsewhere in this file
        session_start();
        if (isset($_POST['logout'])){
            session_unset();
            header("Location: login.php");
        }

        if (! isset($_SESSION['user'])){
            header("Location: login.php");
        }

        $user = $_SESSION['user'];
        $fullname = $user->getFullname();
        $username = $user->getUsername();

        if (isset($_POST['category'])){
            $selected_category = $_POST['category'];
        }   

    ?>

    <?php include 'header.php'; ?>

    <center>
    
    <h1> My Teams</h1>

    <?php
        // Add code here or elsewhere in this file
        
        $dao = new OfferDAO;

        $offers = $dao->getMyOffers($username);
        if (isset($selected_category) && !isset($_POST['reset']) ){
            $offers = $dao->getCategory($selected_category);
        }
        if (count($offers) == 0){
            echo "<p>No current teams</p>";
            exit;
        }
        echo "
        <table border='1'>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Desc</th>
                <th>Pax</th>
                <th>Host</th>
                <th>Category</th>
                <th></th>
                <th></th>
            </tr>";
        $dao = new OfferDAO;

        foreach ($offers as $offer){
            echo "<tr>";
            echo "<td>{$offer->getgrpID()}</td>";
            echo "<td>{$offer->getgrpTitle()}</td>";
            echo "<td>{$offer->getgrpDesc()}</td>";
            echo "<td>{$offer->getgrpPax()}</td>";
            echo "<td>{$offer->getgrpHost()}</td>";
            echo "<td>{$offer->getgrpCategory()}</td>";
            echo "<td><a href='edit.php?id={$offer->getgrpID()}'>Edit</a></td>";
            echo "<td><a href='delete.php?id={$offer->getgrpID()}'>Delete</a></td>";
            echo "</tr>";
        }

        echo "</table>";

    ?>

    </center>
    
</body>
</html>