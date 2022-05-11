<?php

class getName
{
    public static function getData($column, $table)
    {
        $conn = ConnectDb::connect();
        $command = "SELECT " . $column . " FROM " . $table;
        $stmt = $conn->prepare($command);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $result = [];
        foreach ($data as $value) {
            $result[] = $value[$column];
        }
        $conn = null;
        return $result;
    }

    public static function getName($column, $table, $chuoiQuyDinh)
    {
        $ngauNhien = array_merge(range(0, 9), range(0, 9), range(0, 9), range(0, 9));
        $chuoiNgauNhien = implode("", $ngauNhien);
        $chuoiNgauNhien = str_shuffle($chuoiNgauNhien);
        $chuoi5KiTu = substr($chuoiNgauNhien, 0, 5);
        $ghepChuoi = $chuoiQuyDinh . $chuoi5KiTu;
        $result = getName::getData($column, $table);
        if (!empty($result)) {
            $flag = true;
            foreach ($result as $value) {
                if ($value == $ghepChuoi) {
                    $flag = false;
                }
            }
            if (!$flag) {
                self::getName($column, $table, $chuoiQuyDinh);
            }
            return $ghepChuoi;
        } else {
            return false;
        }

    }

}