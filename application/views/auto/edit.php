<h2>Rediģēt Auto</h2>
    <?php echo validation_errors('<div class="error">Ievades kļūda: ', '</div>'); ?>

    <?php echo form_open('auto/update/'.$auto['id']); ?>        

        <label>Ražotājs</label>
        <select name="razotajs_id" required>
            <option value="">-- Izvēlies --</option>
            <?php foreach($manufacturers as $m): ?>
                <option value="<?php echo html_escape($m['id']); ?>" <?php echo set_value('razotajs_id', $auto['razotajs_id']) == $m['id'] ? 'selected' : ''; ?>><?php echo html_escape($m['nosaukums']); ?></option>
            <?php endforeach; ?>
        </select>
        

        <!-- Cannot be in the future -->
        <label>Uzskaites datums</label>
        <input type="date" name="uzskaites_datums" value="<?php echo set_value('uzskaites_datums', $auto['uzskaites_datums']); ?>" required max="<?php echo date('Y-m-d'); ?>">
        <small>(Nevar būt nākotnē)</small>
        

        <label>Reģistrācijas numurs</label>
        <input 
            type="text" 
            name="registracijas_numurs" 
            pattern="[A-Z]{2}[0-9]{4}" 
            title="Must be 2 Uppercase Letters followed by 4 Digits (e.g., AA1234)"
            maxlength="6"
            required
            onkeyup="this.value = this.value.toUpperCase();" 
            value="<?php echo set_value('registracijas_numurs', $auto['registracijas_numurs']); ?>"
        >
        <small>(Formāts: AA1234)</small>
        

        <label>Modelis</label>
        <input type="text" name="modelis" value="<?php echo set_value('modelis', $auto['modelis']); ?>" required maxlength="255">
        

        <label>Ir/Nav uzskaitē</label>
        <select name="ir_uzskaite" required>
            <option value="1" <?php echo set_value('ir_uzskaite', $auto['ir_uzskaite']) == 1 ? 'selected' : ''; ?>>Ir uzskaitē</option>
            <option value="0" <?php echo set_value('ir_uzskaite', $auto['ir_uzskaite']) == 0 ? 'selected' : ''; ?>>Nav uzskaitē</option>
        </select>
        

        <input type="submit" value="Atjaunot">
<?php echo form_close(); ?>