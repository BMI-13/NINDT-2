<div class="container">
    <h2>Add User</h2>

    <form action="<?php echo base_url('user/manage'); ?>" method="post">
    <input type="text" class="form-control" id="user_id_pk" name="user_id_pk" value="<?php echo $status ; ?>" required>

        <div class="form-group">
            <label for="user_email">Email:</label>
            <input type="email" class="form-control" id="user_email" name="user_email" value="<?php echo isset($user) ? $user['user_email'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="user_psw">Password:</label>
            <input type="password" class="form-control" id="user_psw" name="user_psw" value="<?php echo isset($user) ? $user['user_psw'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="user_role">Role:</label>
            <input type="text" class="form-control" id="user_role" name="user_role" value="<?php echo isset($user) ? $user['user_role'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="user_nic">NIC:</label>
            <input type="text" class="form-control" id="user_nic" name="user_nic" value="<?php echo isset($user) ? $user['user_nic'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="user_tpnumber">Phone:</label>
            <input type="text" class="form-control" id="user_tpnumber" name="user_tpnumber" value="<?php echo isset($user) ? $user['user_tpnumber'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for="user_gender">Gender:</label>
            <select class="form-control" id="user_gender" name="user_gender" required>
                <option value="Male" <?php echo isset($user) && $user['user_gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo isset($user) && $user['user_gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="user_photo">Photo:</label>
            <input type="file" class="form-control" id="user_photo" name="user_photo" value="<?php echo isset($user) ? $user['user_photo'] : ''; ?>">
        </div>
        <!-- Add other fields similarly -->

        <button type="submit" class="btn btn-primary">Add User</button>
    </form>
</div>
