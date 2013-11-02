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

function getPreferredImageDimensions($image_uri, $preferredWidth, $preferredHeight = 10000)
{
    $width = getimagesize($image_uri)[0];
    $height = getimagesize($image_uri)[1];
    $new_width = $width;
    $new_height = $height;
    if ($width > $height) { // use width for dimensioning.
        if ($width > $preferredWidth) {
            $new_width = $preferredWidth;
        }
        $new_height = $height * ($new_width / $width);
    } else { // use height for dimensioning.
        if ($height > $preferredHeight) {
            $new_height = $preferredHeight;
        }
        $new_width = $width * ($new_height / $height);
    }

    return array($new_width, $new_height);
}

?>
