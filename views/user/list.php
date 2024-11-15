<?php
$helper = new Helper();
$users = $helper->selectAll('user');
?>

<div id="page-wrapper">
    <a href="../layouts/main.php?action=user-add">
        <button class="btn-add">
            <p>Thêm người dùng</p>
        </button>
    </a>

    <div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Người dùng</h1>

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
                    foreach ($users as $u) {
                    ?>
                        <tr>
                            <td><?= $u['id'] ?></td>
                            <td><?= $u['username'] ?></td>
                            <td>
                                <?= $helper->btnDelete('user', $u) ?>    
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
