<?php
// include "../config/connect.php";

class Helper
{
    public function selectAll($table)
    {
        try {
            global $conn;
            $sql = "SELECT * FROM $table";
            // $sql = "SELECT * FROM $table LIMIT 0, 5";
            $run = mysqli_query($conn, $sql);
            return $run;
        } catch (Exception $e) {
            echo "<p style='color: red'>";
            echo $e->getMessage(), "<br>";
            echo "</p>";
            echo "File: ", $e->getFile(), "<br>";
            echo "Line: ", $e->getLine(), "<br>";
        }
    }

    public function selectByName($table, $name){
        global $conn;
        $sql = "SELECT * FROM $table WHERE name LIKE '%$name%' LIMIT 1";
        $run = mysqli_query($conn, $sql);
        /* Nếu tìm thấy tên (Tức là trả về 1 bản ghi) */
        if($run->num_rows == 1){
            return true;
        }
        else{
            return false;
        }
    }

    public function selectById($table, $id) 
    {
        try {
            global $conn;
            $sql = "SELECT * FROM $table WHERE id = $id LIMIT 1";
            $run = mysqli_query($conn, $sql);
            $row = $run->fetch_assoc();
            return $row;
        } catch (Exception $e) {
            echo "<p style='color: red'>";
            echo $e->getMessage(), "<br>";
            echo "</p>";
            echo "File: ", $e->getFile(), "<br>";
            echo "Line: ", $e->getLine(), "<br>";
        }
    }
    
    public function isValidName($table, $module){
        $nameExist = "";

        $product = $this->selectByName($table, $_POST['name']);
        if($product){
            $nameExist = "Tên $module đã tồn tại";  
            return $nameExist;
        }
        return $nameExist;
    }

    public function btnEdit($param1, $param2)
    {
        $html = '
        <a class="btn btn-primary" href="../layouts/main.php?action=' . $param1 . '-edit&id=' . $param2['id'] . '">
            <i class="fa-solid fa-pen-to-square"></i>   
        </a>
        ';
        return $html;
    }

    public function btnDelete($param1, $param2)
    {
        $html = '
        <a class="btn btn-danger m-0"  href="../layouts/main.php?action=' . $param1 . '-delete&id=' . $param2['id'] . '" onclick="return confirm(\'Bạn có chắc muốn xóa ?\')">
            <i class="fa-solid fa-trash"></i>
        </a>
        ';
        return $html;
    }

    public function addRow($table, $data)
    {
        try {
            global $conn;
            $sql = "insert into $table(";
            foreach($data as $key => $value){
                $sql .= $key.",";   
            }
            $sql = substr($sql, 0, -1);
            $sql .= ") values(";
            foreach($data as $key => $value){
                $sql .= "'$value',";
            }
            $sql = substr($sql, 0, -1);
            $sql .= ")";
            
            var_dump($sql);

            $run = mysqli_query($conn, $sql);
            return $run;
        } catch (Exception $e) {
            echo "<p style='color: red'>";
            echo $e->getMessage(), "<br>";
            echo "</p>";
            echo "File: ", $e->getFile(), "<br>";
        }
    }

    public function updateRow($table, $id, $data = [])
    {
        try{
            global $conn;
            $sql = "update $table set ";
            foreach($data as $key => $value){
                $sql .= $key." = '$value',";
            }
            $sql = substr($sql, 0, -1);
            $sql .= " where id = $id";

            $run = mysqli_query($conn, $sql);
            return $run;
        }
        catch(Exception $e){
            echo "<p style='color: red'>";
            echo $e->getMessage(), "<br>";
            echo "</p>";
            echo "File: ", $e->getFile(), "<br>";
            echo "Line: ", $e->getLine(), "<br>";
        }
    }

    public function deleteRow($table, $id, $nameDir)
    {
        try {
            global $conn;
            $sql = "DELETE FROM $table WHERE id='$id'";
            $run = mysqli_query($conn, $sql);
            header('Location: ../layouts/main.php?action=' . $nameDir . '-list');
            return $run;
        } catch (Exception $e) {
            echo "<p style='color: red'>";
            echo $e->getMessage(), "<br>";
            echo "</p>";
            echo "File: ", $e->getFile(), "<br>";
            echo "Line: ", $e->getLine(), "<br>";
        }
    }

    public function active($active)
    {
        return $active == 1 ?
            '<div><i class="fa-solid fa-circle-check" style="color:green; font-size:40px;"></i></div>'
            :
            '<div><i class="fa-solid fa-circle-xmark" style="color:red; font-size:40px;"></i></div>';
    }


}
