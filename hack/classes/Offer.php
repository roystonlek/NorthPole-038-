<?php

class Offer {
    private $grpID;
    private $grpTitle;
    private $grpDesc;
    private $grpPax;
    private $grpHost;
    private $grpCategory;

    public function __construct($grpID, $grpTitle, $grpDesc, $grpPax, $grpHost, $grpCategory) {
        $this->grpID = $grpID;
        $this->grpTitle = $grpTitle;
        $this->grpDesc = $grpDesc;
        $this->grpPax = $grpPax;
        $this->grpHost = $grpHost;
        $this->grpCategory = $grpCategory;
    }

    public function getgrpID() {
        return $this->grpID;
    }

    public function getgrpTitle() {
        return $this->grpTitle;
    }

    public function getgrpDesc() {
        return $this->grpDesc;
    }

    public function getgrpPax() {
        return $this->grpPax;
    }

    public function getgrpHost() {
        return $this->grpHost;
    }

    public function getgrpCategory() {
        return $this->grpCategory;
    }

}

?>