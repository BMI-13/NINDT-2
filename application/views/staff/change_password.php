<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <h1>Change Password</h1>
    <?php echo form_open('staff/change_password'); ?>
    <label for="current_password">Current Password:</label>
    <input type="password" name="current_password" id="current_password"><br><br>
    <label for="new_password">New Password:</label>
    <input type="password" name="new_password" id="new_password"><br><br>
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password" id="confirm_password"><br><br>
    <input type="submit" value="Change Password">
    <?php echo form_close(); ?>
</body>
</html>
