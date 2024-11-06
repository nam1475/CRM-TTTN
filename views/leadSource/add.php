<?php
include "../../includes/LeadSourceControl.php";

$leadSource = new LeadSource();
$helper = new Helper();

if(isset($_POST['submit'])){
    $data = [
        'name' => $_POST['name']
    ];
    $errors = $leadSource->validate($data);

    if (empty($errors)) {
        if(!$leadSource->isExist($data)) {
            $result = $helper->addRow('lead_source', $data);
            if($result) {
                $_SESSION['success'] = "Thêm nguồn khách hàng tiềm năng thành công!";
                header('Location: ../layouts/main.php?action=lead-source-list');
            } else {
                $_SESSION['error'] = "Đã xay ra lỗi!";
            }
        }
        else{
            $_SESSION['error'] = "Dữ liệu đã tồn tại!";
            header('Location: ../layouts/main.php?action=lead-source-list');
        }
    }


}
?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Thêm nguồn khách hàng tiềm năng</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <form role="form" method="POST" action="">
                            <div class="form-group">
                                <label>Nhập tên nguồn</label>
                                <input class="form-control" type="text" name="name">
                                <div class="text-danger">
                                    <?php
                                        if (isset($errors['name']['required'])) {
                                            echo $errors['name']['required'];
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

