<?php
require_once 'config.php';
require_once SITE_PATH . '/includes/connectDB.php';
include SITE_PATH . '/includes/header.php';
confirm_is_admin($session);

if (isset($_POST['submit'])) {
    $pageId = $_POST['menulabel'];
    if ($pageId == 1) {
        die('The home page can not be deleted.');
    }
    $query = "DELETE FROM pages WHERE id = ?";
    $statement = $databaseConnection->prepare($query);
    $statement->bind_param('d', $pageId);
    $statement->execute();
    $statement->store_result();

    if ($statement->error) {
        die('Database query failed: ' . $statement->error);
    }

    // TODO: Check for == 1 instead of > 0 when page names become unique.
    $deletionWasSuccessful = $statement->affected_rows > 0 ? true : false;
    if ($deletionWasSuccessful) {
        header("Location: teated.php");
        exit;
    } else {
        echo "Failed deleting page";
    }
}
?>
<div id="main">
    <h2>Delete Page</h2>

    <form action="deletepage.php" method="post">
        <fieldset>
            <legend>Delete Page</legend>
            <ol>
                <li>
                    <label for="menulabel">Title:</label>
                    <select id="menulabel" name="menulabel">
                        <option value="0">--Select Page--</option>
                        <?php
                        $statement = $databaseConnection->prepare("SELECT id, menulabel FROM pages");
                        $statement->execute();

                        if ($statement->error) {
                            die("Database query failed: " . $statement->error);
                        }

                        $statement->bind_result($id, $menulabel);
                        while ($statement->fetch()) {
                            echo "<option value=\"$id\">$menulabel</option>\n";
                        }
                        ?>
                    </select>
                </li>
            </ol>
            <input type="submit" name="submit" value="Delete"/>

            <p>
                <a href="index.php">Cancel</a>
            </p>
        </fieldset>
    </form>
</div>
</div> <!-- End of outer-wrapper which opens in header.php -->
<?php include SITE_PATH . '/includes/footer.php'; ?>
