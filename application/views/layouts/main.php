<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My Auto App</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        nav { background: #eee; padding: 10px; margin-bottom: 20px; }
        footer { margin-top: 50px; font-size: 0.8em; color: #777; border-top: 1px solid #ccc; }
    </style>
</head>
<body>

    <nav>
        <strong>Auto App</strong> | 
        <a href="<?php echo site_url('auto'); ?>">Auto</a> | 
        
        <?php if($this->session->userdata('logged_in')): ?>
            <span>User: <?php echo $this->session->userdata('username'); ?></span> | 
            <a href="<?php echo site_url('auth/logout'); ?>">Logout</a>
        <?php else: ?>
            <a href="<?php echo site_url('auth'); ?>">Login</a>
        <?php endif; ?>
    </nav>

    <div class="container">
        <?php $this->load->view($view_to_load); ?>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Kristaps Briks-Dravnieks. Loaded in {elapsed_time} seconds.</p>
    </footer>

</body>
</html>