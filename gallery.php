<?php
include("include/common.inc");
$title = ".gallery";
include("include/header.inc");
include("include/sidebar.inc");

?>
    <table class="content" cellpadding="0" cellspacing="0">
        <tr>
            <td class="content_header" colspan="3">Gallery</td>
        </tr>
        <tr>
            <td id="gallery">
                <img src="img/avatar.png" alt="avatar">
                <img src="img/avatar.png" alt="avatar">
            </td>
        </tr>
        <tr>
            <td class="content_header" colspan="3">Upload an image</td>
        </tr>
        <tr>
            <td>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                      enctype="multipart/form-data">
                    <span style="font-size: 18px;">Please enter all of the following information:</span>

                    <p>
                        <span style="font-size: 16px;">
                            Specify image: <br/>
                            <input type="file" name="image"/><br/>
                        </span>
                    </p>

                    <input type="reset" name="reset" value="Reset Form"/>
                    <input type="submit" value="Upload Image"/>
                </form>
            </td>
        </tr>
    </table>


<?php include("include/footer.inc"); ?>