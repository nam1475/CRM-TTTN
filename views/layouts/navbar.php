<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-brand" href="">CRM</a>
    </div>

    <!-- <input class="search" type="text" placeholder="Tìm kiếm... "  type="text" id="menu_search" value=""> -->

    <a href="../auth/logout.php">
        <button class="btn-header">
            LOG OUT
        </button>
    </a>
    <button class="btn-header">
        Username: <?= $_SESSION['username'] ?>
    </button>
</nav>