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
     

        $query = "SELECT 
                * FROM userprofile where Email = ?
                AND BINARY Password = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array($Email, $Password));

        if ($stmt->rowCount()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);;
        }
    }
    public function SignUp(
        $Email,
        $Password,
        $FirstName,
        $Surname,
        $DOB,
        $Age,
        $ContactNumber,
        $CreateUserId  
    )
    {
        # code...
        if ($this->getByEmail($Email) > 0) {
            return "user already exists";
        }
        $UserId = getUuid($this->conn);
        $query = "INSERT INTO userprofile (
            UserProfileId,
            FirstName,
            Surname,
            Email,
            Password,
            DOB,
            Age,
            ContactNumber,
            CreateUserId,          
            StatusId
        ) VALUES (?,?,?,?,?,?,?,?,?,?)";
 
        try {
            $stmt = $this->conn->prepare($query);
            if ($stmt->execute(array(
                $UserId,
                $FirstName,
                $Surname,
                $Email,
                $Password,
                $DOB,
                $Age,
                $ContactNumber,
                $CreateUserId,
                1
            ))) {
                return $this->getUserById($UserId);
            }
        } catch (Exception $e) {
            return array("ERROR", $e);
        }
    }
    
    public function getUserById($UserId)
    {
        $query = "SELECT * FROM userprofile WHERE UserProfileId =?";

        $stmt = $this->conn->prepare($query);
        $stmt->execute(array($UserId));

        if ($stmt->rowCount()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
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
