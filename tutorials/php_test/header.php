<header class="header-block">
    <div>
        <nav>
            <a>Home</a>
            <a>Products</a>
            <a>About</a>
            <?php echo $_POST && $_POST["name"] ? "<a>Logout</a>" : "" ?>
        </nav>
    </div>
</header>