<table class="sidebar" cellpadding="0" cellspacing="0">
    <tr>
        <td class="sidebar_cell">
            <div class="sidebar_header">What do you want to do?</div>
            <a href="/<?php echo $MySiteRootDirName ?>/">
                <div class="sidebar_option">visit index</div>
            </a>

            <a href="/<?php echo $MySiteRootDirName ?>/gallery.php">
                <div class="sidebar_option">gallery</div>
            </a>

            <div class="sidebar_category">PHP && MySQL</div>
            <a href="/<?php echo $MySiteRootDirName ?>/view.php">
                <div class="sidebar_option">view users</div>
            </a>
            <a href="/<?php echo $MySiteRootDirName ?>/insert.php">
                <div class="sidebar_option">insert a user</div>
            </a>
            <?php if (getenv("username") == 'Louw') {
                echo '
                <a href="/' . $MySiteRootDirName . '/delete.php">
                    <div class="sidebar_option admin">delete a user</div>
                </a>';
            } ?>
        </td>
    </tr>
</table>
