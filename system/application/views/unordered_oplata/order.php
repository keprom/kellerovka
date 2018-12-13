<?php echo anchor("billing/unordered_oplata", "Назад"); ?><br><br>
<table class="border-table">
    <thead>
    <tr>
        <th style="width: 200px">Наименование</th>
        <th>Договор</th>
        <th>Дата</th>
        <th>Сумма с НДС</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($uo as $o): ?>
        <tr>
            <td><?php echo $o->name; ?></td>
            <td align="center"><?php echo $o->dogovor; ?></td>
            <td align="center"><?php echo $o->data; ?></td>
            <td class="td-number"><?php echo prettify_number($o->oplata); ?></td>
            <td align="center">
                <?php if (!empty($o->oplata)): ?>
                    <?php echo form_open("billing/change_oplata_ordering"); ?>
                    <select name="firm_id" id="">
                        <?php foreach ($dogs as $dog => $firm_id): ?>
                            <?php if ($dog == $o->dogovor) continue; ?>
                            <option value="<?php echo $firm_id; ?>"><?php echo $dog; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="oplata_id" value="<?php echo $o->oplata_id; ?>">
                    <input type="hidden" name="nomer1c" value="<?php echo $nomer1c; ?>">
                    <br><br>
                    <input type="submit" value="Перенос">
                    <?php echo form_close(); ?>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>