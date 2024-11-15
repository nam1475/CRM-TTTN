<?php
$helper = new Helper();
$opportunity = $helper->selectAll('opportunity');
?>

<div id="page-wrapper">
    <a href="../layouts/main.php?action=opportunity-add">
        <button class="btn-add">
            <p>Thêm cơ hội</p>
        </button>
    </a>

    <div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Cơ hội</h1>

            <?php
            include "../alert/alert.php";
            ?>
            
            <table id="myTable" class="table" data-page-length='3'>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Khách hàng tiềm năng</th>
                        <th scope="col">Ngày kết thúc dự kiến</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($opportunity as $o) {
                    ?>
                        <tr>
                            <td><?= $o['id'] ?></td>
                            <td>
                                <?php
                                $lead = $helper->selectById('lead', $o['lead_id']);
                                $customer = $helper->selectById('customer', $lead['customer_id']);
                                echo $customer['name'];
                                ?>
                            </td>
                            <td><?= $o['expected_close_date'] ?></td>
                            
                            <td>
                                <?= $helper->btnEdit('opportunity', $o) ?>
                                <?= $helper->btnDelete('opportunity', $o) ?>    
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
