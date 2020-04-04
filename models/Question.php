<?php
class Question
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
        $Question,
        $SecondaryQuestion,
        $CreateUserId,
        $ModifyUserId,
        $StatusId

    ) {

        $QuestionId = getUuid($this->conn);

        $query = "
        INSERT INTO question(
            QuestionId,
            Name,
            Question,
            SecondaryQuestion,
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
                $QuestionId,
                $Name,
                $Question,
                $SecondaryQuestion,
                $CreateUserId,
                $ModifyUserId,
                $StatusId
            ))) {
                return $this->getById($QuestionId);
            }
        } catch (Exception $e) {
            return array("ERROR", $e);
        }
    }




    public function updatequestion(
        $QuestionId,
        $Name,
        $Question,
        $SecondaryQuestion,
        $CreateUserId,
        $ModifyUserId,
        $StatusId
    ) {
        $query = "UPDATE
        question
    SET
        CompanyId = ?,
        Name = ?,
        CreateUserId = ?,
        ModifyUserId = ?,
        StatusId = ?,
        ModifyDate = NOW()
        WHERE
        QuestionId = ?
         ";

        try {
            $stmt = $this->conn->prepare($query);
            if ($stmt->execute(array(
                $Name,
                $Question,
                $SecondaryQuestion,
                $CreateUserId,
                $ModifyUserId,
                $StatusId,
                $QuestionId,

            ))) {
                return $this->getById($QuestionId);
            }
        } catch (Exception $e) {
            return array("ERROR", $e);
        }
    }

    public function getById($QuestionId)
    {
        $query = "SELECT * FROM question WHERE QuestionId =?";

        $stmt = $this->conn->prepare($query);
        $stmt->execute(array($QuestionId));

        if ($stmt->rowCount()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function getAll($StatusId)
    {
        $query = "SELECT * FROM question WHERE StatusId =?";

        $stmt = $this->conn->prepare($query);
        $stmt->execute(array($StatusId));

        if ($stmt->rowCount()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}
