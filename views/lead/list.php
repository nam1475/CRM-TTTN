<?php
$helper = new Helper();
$lead = $helper->selectAll('lead');
// if(isset($_POST['submit-search'])) {
//     $lead = $helper->search('lead', $_POST['search']);
// }
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
            <div class="page-head-line">
                Khách Hàng Tiềm Năng
            </div>

            <?php
            include "../alert/alert.php";
            ?>
            
            <table id="myTable" class="table" data-page-length='3'>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Nguồn khách hàng tiềm năng</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php
                if($lead->num_rows > 0) {
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
                }
                else{
                ?>
                    <tr>
                        <td colspan="4" class="text-center text-gray">Không có dữ liệu</td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
