<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}
?>

<?php include '../header.php'; ?>
<div class="container">
    <h2>XSS Example</h2>
    <form method="get">
        <label>Enter Your Name: <input type="text" name="name"></label>
        <input type="submit" value="Submit">
    </form>
    <?php
    if (isset($_GET['name'])) {
        $name = $_GET['name'];
        echo "<p>Hello, " . $name . "!</p>"; // Vulnerable to XSS
    }
    ?>
</div>
<?php include '../footer.php'; ?>
