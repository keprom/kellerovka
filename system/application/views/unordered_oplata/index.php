<table class="border-table">
    <thead>
    <tr>
        <th>№</th>
        <th>Наименование</th>
        <th>Договор</th>
        <th>Номер 1С</th>
        <th>Сумма</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1; ?>
    <?php foreach ($uo as $o): ?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo anchor("billing/order_oplata/{$o->nomer1c}", $o->name); ?></td>
        <td><?php echo $o->dogovor; ?></td>
        <td><?php echo $o->nomer1c; ?></td>
        <td class="td-number"><?php echo prettify_number($o->oplata); ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>