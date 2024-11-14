<?php                   
include "../../config/connect.php";

class Contact{
    public function validate($data)
    {
        $errors = [];

        if (empty($data['email'])) {
            $errors['email']['required'] = "Vui lòng nhập email!";
        }

        if (empty($data['phone'])) {
            $errors['phone']['required'] = "Vui này nhập số điện thoại!";
        }

        if (empty($data['customer_id'])) {
            $errors['customer_id']['required'] = "Vui này chọn khách hàng!";
        }

        if(empty($errors)){
            return [];
        }
        return $errors;

    }
    
    public function isExist($data)
    {
        global $conn;
        $sql = "SELECT * FROM contact WHERE email='$data[email]' LIMIT 1";
        $run = mysqli_query($conn, $sql);
        if($run->num_rows == 1){
            return true;
        }
        return false;
    }
}