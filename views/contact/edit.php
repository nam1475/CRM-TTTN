<?php
$helper = new Helper();
$contact = $helper->selectById('contact', $_GET['id']);
$customers = $helper->selectAll('customer'); 

if(isset($_POST['submit'])){
    $data = [
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'customer_id' => $_POST['customer_id'],
    ];

    $result = $helper->updateRow('contact', $_GET['id'], $data);
    if($result) {
        $_SESSION['success'] = "Cập nhật liên lạc thành công!";
        header('Location: ../layouts/main.php?action=contact-list');
    } else {
        $_SESSION['error'] = "Đã xảy ra lỗi!";
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
                                <input class="form-control" value="<?= $contact['email'] ?>" type="email" name="email">
                            </div>
                            <div class="form-group">    
                                <label>Nhập SĐT</label>
                                <input class="form-control" value="<?= $contact['phone'] ?>" type="number" name="phone">
                            </div>
                            <div class="form-group">
                                <label>Chọn khách hàng</label>
                                <select name="customer_id">
                                    <?php
                                    foreach ($customers as $customer) {
                                    ?>
                                        <option value="<?= $customer['id'] ?>" <?= $contact['customer_id'] == $customer['id'] ? 'selected' : '' ?>>
                                            <?= $customer['name'] ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                                    
                            <button type="submit" name="submit" class="btn btn-info">Lưu</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>