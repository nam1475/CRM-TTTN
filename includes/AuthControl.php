<?php                   
include "../../config/connect.php";

class auth{
    public function isValidUser($data){
        global $conn;
        // $users = "SELECT * FROM user WHERE username='$data[username]' AND password='$data[password]' LIMIT 1";
        $sql = "SELECT * FROM user WHERE username='$data[username]' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        /* Nếu tìm thấy tên (Tức là trả về 1 bản ghi) */
        if($result->num_rows == 1){
            $user = $result->fetch_assoc();
            $verifyPassword = password_verify($data['password'], $user['password']);
            /* Nếu đúng mật khẩu */
            if($verifyPassword){
                return true;
            }
            return false;
        }
        return false;
        
    }

    // public function register($data){
    //     global $conn;
    //     $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    //     $sql = "insert into user(username, password) values('$data[username]', '$data[password]')";
    //     $run = mysqli_query($conn, $sql);
    //     return $run;
    // }
    
    // public function isExistUsername($username){
    //     global $conn;
    //     $sql = "SELECT * FROM user WHERE username='$username' LIMIT 1";
    //     $run = mysqli_query($conn, $sql);
    //     if($run->num_rows == 1){
    //         return true;
    //     }
    //     return false;
    // }

    // public function validateRegister($data){
    //     $errors = [];
        
    //     if(empty($data['username'])){
    //         $errors['username']['required'] = "Vui lòng nhập tên!";
    //     }
    //     $pattern = "/^[A-Z][a-zA-Z0-9]*[0-9]+[a-zA-Z0-9]*$/";
    //     if(!preg_match($pattern, $data['username'])){
    //         $errors['username']['pattern'] = "Tên đăng nhập phải viết hoa chữ cái đầu tiên và có chứa số!";
    //     }
    //     if($this->isExistUsername($data['username'])){
    //         $errors['username']['exist'] = "Tên đăng nhập đã tồn tại!";
    //     }
    //     if(empty($data['password'])){
    //         $errors['password']['required'] = "Vui lòng nhập mật khẩu!";
    //     }
    //     if(empty($data['confirm_password'])){
    //         $errors['confirm_password']['required'] = "Vui lòng nhập lại mật khẩu!";
    //     }
    //     if($data['password'] != $data['confirm_password']){
    //         $errors['confirm_password']['not_match'] = "Mật khẩu không trùng khớp!";
    //     }
    //     if(empty($errors)){
    //         return [];
    //     }
    //     return $errors;
    // }

    public function validateLogin($data){
        $errors = [];
        if(empty($data['username'])){
            $errors['username']['required'] = "Vui lòng nhập tên đăng nhập!";
        }
        if(empty($data['password'])){
            $errors['password']['required'] = "Vui lòng nhập mật khẩu!";
        }
        if(empty($errors)){
            return [];
        }
        return $errors;
    }
    

}