<?php

class UserProfile
{
    private $conn;

    public function __construct($db)
    {
        $this->conn =  $db;
    }

    public function SignIn(
        $Email,
        $Password
    ) {
        # code...
        // if ($this->getByEmail($Email) > 0) {
        //     return "user already exists";
        // }
        // $UserId = getUuid($this->conn);

        $query = "SELECT 
                * FROM userprofile where Email = ?
                AND BINARY Password = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array($Email, $Password));

        if ($stmt->rowCount()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);;
        }
    }

    public function getByEmail($Email)
    {        
        $query = "SELECT 
                * FROM userprofile where Email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array($Email));

        if ($stmt->rowCount()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);;
        }
    }
}
