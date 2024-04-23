<?php

$is_valid = null;
if(isset($_POST["check_date"])) {
    $is_valid = preg_match("~^(([1-2]{2}|0[1-2])|(3(0|1)))/((1[1-2])|0?[1-9])/((1[6-9]\d{2})|[2-9]\d{3})$~", $_POST["check_date"]);
}

?>

<html>
<head>
    <title>Task 3.1.1</title>
</head>
<body style="height: 100%; width: 100%; margin: 0; font-size: 24px;">
<form style="display: flex; justify-content: center; align-items: center; height: 100%; width: 100%; flex-direction: column; gap: 10px;" action="" method="POST">
    <?php if($is_valid === 1) {
        echo "<p>This is valid date</p>";
    } else if($is_valid === 0) {
        echo "<p>This is NOT valid date</p>";
    } ?>

    <label style="display: flex; flex-direction: column; text-align: center; gap: 5px;">
        Date to check (01/01/1600 - 31/12/9999):
        <input type="text" name="check_date" placeholder="Date" style="font-size: 24px;" value="<?php echo $_POST["check_date"] ?>">
    </label>
    <button type="submit" style="font-size: 24px;">Check</button>
</form>
</body>
