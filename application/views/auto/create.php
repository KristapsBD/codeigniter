<h2>Create Auto</h2>
    <form method="post" action="<?php echo site_url('auto/store'); ?>">
        
        <label>Razotajs</label><br>
        <input type="text" name="razotajs_id" required><br><br>

        <label>Uzskaites datums</label><br>
        <input type="date" name="uzskaites_datums" required><br><br>

        <label>Registracijas numurs</label><br>
        <input type="text" name="registracijas_numurs" required><br><br>

        <label>Modelis</label><br>
        <input type="text" name="modelis" required><br><br>

        <label>Ir uzskaite</label><br>
        <input type="checkbox" name="ir_uzskaite" required><br><br>

        <input type="submit" value="Save">
    </form>