<?php

class admin extends dbh
{
    private $userName;
    private $pwd;
    private $adminName;

    public function __construct($userName, $pwd, $adminName)
    {
        $this->userName = $userName;
        $this->pwd = $pwd;
        $this->adminName = $adminName;
    }

//    Thêm admin - proc_admin_insert
    public function setAdmin()
    {
        $passwordHash = password_hash($this->pwd, PASSWORD_DEFAULT);
        $sql = "call proc_admin_insert( ?,?,?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);
        $stmt->execute([$this->userName, $passwordHash, $this->adminName]);
        if($stmt -> rowCount() == 0){
            return false;
        }
        $conn = null;
    }

    // lấy dữ liệu admin - proc_admin_select
    public function getAdmin()
    {
        $sql = "call proc_admin_selectName( ?)";
         $conn = $this->connect();
        $stmt = $conn ->prepare($sql);
        $stmt->execute([$this->userName]);
        $data = $stmt->fetchAll();
        if (count($data) > 0) {
            return $data;
        } else {
            return false;
        }
        $conn = null;

    }

//    chỉnh sửa thông tin tải khoảng admin - proc_admin_update
    public function editAdmin()
    {
        $passwordHash = password_hash($this->pwd, PASSWORD_DEFAULT);
        $sql = "call proc_admin_update( ?,?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);;
        $stmt->execute([$this->userName, $passwordHash]);
        $count = $stmt->rowCount();
        if ($count = 0) {
            return false;
        }
        $conn = null;

    }


}








