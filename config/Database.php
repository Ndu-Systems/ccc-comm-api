<?php
include_once 'headers.php';
include_once '../../common/common.php';

class Database
{
    private $isLocal = false;
    public function connect()
    {
        $conn = null;
        try {
            if ($this->isLocal) {
                $conn = new PDO('mysql:host=localhost;dbname=cccdb', 'root', '');
            } else {
                $conn = new PDO('mysql:host=127.0.0.1;dbname=smphiqmu_covid', 'smphiqmu_covid', 'Harder01!');
            }

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo json_encode($e->getMessage());
        }
        return $conn;
    }
}
 