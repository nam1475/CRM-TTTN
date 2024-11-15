<?php

$helper = new Helper();
$contacts = $helper->selectAll('contact');
?>

<div id="page-wrapper">
    <a href="../layouts/main.php?action=contact-add">
        <button class="btn-add">
            <p>Thêm liên lạc</p>
        </button>
    </a>

    <div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Liên lạc</h1>

            <?php
            include "../alert/alert.php";
            ?>
            
            <table id="myTable" class="table" data-page-length='3'>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">SĐT</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($contacts as $ct) {
                    ?>
                        <tr>
                            <td><?= $ct['id'] ?></td>
                            <td><?= $ct['email'] ?></td>
                            <td><?= $ct['phone'] ?></td>
                            <td>
                                <?php 
                                $customer = $helper->selectById('customer', $ct['customer_id']);
                                echo $customer['name'];
                                ?>
                            </td>
                            <td>
                                <?= $helper->btnEdit('contact', $ct) ?>
                                <?= $helper->btnDelete('contact', $ct) ?>    
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
