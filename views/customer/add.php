<?php
$helper = new Helper();

if(isset($_POST['submit'])){
    $data = [
        'name' => $_POST['name'],
        'address' => $_POST['address'],
    ];

    $result = $helper->addRow('customer', $data);
    if($result) {
        $_SESSION['success'] = "Thêm khách hàng thành công!";
        header('Location: ../layouts/main.php?action=customer-list');
    } else {
        $_SESSION['error'] = "Đã xay ra lỗi!";
    }

}
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Thêm khách hàng</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <form role="form" method="POST" action="">
                            <div class="form-group">
                                <label>Nhập tên</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                            <div class="form-group">
                                <label>Nhập địa chỉ</label>
                                <input class="form-control" type="text" name="address">
                            </div>
                            <button type="submit" name="submit" class="btn btn-info">Lưu</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

