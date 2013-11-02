<?php
// some site-wide defaults
$MyEmailLink = "<a href='mailto:". $MyEmail . "'>" . $MyEmail . "</a>";
$MySiteName = "Web Workspace";
$MySiteRootDirName = "web-workspace";

function informUser($message)
{
    echo "<script type='text/javascript'>";
    echo 'alert("' . $message . '");';
    echo "</script>";
}

function parsePostData($data)
{
    /**
     * This function prevents executable script from being received via form.
     */
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
