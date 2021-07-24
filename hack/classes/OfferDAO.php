<?php

class OfferDAO {

    public function getAll() {
        
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        $sql = "SELECT * FROM offers";
        $stmt = $conn->prepare($sql);

        $OfferLst = [];

        if ( $stmt->execute() ) {

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            while ( $row = $stmt->fetch() ) {
                $OfferLst[] = new Offer(
                                        $row["grpID"],
                                        $row["grpTitle"], 
                                        $row["grpDesc"], 
                                        $row["grpPax"], 
                                        $row["grpHost"],
                                        $row["grpCategory"]
                            );
            }

        }
        else {
            $connMgr->handleError( $stmt, $sql );
        }

        $stmt = null;
        $conn = null;        

        return $OfferLst;
    }

    public function getCategories() {

        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        $sql = "SELECT * FROM offers";
        $stmt = $conn->prepare($sql);

        $CategoryLst = [];

        if ( $stmt->execute() ) {

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            while ( $row = $stmt->fetch() ) {
                $CategoryLst[] = $row["grpCategory"];
            }

        }

        $stmt = null;
        $conn = null;        

        return $CategoryLst;
    }

    public function getCategory($category) {

        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        $sql = "SELECT * FROM offers
                WHERE grpCategory = :category";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":category", $category, PDO::PARAM_STR);

        $OfferLst = [];

        if ( $stmt->execute() ) {

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            while ( $row = $stmt->fetch() ) {
                $OfferLst[] = new Offer(
                    $row["grpID"],
                    $row["grpTitle"], 
                    $row["grpDesc"], 
                    $row["grpPax"], 
                    $row["grpHost"],
                    $row["grpCategory"]
                );
            }

        }

        $stmt = null;
        $conn = null;        

        return $OfferLst;
    }

    public function getMyOffers($username) {

        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        $sql = "SELECT * FROM offers
                WHERE grpHost = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);

        $OfferLst = [];

        if ( $stmt->execute() ) {

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            while ( $row = $stmt->fetch() ) {
                $OfferLst[] = new Offer(
                    $row["grpID"],
                    $row["grpTitle"], 
                    $row["grpDesc"], 
                    $row["grpPax"], 
                    $row["grpHost"],
                    $row["grpCategory"]
                );
            }

        }

        $stmt = null;
        $conn = null;        

        return $OfferLst;
    }

    public function insert($title, $desc, $pax, $host, $category) {

        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        $sql = "INSERT INTO offers (grpTitle, grpDesc, grpPax, grpHost, grpCategory) VALUES (:grpTitle, :grpDesc, :grpPax, :grpHost, :grpCategory)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':grpTitle', $title,PDO::PARAM_STR);
        $stmt->bindParam(':grpDesc', $desc,PDO::PARAM_STR);
        $stmt->bindParam(':grpPax', $pax,PDO::PARAM_STR);
        $stmt->bindParam(':grpHost', $host,PDO::PARAM_STR);
        $stmt->bindParam(':grpCategory', $category,PDO::PARAM_STR);
        $status = $stmt->execute(); 

        $stmt = null;
        $conn = null;
        
        return $status;
    }

    public function edit($id, $title, $desc, $pax, $host, $category) {

        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        $sql = "UPDATE offers SET grpTitle = :grpTitle, grpDesc = :grpDesc, grpPax = :grpPax, grpHost = :grpHost, grpCategory = :grpCategory WHERE grpID = :grpID";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':grpTitle', $title,PDO::PARAM_STR);
        $stmt->bindParam(':grpDesc', $desc,PDO::PARAM_STR);
        $stmt->bindParam(':grpPax', $pax,PDO::PARAM_STR);
        $stmt->bindParam(':grpHost', $host,PDO::PARAM_STR);
        $stmt->bindParam(':grpCategory', $category,PDO::PARAM_STR);
        $stmt->bindParam(':grpID', $id,PDO::PARAM_STR);
        $status = $stmt->execute(); 

        $stmt = null;
        $conn = null;
        
        return $status;
    }

    public function delete($id) {

        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        $sql = "DELETE FROM offers WHERE (grpID = :id)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $status = $stmt->execute(); 

        $stmt = null;
        $conn = null;
        
        return $status;
    }

}

?>  