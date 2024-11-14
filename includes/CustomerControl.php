<?php                   
include "../../config/connect.php";

class Customer{
    public function validate($data)
    {
        $errors = [];

        if (empty($data['name'])) {
            $errors['name']['required'] = "Vui lòng nhập tên!";
        }

        if (empty($data['address'])) {
            $errors['address']['required'] = "Vui này nhập địa chỉ!";
        }

        if(empty($errors)){
            return [];
        }
        return $errors;

    }
    
    public function isExist($data)
    {
        global $conn;
        $sql = "SELECT * FROM customer WHERE name='$data[name]' LIMIT 1";
        $run = mysqli_query($conn, $sql);
        if($run->num_rows == 1){
            return true;
        }
        return false;
    }
}