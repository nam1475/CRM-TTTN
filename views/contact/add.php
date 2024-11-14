<?php
include "../../includes/ContactControl.php";

$helper = new Helper();
$customers = $helper->selectAll('customer');
$contact = new Contact(); 

if(isset($_POST['submit'])){
    $data = [
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'customer_id' => $_POST['customer_id'],
    ];

    $errors = $contact->validate($data);

    if (empty($errors)) {
        if(!$contact->isExist($data)) {
            $result = $helper->addRow('contact', $data);
            if($result) {
                $_SESSION['success'] = "Thêm liên lạc thành công!";
                header('Location: ../layouts/main.php?action=contact-list');
            } else {
                $_SESSION['error'] = "Đã xay ra lỗi!";
            }
        }
        else{
            $_SESSION['error'] = "Dữ liệu đã tồn tại!";
            header('Location: ../layouts/main.php?action=contact-list');
        }
    }


}
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Thêm liên lạc</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <form role="form" method="POST" action="">
                            <div class="form-group">
                                <label>Nhập email</label>
                                <input class="form-control" type="email" name="email">
                                <div class="text-danger">
                                    <?php
                                    if (isset($errors['email']['required'])) {
                                        echo $errors['email']['required'];
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nhập SĐT</label>
                                <input class="form-control" type="number" name="phone">
                                <div class="text-danger">
                                    <?php
                                    if (isset($errors['phone']['required'])) {
                                        echo $errors['phone']['required'];
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Chọn khách hàng</label>
                                <select name="customer_id">
                                    <option value=""></option>
                                    <?php
                                    foreach ($customers as $customer) {
                                    ?>
                                        <option value="<?= $customer['id'] ?>"><?= $customer['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <div class="text-danger">
                                    <?php
                                    if (isset($errors['customer_id']['required'])) {
                                        echo $errors['customer_id']['required'];
                                    }
                                    ?>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-info">Lưu</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

