<?php
$helper = new Helper();
$opportunity = $helper->selectById('opportunity', $_GET['id']);
$lead = $helper->selectAll('lead');

if(isset($_POST['submit'])){
    $data = [
        'lead_id' => $_POST['lead_id'],
        'expected_close_date' => $_POST['expected_close_date'],
    ];

    $result = $helper->updateRow('opportunity', $_GET['id'], $data);
    if($result) {
        $_SESSION['success'] = "Cập nhật khách hàng tiềm năng thành công!";
        header('Location: ../layouts/main.php?action=opportunity-list');
    } else {
        $_SESSION['error'] = "Đã xảy ra lỗi!";
    }

}
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Thêm khách hàng tiềm năng</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <form role="form" method="POST" action="">
                            <div class="form-group">
                                <label>Chọn khách hàng tiềm năng</label>
                                <select name="lead_id">
                                    <option value=""></option>
                                    <?php
                                    foreach ($lead as $l) {
                                        $customer = $helper->selectById('customer', $l['customer_id']);
                                    ?>
                                        <option value="<?= $l['id'] ?>" <?= $opportunity['lead_id'] == $l['id'] ? 'selected' : '' ?>><?= $customer['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                                    
                            <div class="form-group">
                                <label>Ngày dự kiến kết thúc</label>
                                <input type="date" name="expected_close_date" value="<?= $opportunity['expected_close_date'] ?>" class="form-control">
                            </div>
                            <button type="submit" name="submit" class="btn btn-info">Lưu</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>