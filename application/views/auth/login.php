<h2>Pieslēgšanās</h2>
<?php echo validation_errors('<div class="error">', '</div>'); ?>

<?php if($this->session->flashdata('error')): ?>
    <p style="color:red;"><?php echo $this->session->flashdata('error'); ?></p>
<?php endif; ?>

<?php echo form_open('auth/login_process'); ?>
    <label>Lietotājvārds</label><br>
    <input type="text" name="username" required maxlength="100" minlength="4"><br><br>

    <label>Parole</label><br>
    <input type="password" name="password" required maxlength="255" minlength="4"><br><br>

    <input type="submit" value="Pieslēgties">
<?php echo form_close(); ?>

<br><br>
<small>Admin konts: admin, admin</small>
<br>
<small>Lietotāja konts: user, user</small>