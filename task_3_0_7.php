<?php

$is_valid = null;
if(isset($_POST["check_email"])) {
    $is_valid = preg_match("~^[\w\d_.-]+@(\.?[\w\d_-]+){0,6}\.\w{2,16}$~", $_POST["check_email"]);
}

?>

<html>
<head>
    <title>Task 7</title>
</head>
<body style="height: 100%; width: 100%; margin: 0; font-size: 24px;">
<form style="display: flex; justify-content: center; align-items: center; height: 100%; width: 100%; flex-direction: column; gap: 10px;" action="" method="POST">
    <?php if($is_valid === 1) {
        echo "<p>This is valid email</p>";
    } else if($is_valid === 0) {
        echo "<p>This is NOT valid email</p>";
    } ?>

    <label style="display: flex; flex-direction: column; text-align: center; gap: 5px;">
        Email to check:
        <input type="text" name="check_email" placeholder="Email" style="font-size: 24px;" value="<?php echo $_POST["check_email"] ?>">
    </label>
    <button type="submit" style="font-size: 24px;">Check</button>
</form>
</body>
