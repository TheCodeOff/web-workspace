<?php
// some site-wide defaults
$MySiteName = "Web Workspace";
$MySiteRootDirName = "web-workspace";

function informUser($message)
{
    echo "<script type='text/javascript'>";
    echo 'alert("' . $message . '");';
    echo "</script>";
}

function array_search2d($needle, $haystack)
{
    for ($i = 0, $l = count($haystack); $i < $l; ++$i) {
        if (in_array($needle, $haystack[$i])) return $i;
    }
    return false;
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
