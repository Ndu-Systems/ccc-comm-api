<?php
include_once 'Question.php';
class Answer


{
    //DB Stuff
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Add user
    public function add(
        $TestId,
        $QuestionId,
        $Answer,
        $SecondaryAnswer,
        $CreateUserId,
        $ModifyUserId,
        $StatusId

    ) {

        $AnswerId = getUuid($this->conn);

        $query = "
        INSERT INTO answer(
            AnswerId,
            TestId,
            QuestionId,
            Answer,
            SecondaryAnswer,
            CreateUserId,
            ModifyUserId,
            StatusId
        )
        VALUES(
        ?,?,?,?,?,?,?,?
         )
";
        try {
            $stmt = $this->conn->prepare($query);
            if ($stmt->execute(array(
                $AnswerId,
                $TestId,
                $QuestionId,
                $Answer,
                $SecondaryAnswer,
                $CreateUserId,
                $ModifyUserId,
                $StatusId
            ))) {
                return $this->getById($AnswerId);
            }
        } catch (Exception $e) {
            return array("ERROR", $e);
        }
    }




    public function updateanswer(
        $AnswerId,
        $TestId,
        $QuestionId,
        $Answer,
        $SecondaryAnswer,
        $CreateUserId,
        $ModifyUserId,
        $StatusId
    ) {
        $query = "UPDATE
        answer
    SET
    AnswerId = ?,
    TestId = ?,
    QuestionId = ?,
    Answer = ?,
    SecondaryAnswer = ?,
    CreateUserId = ?,
    ModifyUserId = ?,
    StatusId = ?
        WHERE
        AnswerId = ?
         ";

        try {
            $stmt = $this->conn->prepare($query);
            if ($stmt->execute(array(
                $TestId,
                $QuestionId,
                $Answer,
                $SecondaryAnswer,
                $CreateUserId,
                $ModifyUserId,
                $StatusId,
                $AnswerId,

            ))) {
                return $this->getById($AnswerId);
            }
        } catch (Exception $e) {
            return array("ERROR", $e);
        }
    }

    public function getById($AnswerId)
    {
        $query = "SELECT * FROM answer WHERE AnswerId =?";

        $stmt = $this->conn->prepare($query);
        $stmt->execute(array($AnswerId));

        if ($stmt->rowCount()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function getAll($StatusId)
    {
        $query = "SELECT * FROM answer WHERE StatusId =?";

        $stmt = $this->conn->prepare($query);
        $stmt->execute(array($StatusId));

        if ($stmt->rowCount()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    public function getByTestId($TestId)
    {
        $query = "SELECT * FROM answer WHERE TestId =?";

        $stmt = $this->conn->prepare($query);
        $stmt->execute(array($TestId));

        if ($stmt->rowCount()) {
            $detailedAnswers = Array();
            $answers = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($answers as $answer) {
                $question = new Question($this->conn);
                $answer['Question'] =  $question->getById($answer['QuestionId']);
                array_push($detailedAnswers, $answer);
            }
            return  $detailedAnswers;
        }
    }
}
