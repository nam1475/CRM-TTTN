<?php
$helper = new Helper();
$lead = $helper->selectById('lead', $_GET['id']);
$customers = $helper->selectAll('customer');
$leadSources = $helper->selectAll('lead_source');

if(isset($_POST['submit'])){
    $data = [
        'customer_id' => $_POST['customer_id'],
        'source_id' => $_POST['source_id'],
    ];

    $result = $helper->updateRow('lead', $_GET['id'], $data);
    if($result) {
        $_SESSION['success'] = "Cập nhật khách hàng tiềm năng thành công!";
        header('Location: ../layouts/main.php?action=lead-list');
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
                                <label>Chọn khách hàng</label>
                                <select name="customer_id">
                                    <option value=""></option>
                                    <?php
                                    foreach ($customers as $customer) {
                                    ?>
                                        <option value="<?= $customer['id'] ?>" <?= $customer['id'] == $lead['customer_id'] ? 'selected' : '' ?>>
                                            <?= $customer['name'] ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                                    
                            <div class="form-group">
                                <label>Chọn nguồn khách hàng tiềm năng</label>
                                <select name="source_id">
                                    <option value=""></option>
                                    <?php
                                    foreach ($leadSources as $ls) {
                                    ?>
                                        <option value="<?= $ls['id'] ?>" <?= $ls['id'] == $lead['source_id'] ? 'selected' : '' ?>>
                                            <?= $ls['name'] ?>
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