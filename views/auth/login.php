<?php
session_start();
include "../../includes/AuthControl.php";

$title = "Đăng nhập";

if (isset($_SESSION['username'])) {
    header('Location: ../layouts/main.php?action=lead-list');
} else {
    if (isset($_POST['submit'])) {
        $auth = new auth();
        $data = [
            'username' => $_POST['username'],
            'password' => $_POST['password'],
        ];
        $errors = $auth->validateLogin($data);
        if (empty($errors)) {
            if ($auth->isValidUser($data)) {
                $_SESSION['username'] = $_POST['username'];
                header('Location: ../layouts/main.php?action=lead-list');
            } else {
                $_SESSION['error'] = "Sai tên đăng nhập hoặc mật khẩu!";
            }
        }
    }
}
?>

<?php
include "./layouts/header.php";
?>

<form method="POST">
    <?php
    include "../alert/alert.php";
    ?>
    <div class="login">
        <p class="content-text">Tên đăng nhập</p>
        <div class="login-iput">
            <input type="text" name="username" placeholder="Abcxyz123" class="username">
            <div class="text-danger">
                <?php
                if (isset($errors['username']['required'])) {
                    echo $errors['username']['required'];
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
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-block" style="margin-top: 20px;">Đăng nhập</button>
</form>
<a href="register.php">Đăng ký</a>

<?php
include "./layouts/footer.php";
?>