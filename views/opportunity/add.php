<?php
$helper = new Helper();
$lead = $helper->selectAll('lead');

if(isset($_POST['submit'])){
    $data = [
        'lead_id' => $_POST['lead_id'],
        'expected_close_date' => $_POST['expected_close_date'],
    ];

    $result = $helper->addRow('opportunity', $data);
    if($result) {
        $_SESSION['success'] = "Thêm cơ hội thành công!";
        header('Location: ../layouts/main.php?action=opportunity-list');
    } else {
        $_SESSION['error'] = "Đã xay ra lỗi!";
    }

}
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Thêm cơ hội</h1>
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
                                        <option value="<?= $l['id'] ?>"><?= $customer['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Ngày dự kiến kết thúc</label>
                                <input type="date" name="expected_close_date" class="form-control">
                            </div>
                            <button type="submit" name="submit" class="btn btn-info">Lưu</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

