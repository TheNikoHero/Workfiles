<?php

include('../include/session.php');

class crud {

    private $dbCon;

    function __construct($dbCon) {
        $this->dbCon = $dbCon;
    }

    public function create($title, $text) {
        try {
            date_default_timezone_set('Europe/Copenhagen');
            $stmt = $this->dbCon->prepare("INSERT INTO news (title, text, date, user_id, clicks) 
                                                       VALUES(:title, :text, :date, :user_id, :clicks)");

            $todayDate = date('Y-m-d H:i:s'); //todays date, ex: 2016-04-29 10:12:18

            $user_id = $_SESSION['userSession']; //gets the user id from DB, in the user.php class file (located: class/user.php
            $clicks = 0; // sets the click int to 0, since we determines what content is most popular on clicks

            $stmt->bindparam(":title", $title);
            $stmt->bindparam(":text", $text);
            $stmt->bindparam(":date", $todayDate);
            $stmt->bindparam(":user_id", $user_id);
            $stmt->bindparam(":clicks", $clicks);

            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

// HERE ENDS THE PUBLIC FUNCTION

    public function readByUser() {
        try {
            $SQL_user = "SELECT id, title, text, date, user_id, clicks
        FROM news WHERE user_id = " . $_SESSION['userSession'] . "
        ORDER BY date DESC";

            $queryUser = $this->dbCon->query($SQL_user);
            $queryUser->setFetchMode(PDO::FETCH_ASSOC);
            
        } catch (Exception $ex) {
            
        }
    }

}

?>