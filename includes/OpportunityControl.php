<?php                   
include "../../config/connect.php";

class Opportunity{
    public function validate($data)
    {
        $errors = [];

        if (empty($data['lead_id'])) {
            $errors['lead_id']['required'] = "Vui lòng chọn khách hàng tiềm năng!";
        }

        if (empty($data['expected_close_date'])) {
            $errors['expected_close_date']['required'] = "Vui lòng chọn ngày kết thúc dự kiến!";
        }

        if(empty($errors)){
            return [];
        }
        return $errors;

    }

    public function isExist($data)
    {
        global $conn;
        $sql = "SELECT * FROM opportunity WHERE lead_id='$data[lead_id]' LIMIT 1";
        $run = mysqli_query($conn, $sql);
        if($run->num_rows == 1){
            return true;
        }
        return false;
    }
}