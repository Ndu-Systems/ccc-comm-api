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
        $CreateUserId,
        $StatusId
    ) {
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
                $StatusId
            ))) {
                return $this->getUserById($UserId);
            }
        } catch (Exception $e) {
            return array("ERROR", $e);
        }
    }

    public function getAllUsers($StatusId)
    {
        $query = "SELECT * FROM userprofile WHERE StatusId =?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array($StatusId));
        if ($stmt->rowCount()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    public function addUser(
        $FirstName,
        $Surname,
        $Age,
        $DOB,
        $Sex,
        $ContactNumber,
        $Email,
        $Password,
        $Address,
        $City,
        $Province,
        $PostCode,
        $ParentFirstName,
        $ParentSurname,
        $RoleId,
        $OrganizationId,
        $CreateUserId,
        $StatusId
    ) {
         # code...
         if ($this->getByEmail($Email) > 0) {
            return "user already exists with this email address";
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
            Sex,
            ContactNumber,
            Address,
            City,
            Province,
            PostCode,
            ParentFirstName,
            ParentSurname,
            OrganizationId,
            RoleId,
            CreateUserId,          
            StatusId
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

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
                $Sex,
                $ContactNumber,
                $Address,
                $City,
                $Province,
                $PostCode,
                $ParentFirstName,
                $ParentSurname,
                $OrganizationId,
                $RoleId,
                $CreateUserId,
                $StatusId
            ))) {
                return $this->getUserById($UserId);
            }
        } catch (Exception $e) {
            return array("ERROR", $e);
        }
    }
}
