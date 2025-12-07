<h2>Create Auto</h2>
    <?php echo validation_errors('<div class="error">', '</div>'); ?>

    <?php echo form_open('auto/store'); ?>
        <label>Razotajs</label><br>
        <select name="razotajs_id" required>
            <option value="">-- Select --</option>
            <?php foreach($manufacturers as $m): ?>
                <option value="<?php echo $m['id']; ?>"><?php echo $m['nosaukums']; ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <!-- Cannot be in the future -->
        <label>Uzskaites datums</label><br>
        <input type="date" name="uzskaites_datums" value="<?php echo set_value('uzskaites_datums'); ?>" required max="<?php echo date('Y-m-d'); ?>">
        <small>(Nevar būt nākotnē)</small>
        <br><br>

        <label>Registracijas numurs</label><br>
        <input 
            type="text" 
            name="registracijas_numurs" 
            pattern="[A-Z]{2}[0-9]{4}" 
            title="Must be 2 Uppercase Letters followed by 4 Digits (e.g., AA1234)"
            maxlength="6"
            required
            onkeyup="this.value = this.value.toUpperCase();" 
        >
        <small>(Formāts: AA1234)</small>
        <br><br>

        <label>Modelis</label><br>
        <input type="text" name="modelis" value="<?php echo set_value('modelis'); ?>" required maxlength="255">
        <br><br>

        <label>Ir/Nav uzskaitē</label>
        <select name="ir_uzskaite" required>
            <option value="1">Ir uzskaitē</option>
            <option value="0">Nav uzskaitē</option>
        </select>
        <br><br>

        <input type="submit" value="Save">
    </form>