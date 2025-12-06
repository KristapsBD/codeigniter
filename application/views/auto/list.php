<h2>Auto Manager</h2>
<a href="<?php echo site_url('auto/create'); ?>">+ Create New Auto</a>
<br><br>

<table border="1" cellpadding="5" width="100%">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($auto as $item): ?>
        <tr>
            <td><?php echo $item['title']; ?></td>
            <td><?php echo $item['description']; ?></td>
            <td>$<?php echo $item['price']; ?></td>
            <td>
                <a href="<?php echo site_url('auto/edit/'.$item['id']); ?>">Edit</a>
                <a href="<?php echo site_url('auto/delete/'.$item['id']); ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>