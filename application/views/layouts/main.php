<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css'); ?>">
</head>
<body>

    <nav>
        <strong>Auto CRUD</strong> 
        
        <?php if($this->session->userdata('logged_in')): ?>
            <a href="<?php echo site_url('auto'); ?>">Saraksts</a>
            <div class="nav-controls">
                <span>Lietotājs: <?php echo html_escape($this->session->userdata('username')); ?> |</span>
                <a href="<?php echo site_url('auth/logout'); ?>" class="logout">Atteikties</a>
            </div> 
        <?php else: ?>
            <a href="<?php echo site_url('auth'); ?>">Pieslēgties</a>
        <?php endif; ?>
    </nav>

    <div class="container">
        <?php if($this->session->flashdata('success')): ?>
            <p class="success"><?php echo $this->session->flashdata('success'); ?></p>
        <?php endif; ?>
        <?php if($this->session->flashdata('error')): ?>
            <p class="error"><?php echo $this->session->flashdata('error'); ?></p>
        <?php endif; ?>
        <?php $this->load->view($view_to_load); ?>
    </div>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Kristaps Briks-Dravnieks. Ielādējās {elapsed_time} sekundēs.</p>
    </footer>

</body>
</html>