<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: ../alert/403.php');
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        include "./header.php";
        ?>
    </head>

    <body>
        <div class="wrapper">
            <?php
            include "./navbar.php";
            include "./sidebar.php";
            include "../../helper/helper.php";
            include "../../config/connect.php";

            $helper = new Helper();
            ?>        

            <!-- Content -->
            <?php
            if(isset($_GET["action"])){
                $action = $_GET["action"];

                switch($action){
                    case 'lead-list':
                        include "../lead/list.php";
                        break;
                    case 'lead-add':
                        include "../lead/add.php";
                        break;
                    case 'lead-edit':
                        include "../lead/edit.php";
                        break;
                    case 'lead-delete':
                        include "../lead/delete.php";
                        $helper->deleteRow('lead', $_GET['id'], 'lead');
                        $_SESSION['success'] = "Xóa khách hàng tiềm năng thành công";
                        break;
                    case 'lead-source-list':
                        include "../leadSource/list.php";
                        break;
                    case 'lead-source-add':
                        include "../leadSource/add.php";
                        break;
                    case 'lead-source-edit':
                        include "../leadSource/edit.php";
                        break;
                    case 'lead-source-delete':
                        include "../leadSource/delete.php";
                        $helper->deleteRow('lead_source', $_GET['id'], 'lead-source');
                        $_SESSION['success'] = "Xóa nguồn khách hàng tiềm năng thành công!";
                        break;
                    case 'opportunity-list':
                        include "../opportunity/list.php";
                        break;
                    case 'opportunity-add':
                        include "../opportunity/add.php";
                        break;
                    case 'opportunity-edit':
                        include "../opportunity/edit.php";
                        break;
                    case 'opportunity-delete':
                        include "../opportunity/delete.php";
                        $helper->deleteRow('opportunity', $_GET['id'], 'opportunity');
                        $_SESSION['success'] = "Xóa cơ hội thành công";
                        break;
                    case 'customer-list':
                        include "../customer/list.php";
                        break;
                    case 'customer-add':
                        include "../customer/add.php";
                        break;
                    case 'customer-edit':
                        include "../customer/edit.php";
                        break;
                    case 'customer-delete':
                        include "../customer/delete.php";
                        $helper->deleteRow('customer', $_GET['id'], 'customer');
                        $_SESSION['success'] = "Xóa khách hàng thành công!";
                        break;
                    case 'contact-list':
                        include "../contact/list.php";
                        break;
                    case 'contact-add':
                        include "../contact/add.php";
                        break;
                    case 'contact-edit':
                        include "../contact/edit.php";  
                        break;
                    case 'contact-delete':
                        include "../contact/delete.php";
                        $helper->deleteRow('contact', $_GET['id'], 'contact');
                        $_SESSION['success'] = "Xóa liên lạc thành công";
                        break;
                    case 'user-list':
                        include "../user/list.php";
                        break;
                    case 'user-add':
                        include "../user/add.php";
                        break;
                    case 'user-edit':
                        include "../user/edit.php";  
                        break;
                    case 'user-delete':
                        include "../user/delete.php";
                        $helper->deleteRow('user', $_GET['id'], 'user');
                        $_SESSION['success'] = "Xóa liên lạc thành công";
                        break;
                }
            }
            ?>
        </div>
        

        <?php
        include "./footer.php";
        ?>

        
    </body>
</html>