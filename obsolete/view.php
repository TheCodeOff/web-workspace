<?php
// Includes
include("include/common.inc");
$title = ".view";
include("include/header.inc");
include("include/sidebar.inc");
?>
    <table class="content" cellpadding="0" cellspacing="0">
        <tr>
            <td class="content_header" colspan="3">Active database - dbusers</td>
        </tr>
        <tr>
            <td class="content_table_header">Name</td>
            <td class="content_table_header">Surname</td>
            <td class="content_table_header">Age</td>
        </tr>

<?php
// Create connection
$con = mysqli_connect("127.0.0.1", "root", "louw", "dbforum");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// Query
$sql = "SELECT name, surname, age FROM tbusers";
$result = mysqli_query($con, $sql);
// Result
while ($row = mysqli_fetch_array($result)) {
    $name = $row['name'];
    $surname = $row['surname'];
    $age = $row['age'];
    echo "<tr><td>" . $name . "</td><td>" . $surname . "</td><td>" . $age . "</td></tr>";
}
echo "</table>";
// Close connection
mysqli_close($con);
?>