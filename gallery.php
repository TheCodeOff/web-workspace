<?php
include("include/common.inc");
$title = ".gallery";
include("include/header.inc");
include("include/sidebar.inc");

$imgdir = "img";
// open this directory
$myDirectory = opendir($imgdir);
// get each image
while ($entryName = readdir($myDirectory)) {
    $ext = pathinfo($entryName, PATHINFO_EXTENSION);
    if ($ext == 'jpg' || $ext == 'png' || $ext == 'gif') {
        $image_list[] = $entryName;
    }
}
// close directory
closedir($myDirectory);
//	count elements in array
$indexCount = count($image_list);
// sort 'em
sort($image_list);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_path = $imgdir . "/" . basename($_FILES['image']['name']);
    $target_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    if (!isset($_FILES['image']) || $_FILES['image']['name'] == '') {
        informUser("Please specify a image!");
    } else if ($target_ext != 'jpg' && $target_ext != 'png' && $target_ext != 'gif') {
        informUser("You can only upload jpeg and png images!");
    } else {
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $target_path); //Upload file to target path
        if ($result) {
            informUser("Successfully added image to gallery!");
        } else {
            informUser("There was an unprecedented error uploading file!");
        }
    }
    // Redirect
    header("refresh:0;gallery.php");
    die();
}

?>
    <table class="content">
        <tr>
            <td class="content_header" colspan="3">
                Gallery
                <?php if (isset($_GET['imageid'])) {
                    echo '<a href="gallery.php"><span>Back to Gallery</span></a>';
                } else {
                    echo "<span>$indexCount images</span>";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td id="gallery">
                <?php
                if (isset($_GET['imageid']) && $_GET['imageid'] < count($image_list)) {
                    $image_entry = $imgdir . "/" . $image_list[$_GET['imageid']];
                    $image_dimensions = getPreferredImageDimensions($image_entry, 800, 800);
                    echo '
                    <img class="standalone"
                    src="' . $image_entry . '"
                    alt="' . $image_entry . '>"
                    width="' . $image_dimensions[0] . '"
                    height="' . $image_dimensions[1] . '"><br />
                    <span>Width: ' . getimagesize($image_entry)[0] . ' px</span><br />
                    <span>Height: ' . getimagesize($image_entry)[1] . ' px</span><br />
                    <span>Type: ' . getimagesize($image_entry)['mime'] . '</span>';
                } else {
                    $index = 0;
                    foreach ($image_list as $image) {
                        $image_entry = $imgdir . "/" . $image;
                        echo '<a href="gallery.php?imageid=' . $index . '"><img src="' . $image_entry . '" alt="' . $image_entry . '"></a>';
                        $index++;
                    }
                }
                ?>
            </td>
        </tr>
        <?php if (!isset($_GET['imageid'])) { ?>
            <tr>
                <td class="content_header" colspan="3">Upload an image</td>
            </tr>
            <tr>
                <td>
                    <form method="post" id="gallery_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                          enctype="multipart/form-data">
                        <input type="file" name="image"/>
                        <input type="reset" name="reset" value="Reset"/>
                        <input type="submit" value="Upload"/>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>


<?php include("include/footer.inc"); ?>