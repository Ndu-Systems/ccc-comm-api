<?php

include_once '../../models/UserProfile.php';
include_once '../../config/Database.php';

$data = json_decode(file_get_contents("php://input"));

$FirstName = $data->FirstName;
$Surname = $data->Surname;
$Age = $data->Age;
$DOB = $data->DOB;
$Sex = $data->Sex;
$ContactNumber = $data->ContactNumber;
$Email = $data->Email;
$Password = $data->Password;
$Address = $data->Address;
$City = $data->City;
$Province = $data->Province;
$PostCode = $data->PostCode;
$ParentFirstName = $data->ParentFirstName;
$ParentSurname = $data->ParentSurname;
$RoleId = $data->RoleId;
$OrganizationId = $data->OrganizationId;
$CreateUserId = $data->CreateUserId;
$StatusId = $data->StatusId;
 

$database = new Database();
$db = $database->connect();

$userProfile = new UserProfile($db);

$result = $userProfile->addUser(
    $FirstName,
    $Surname,
    $Age,
    $DOB ,
    $Sex ,
    $ContactNumber,
    $Email,
    $Password,
    $Address ,
    $City ,
    $Province ,
    $PostCode ,
    $ParentFirstName,
    $ParentSurname,
    $RoleId ,
    $OrganizationId, 
    $CreateUserId,
    $StatusId    
);

echo json_encode($result);