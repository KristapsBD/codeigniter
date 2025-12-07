<h2>Auto Manager</h2>
<a href="<?php echo site_url('auto/create'); ?>">+ Create New Auto</a>
<br><br>

<table border="1" cellpadding="5" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Razotajs</th>
            <th>Uzskaites datums</th>
            <th>Registracijas numurs</th>
            <th>Modelis</th>
            <th>Ir uzskaite</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($auto as $item): ?>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['manufacturer_name']; ?></td>
            <td><?php echo date('d.m.Y', strtotime($item['uzskaites_datums'])); ?></td>
            <td><?php echo $item['registracijas_numurs']; ?></td>
            <td><?php echo $item['modelis']; ?></td>
            <td><?php echo $item['ir_uzskaite'] == 1 ? 'Jā' : 'Nē'; ?></td>
            <td>
                <a href="<?php echo site_url('auto/edit/'.$item['id']); ?>">Edit</a>
                <a href="<?php echo site_url('auto/delete/'.$item['id']); ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>