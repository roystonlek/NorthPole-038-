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

        if (isset($_POST['category'])){
            $selected_category = $_POST['category'];
        }   

    ?>

    <?php include 'header.php'; ?>

    <center>

    <h1> All Teams</h1>

    <?php
        // Add code here or elsewhere in this file
        
        $dao = new OfferDAO;
        $categoryLst = $dao->getCategories();
        $categoryLst = array_unique($categoryLst);

        echo "<form method='POST'>
            Search by category <select name='category'>";
            foreach ($categoryLst as $category){
                $selected = '';
                if ($selected_category == $category){
                    $selected = 'selected';
            }
            echo "<option $selected>$category</option>";
        }
        echo "</select>";
        echo " <input type='submit' value='Search'>";
        echo " <input type='submit' name='reset' value='Reset'>";
        echo "</form><br>";

        echo "
        <table border='1'>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Desc</th>
                <th>Pax</th>
                <th>Host</th>
                <th>Category</th>
            </tr>";
        $dao = new OfferDAO;

        $offers = $dao->getAll();
        if (isset($selected_category) && !isset($_POST['reset']) ){
            $offers = $dao->getCategory($selected_category);
        }
        foreach ($offers as $offer){
            echo "<tr>";
            echo "<td>{$offer->getgrpID()}</td>";
            echo "<td>{$offer->getgrpTitle()}</td>";
            echo "<td>{$offer->getgrpDesc()}</td>";
            echo "<td>{$offer->getgrpPax()}</td>";
            echo "<td><a href='https://t.me/{$offer->getgrpHost()}' target='blank'>{$offer->getgrpHost()}</a></td>";
            echo "<td>{$offer->getgrpCategory()}</td>";
            echo "</tr>";
        }

        echo "</table>";

    ?>

    </center>
    
</body>
</html>