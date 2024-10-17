<?php
$helper = new Helper();
$lead = $helper->selectAll('lead');
?>

<div id="page-wrapper">
    <a href="../layouts/main.php?action=lead-add">
        <button class="btn-add">
            <p>Thêm khách hàng tiềm năng</p>
        </button>
    </a>

    <div id="page-inner">   
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Khách Hàng Tiềm Năng</h1>

            <?php
            include "../alert/alert.php";
            ?>
            
            <table class="table">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Khách hàng</th>
                    <th scope="col">Nguồn khách hàng tiềm năng</th>
                    <th scope="col">Thao tác</th>
                </tr>

                <?php
                foreach ($lead as $l) {
                ?>
                    <tr>
                        <td><?= $l['id'] ?></td>
                        <td>
                            <?php
                            $customer = $helper->selectById('customer', $l['customer_id']);
                            echo $customer['name'];
                            ?>
                        </td>

                        <td>
                            <?php
                            $leadSource = $helper->selectById('lead_source', $l['source_id']);
                            echo $leadSource['name'];
                            ?>
                        </td>

                        <td>
                            <?= $helper->btnEdit('lead', $l) ?>
                            <?= $helper->btnDelete('lead', $l) ?>    
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
