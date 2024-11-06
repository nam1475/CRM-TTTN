<?php                   
include "../../config/connect.php";

class Lead{
    public function validate($data)
    {
        $errors = [];

        if (empty($data['customer_id'])) {
            $errors['customer_id']['required'] = "Vui lòng chọn tên khách hàng!";
        }

        if (empty($data['source_id'])) {
            $errors['source_id']['required'] = "Vui này chọn nguồn khách hàng tiềm năng!";
        }

        if(empty($errors)){
            return [];
        }
        return $errors;

    }
    
    public function isExist($data)
    {
        global $conn;
        $sql = "SELECT * FROM lead WHERE customer_id='$data[customer_id]' LIMIT 1";
        $run = mysqli_query($conn, $sql);
        if($run->num_rows == 1){
            return true;
        }
        return false;
    }
}