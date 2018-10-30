<?php echo form_open("billing/dup7re"); ?>
<table>
    <tbody>
    <tr>
        <td>Месяц</td>
        <td>
            <select  style="width: 100%"  name='period_id'>
                <?php foreach ($periods->result() as $period): ?>
                    <option value=<?php echo $period->id; ?>><?php echo $period->name; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Дебиторы/кредиторы</td>
        <td>
            <select  style="width: 100%"  name='firm_type'>
                <option value='all'>Выдать всех</option>
                <option value='debet'>Выдать дебиторов</option>
                <option value='kredit'>Выдать кредиторов</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>ТУРЭ:</td>
        <td>
            <select  style="width: 100%"  name='ture_id'>
                <?php foreach ($ture->result() as $t): ?>
                    <option value=<?php echo $t->id; ?>><?php echo $t->name; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2"><input style="width: 100%" type=submit value='Отчет 7-РЭ (+)'/></td>
    </tr>
    </tbody>
</table>
</form>