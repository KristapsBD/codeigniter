<h2>Auto Saraksts</h2>
<?php if ($this->session->userdata('is_admin')): ?>
    <a href="<?php echo site_url('auto/create'); ?>">+ Pievienot Auto</a>
<?php endif; ?>

<br><br>

<table border="1" cellpadding="5" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Ražotājs</th>
            <th>Uzskaites datums</th>
            <th>Reģistrācijas numurs</th>
            <th>Modelis</th>
            <th>Ir uzskaitē</th>
            <th>Darbības</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($auto as $item): ?>
        <tr>
            <td><?php echo html_escape($item['id']); ?></td>
            <td><?php echo html_escape($item['manufacturer_name']); ?></td>
            <td><?php echo date('d.m.Y', strtotime(html_escape($item['uzskaites_datums']))); ?></td>
            <td><?php echo html_escape($item['registracijas_numurs']); ?></td>
            <td><?php echo html_escape($item['modelis']); ?></td>
            <td><?php echo html_escape($item['ir_uzskaite'] == 1 ? 'Jā' : 'Nē'); ?></td>
            <td>
                <a href="<?php echo site_url('auto/edit/'.$item['id']); ?>">Rediģēt</a>
                <?php if ($this->session->userdata('is_admin')): ?>
                    <a href="<?php echo site_url('auto/delete/'.$item['id']); ?>" onclick="return confirm('Tiešām dzēst?');">Dzēst</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>