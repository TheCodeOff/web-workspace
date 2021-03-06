<?php
include("include/common.inc");
$title = ".insert";
include("include/header.inc");
include("include/sidebar.inc");

$nameErr = $surnameErr = $ageErr = "";
$name = $surname = $age = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // NAME
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = parsePostData($_POST["name"]);
    }
    // SURNAME
    if (empty($_POST["surname"])) {
        $surnameErr = "Surname is required";
    } else {
        $surname = parsePostData($_POST["surname"]);
    }
    // AGE
    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
    } else {
        $age = parsePostData($_POST["age"]);
    }

    if ($name != "" && $surname != "" && $age != "") {
        // Create connection
        $con = mysqli_connect("127.0.0.1", "root", "louw", "dbforum");
        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        } else {
            echo "Connected to database.. Querying..";
            // Query
            $name = parsePostData($_POST['name']);
            $surname = parsePostData($_POST['surname']);
            $age = parsePostData($_POST['age']);
            $sql = "INSERT INTO tbusers (NAME, SURNAME, AGE) VALUES ('" . $name . "', '" . $surname . "'," . $age . ")";
            $success = mysqli_query($con, $sql);
            // Close connection
            mysqli_close($con);
            // Result
            if ($success) {
                informUser("Insert successful!");
                // Redirect
                header("refresh:0;view.php");
                die();
            } else {
                informUser("Insert failed:\n" . mysqli_error($con));
            }
        }
    }
}

?>
    <table class="content" cellpadding="0" cellspacing="0">
        <tr>
            <td class="content_header" colspan="3">Insert User</td>
        </tr>
        <tr>
            <td>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <span style="font-size: 18px;">Please enter all of the following information:<br/>* - Required fields</span>

                    <p>Your name: <br/>
                        <input type="text" name="name"/>
                        <span class="error">* <?php echo $nameErr; ?></span>
                    </p>

                    <p>Your surname: <br/>
                        <input type="text" name="surname"/>
                        <span class="error">* <?php echo $surnameErr; ?></span>
                    </p>

                    <p>Your age: <br/>
                        <input type="number" name="age"/>
                        <span class="error">* <?php echo $ageErr; ?></span>
                    </p>

                    <input type="reset" name="reset" value="Reset!"/>
                    <input type="submit" name="submit" value="Submit me!"/>
                </form>
            </td>
        </tr>
    </table>

<?php include("include/footer.inc"); ?>