<?php
include "../../includes/AuthControl.php";
$helper = new Helper();
$auth = new Auth();

if(isset($_POST['submit'])){
    $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'confirm_password' => $_POST['confirm_password'],
    ];
    $errors = $auth->validateRegister($data);
    
    if (empty($errors)) {
        // $result = $helper->addRow('user', $data);
        $result = $auth->register($data);
        if($result) {
            $_SESSION['success'] = "Thêm người dùng thành công!";
            header('Location: ../layouts/main.php?action=user-list');
        } else {
            $_SESSION['error'] = "Đã xay ra lỗi!";
        }
    }

}
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Thêm người dùng</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <form role="form" method="POST" action="">
                            <div class="form-group">
                                <label>Nhập username</label>
                                <input class="form-control" type="text" name="username">
                                <div class="text-danger">
                                    <?php
                                    if (isset($errors['username']['required'])) {
                                        echo $errors['username']['required'];
                                    }
                                    else if(isset($errors['username']['pattern'])){
                                        echo $errors['username']['pattern'];
                                    }
                                    else if(isset($errors['username']['exist'])){
                                        echo $errors['username']['exist'];
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nhập mật khẩu</label>
                                <input class="form-control" type="password" name="password">
                                <div class="text-danger">
                                    <?php
                                    if (isset($errors['password']['required'])) {
                                        echo $errors['password']['required'];
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input class="form-control" type="password" name="confirm_password">
                                <div class="text-danger">
                                    <?php
                                    if (isset($errors['confirm_password']['required'])) {
                                        echo $errors['confirm_password']['required'];
                                    }
                                    if (isset($errors['confirm_password']['not_match'])) {
                                        echo $errors['confirm_password']['not_match'];
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

