<table class="sidebar">
    <tr>
        <td class="sidebar_cell">
            <div class="sidebar_header">What do you want to do?</div>
            <!-- GENERAL LINKS -->
            <a href="/<?php echo $MySiteRootDirName ?>/">
                <div class="sidebar_option">visit index</div>
            </a>

            <!-- PHP LINKS -->
            <div class="sidebar_category">PHP</div>
            <a href="/<?php echo $MySiteRootDirName ?>/gallery.php">
                <div class="sidebar_option">gallery</div>
            </a>

            <!-- MySQL LINKS -->
            <div class="sidebar_category">MySQL</div>
            <a href="/<?php echo $MySiteRootDirName ?>/users.php">
                <div class="sidebar_option">users</div>
            </a>
            <!-- ADMIN LINKS -->
            <?php if (getenv("REMOTE_ADDR") == '::1') {
                echo '
                    <div class="sidebar_category">Admin</div>
                    <a href="../phpmyadmin/">
                        <div class="sidebar_option">MySQL Setup</div>
                    </a>
                    ';
            } ?>
        </td>
    </tr>
</table>
