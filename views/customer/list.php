<?php
$helper = new Helper();
$customer = $helper->selectAll('customer');
?>

<div id="page-wrapper">
    <a href="../layouts/main.php?action=customer-add">
        <button class="btn-add">
            <p>Thêm khách hàng</p>
        </button>
    </a>

    <div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Khách Hàng</h1>

            <?php
            include "../alert/alert.php";
            ?>
            
            <table id="myTable" class="table" data-page-length='3'>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($customer as $c) {
                    ?>
                        <tr>
                            <td><?= $c['id'] ?></td>
                            <td><?= $c['name'] ?></td>
                            <td><?= $c['address'] ?></td>
                            <td>
                                <?= $helper->btnEdit('customer', $c) ?>
                                <?= $helper->btnDelete('customer', $c) ?>    
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
