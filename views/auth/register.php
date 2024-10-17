<?php
session_start();
include "../../includes/AuthControl.php";
include "../../helper/helper.php";

$title = "Đăng ký";

if (isset($_SESSION['username'])) {
    header('Location: ../layouts/main.php?action=lead-list');
} else {
    if (isset($_POST['submit'])) {
        $auth = new auth();
        $helper = new Helper();
        $data = [
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'confirm_password' => $_POST['confirm_password'],
        ];
        $errors = $auth->validateRegister($data);
        if (empty($errors)) {
            if ($auth->register($data)) {
                $_SESSION['username'] = $_POST['username'];
                header('Location: ../layouts/main.php?action=lead-list');
            }
        }
    }
}
?>



<?php
include "./layouts/header.php";
?>
<form method="POST">
    <div class="login">
        <p class="content-text">Tên đăng nhập</p>
        <div class="login-iput">
            <input type="text" name="username" placeholder="Abcxyz123" class="username">
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
        <p class="content-text">Mật khẩu</p>
        <div class="login-iput">
            <input type="password" name="password" placeholder="********" class="password">
            <div class="text-danger">
                <?php
                if (isset($errors['password']['required'])) {
                    echo $errors['password']['required'];
                }
                ?>
            </div>
        </div>
        <p class="content-text">Nhập lại mật khẩu</p>
        <div class="login-iput">
            <input type="password" placeholder="********" class="password" name="confirm_password">
            <div class="text-danger">
                <?php
                if (isset($errors['confirm_password']['required'])) {
                    echo $errors['confirm_password']['required'];
                }
                else if (isset($errors['confirm_password']['not_match'])) {
                    echo $errors['confirm_password']['not_match'];
                }
                ?>
            </div>
        </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-block" style="margin-top: 20px;">Đăng ký</button>
</form>
<a href="login.php">Đăng nhập</a>

<?php
include "./layouts/footer.php";
?>