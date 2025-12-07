<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $page_title; ?></title>
    <style>
        body { font-family: sans-serif; padding: 0; margin: 0; }
        .container { padding: 20px; }
        nav { background: #eee; padding: 20px; margin-bottom: 20px; }
        footer { margin-top: 50px; font-size: 0.8em; color: #777; border-top: 1px solid #ccc; }
    </style>
</head>
<body>

    <nav>
        <strong>Auto App</strong> | 
        
        <?php if($this->session->userdata('logged_in')): ?>
            <a href="<?php echo site_url('auto'); ?>">Saraksts</a> | 
            <span>Lietotājs: <?php echo $this->session->userdata('username'); ?></span> | 
            <a href="<?php echo site_url('auth/logout'); ?>">Atteikties</a>
        <?php else: ?>
            <a href="<?php echo site_url('auth'); ?>">Pieslēgties</a>
        <?php endif; ?>
    </nav>

    <div class="container">
        <?php $this->load->view($view_to_load); ?>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Kristaps Briks-Dravnieks. Ielādējās {elapsed_time} sekundēs.</p>
    </footer>

</body>
</html>