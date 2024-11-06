<?php                   
include "../../config/connect.php";

class LeadSource{
    public function validate($data)
    {
        $errors = [];

        if (empty($data['name'])) {
            $errors['name']['required'] = "Vui lòng nhập tên nguồn!";
        }

        if(empty($errors)){
            return [];
        }
        return $errors;

    }

    public function isExist($data)
    {
        global $conn;
        $sql = "SELECT * FROM lead_source WHERE name LIKE '%$data[name]%' LIMIT 1";
        $run = mysqli_query($conn, $sql);
        if($run->num_rows == 1){
            return true;
        }
        return false;
    }
}