<table class="sidebar" cellpadding="0" cellspacing="0">
    <tr>
        <td class="sidebar_cell">
            <div class="sidebar_header">What do you want to do?</div>
            <div class="sidebar_option" onclick="location.href='/forum/'">visit index</div>
            <div class="sidebar_category">PHP && MySQL</div>
            <a href="/forum/view.php">
                <div class="sidebar_option">view users</div>
            </a>
            <a href="/forum/insert.php">
                <div class="sidebar_option">insert a user</div>
            </a>
            <?php if (getenv("username") == 'Louw') {
                echo '
                <a href="/forum/delete.php">
                    <div class="sidebar_option admin">delete a user</div>
                </a>';
            } ?>
        </td>
    </tr>
</table>
