<h2>Pieslēgšanās</h2>
<?php echo validation_errors('<div class="error">', '</div>'); ?>

<?php echo form_open('auth/login_process'); ?>
    <label>Lietotājvārds</label>
    <input type="text" name="username" required maxlength="100" minlength="4">

    <label>Parole</label>
    <input type="password" name="password" required maxlength="255" minlength="4">

    <input type="submit" value="Pieslēgties">
<?php echo form_close(); ?>

<div class="container flex-col">
    <small>Admin konts: admin, admin</small>
    <small>Lietotāja konts: user, user</small>
</div>