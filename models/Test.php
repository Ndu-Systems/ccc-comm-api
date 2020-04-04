<?php
include_once 'Answer.php';

class Test
{
    //DB Stuff
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Add user
    public function add(
        $UserProfileId,
        $AddressId,
        $CreateUserId,
        $ModifyUserId,
        $StatusId

    ) {

        $TestId = getUuid($this->conn);

        $query = "
        INSERT INTO test(
            TestId,
            UserProfileId,
            AddressId,
            CreateUserId,
            ModifyUserId,
            StatusId
        )
        VALUES(
        ?,?,?,?,?,?
         )
";
        try {
            $stmt = $this->conn->prepare($query);
            if ($stmt->execute(array(
                $TestId,
                $UserProfileId,
                $AddressId,
                $CreateUserId,
                $ModifyUserId,
                $StatusId
            ))) {
                return $this->getById($TestId);
            }
        } catch (Exception $e) {
            return array("ERROR", $e);
        }
    }




    public function updatetest(
        $TestId,
        $UserProfileId,
        $AddressId,
        $CreateUserId,
        $ModifyUserId,
        $StatusId
    ) {
        $query = "UPDATE
        test
    SET
        TestId = ?,
        UserProfileId = ?,
        AddressId = ?,
        CreateUserId = ?,
        ModifyUserId = ?,
        StatusId = ?
        WHERE
        TestId = ?
         ";

        try {
            $stmt = $this->conn->prepare($query);
            if ($stmt->execute(array(
                $UserProfileId,
                $AddressId,
                $CreateUserId,
                $ModifyUserId,
                $StatusId,
                $TestId,

            ))) {
                return $this->getById($TestId);
            }
        } catch (Exception $e) {
            return array("ERROR", $e);
        }
    }

    public function getById($TestId)
    {
        $query = "SELECT * FROM test WHERE TestId =?";

        $stmt = $this->conn->prepare($query);
        $stmt->execute(array($TestId));

        if ($stmt->rowCount()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function getAll($StatusId)
    {
        $query = "SELECT * FROM test WHERE StatusId =?";

        $stmt = $this->conn->prepare($query);
        $stmt->execute(array($StatusId));

        if ($stmt->rowCount()) {
            $tests =  $stmt->fetchAll(PDO::FETCH_ASSOC);
            $detailedTests = array();
            foreach ($tests as $test) {
                $answer = new Answer($this->conn);
                $test["Answers"] =  $answer->getByTestId($test["TestId"]);
                array_push($detailedTests, $test);
            }
            return $detailedTests;
        }
    }
}
