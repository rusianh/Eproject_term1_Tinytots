<?php

// admin class extend database - this class help add, edit , get data admin object

class admin extends dbh
{


//    Thêm admin - proc_admin_insert
    public function setAdmin($userName, $pwd, $adminName)
    {
        $passwordHash = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "call proc_admin_insert( ?,?,?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);
        $stmt->execute([$userName, $pwd, $adminName]);
        $conn = null;
    }

    // lấy dữ liệu admin - proc_admin_select
    public function getAdmin($userName)
    {
        $sql = "call proc_admin_selectName( ?)";
         $conn = $this->connect();
        $stmt = $conn ->prepare($sql);
        $stmt->execute([$userName]);
        $data = $stmt->fetchAll();
        return $data;
        $conn = null;

    }

//    chỉnh sửa thông tin tải khoảng admin - proc_admin_update
    public function editAdmin($userName, $pwd)
    {
        $passwordHash = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = "call proc_admin_update( ?,?)";
        $conn = $this->connect();
        $stmt = $conn ->prepare($sql);;
        $stmt->execute([$userName, $passwordHash]);
        $conn = null;

    }


}








