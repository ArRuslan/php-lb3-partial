<?php

$is_valid = null;
if(isset($_POST["check_url"])) {
    $is_valid = preg_match("~^https?://([\w\d]\.?){1,}[\w\d]{2,10}(:\d{1,6})?/?(/?[\w\d_%+.-]{0,}){0,}(\?(&?[\w\d_-]{1,}=[\w\d_-]{1,}){0,})?$~", $_POST["check_url"]);
}

?>

<html>
<head>
    <title>Task 3.1.1</title>
</head>
<body style="height: 100%; width: 100%; margin: 0; font-size: 24px;">
<form style="display: flex; justify-content: center; align-items: center; height: 100%; width: 100%; flex-direction: column; gap: 10px;" action="" method="POST">
    <?php if($is_valid === 1) {
        echo "<p>This is valid url</p>";
    } else if($is_valid === 0) {
        echo "<p>This is NOT valid url</p>";
    } ?>

    <label style="display: flex; flex-direction: column; text-align: center; gap: 5px;">
        Url to check:
        <input type="text" name="check_url" placeholder="URL" style="font-size: 24px;" value="<?php echo $_POST["check_url"] ?>">
    </label>
    <button type="submit" style="font-size: 24px;">Check</button>
</form>
</body>
