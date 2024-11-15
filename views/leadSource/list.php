<?php
$helper = new Helper();
$leadSources = $helper->selectAll('lead_source');
?>

<div id="page-wrapper">
    <a href="../layouts/main.php?action=lead-source-add">
        <button class="btn-add">
            <p>Thêm nguồn khách hàng</p>
        </button>
    </a>

    <div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Nguồn Khách Hàng Tiềm Năng</h1>

            <?php
            include "../alert/alert.php";
            ?>

            <table id="myTable" class="table" data-page-length='3'>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($leadSources as $ls) {
                    ?>
                        <tr>
                            <td><?= $ls['id'] ?></td>
                            <td><?= $ls['name'] ?></td>
                            <td>
                                <?= $helper->btnEdit('lead-source', $ls) ?>
                                <?= $helper->btnDelete('lead-source', $ls) ?>    
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
