<h2>Edit Auto</h2>
    <form method="post" action="<?php echo site_url('auto/update/'.$auto['id']); ?>">
        
        <label>Razotajs</label><br>
        <input type="text" name="razotajs_id" value="<?php echo $auto['razotajs_id']; ?>" required><br><br>

        <label>Uzskaites datums</label><br>
        <input type="date" name="uzskaites_datums" value="<?php echo $auto['uzskaites_datums']; ?>" required><br><br>

        <label>Registracijas numurs</label><br>
        <input type="text" name="registracijas_numurs" value="<?php echo $auto['registracijas_numurs']; ?>" required><br><br>

        <label>Modelis</label><br>
        <input type="text" name="modelis" value="<?php echo $auto['modelis']; ?>" required><br><br>

        <label>Ir uzskaite</label><br>
        <input type="checkbox" name="ir_uzskaite" value="<?php echo $auto['ir_uzskaite']; ?>" required><br><br>

        <input type="submit" value="Update">
    </form>