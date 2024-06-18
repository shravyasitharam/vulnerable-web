<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}
require_once '../config.php';
?>

<?php include '../header.php'; ?>
<div class="container">
    <h2>SQL Injection Example</h2>
    <form method="get">
        <label>Enter User ID: <input type="text" name="id"></label>
        <input type="submit" value="Submit">
    </form>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id = '$id'"; // Vulnerable to SQL Injection
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>User: " . $row['username'] . "</p>";
            }
        } else {
            echo "<p>No results found.</p>";
        }
    }
    ?>
</div>
<?php include '../footer.php'; ?>
