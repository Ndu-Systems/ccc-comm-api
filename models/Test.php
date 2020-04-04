<?php
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
        $Name,
        $test,
        $Secondarytest,
        $CreateUserId,
        $ModifyUserId,
        $StatusId

    ) {

        $TestId = getUuid($this->conn);

        $query = "
        INSERT INTO test(
            TestId,
            Name,
            test,
            Secondarytest,
            CreateUserId,
            ModifyUserId,
            StatusId
        )
        VALUES(
        ?,?,?,?,?,?,?
         )
";
        try {
            $stmt = $this->conn->prepare($query);
            if ($stmt->execute(array(
                $TestId,
                $Name,
                $test,
                $Secondarytest,
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
        $Name,
        $test,
        $Secondarytest,
        $CreateUserId,
        $ModifyUserId,
        $StatusId
    ) {
        $query = "UPDATE
        test
    SET
        Name = ?,
        test = ?,
        Secondarytest = ?,
        CreateUserId = ?,
        ModifyUserId = ?,
        StatusId= ?
        WHERE
        TestId = ?
         ";

        try {
            $stmt = $this->conn->prepare($query);
            if ($stmt->execute(array(
                $Name,
                $test,
                $Secondarytest,
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
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}
