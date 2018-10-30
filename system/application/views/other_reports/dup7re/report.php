<html>
<head>
    <title>Оборотная ведомость</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="<?php echo base_url() . 'css/fullpage.css'; ?>">
</head>
<center>ОБОРОТНАЯ ВЕДОМОСТЬ</center>
<center><?php echo $org->org_name; ?> за <?php echo $period->name . " ";
    if ($use_ture = '1') $ture; ?> </center>
<table class="border-table" style="border: black;font-family: Verdana; font-size: xx-small;">
    <tr align=center>
        <td rowspan=2>
            № Дог.
        </td>
        <td rowspan=2>
            Наименование потребителя
        </td>
        <td colspan=2>
            На начало отчетного периода
        </td>
        <td rowspan=2>
            Начислено
        </td>
        <td rowspan=2>
            Оплачено, всего
        </td>
        <td colspan=2>
            На конец периода
        </td>
        <td rowspan=2>
            Кол-во кВт/ч
        </td>
    </tr>
    <tr align=center>
        <td>
            Дебет
        </td>
        <td>
            Кредит
        </td>
        <td>
            Дебет
        </td>
        <td>
            Кредит
        </td>
    </tr>
    <!-- Конец шапки -->
    <?php
    $last_group = -1;
    $u_sum_debet = 0;
    $u_sum_kredit = 0;
    $u_sum_nachisleno = 0;
    $u_sum_oplata = 0;
    $u_sum_kredit_end = 0;
    $u_sum_debet_end = 0;
    $u_sum_itogo_kvt = 0 ?>

    <?php $sum_debet = 0;
    $sum_kredit = 0;
    $sum_nachisleno = 0;
    $sum_oplata = 0;
    $sum_kredit_end = 0;
    $sum_debet_end = 0;
    $sum_itogo_kvt = 0 ?>
    <?php foreach ($report->result() as $data): ?>
        <?php if ($last_group != $data->subgroup_id): ?>
            <?php if ($last_group != -1): ?>
                <tr class="td-number">
                    <td colspan=2 class="td-number"><b>Итого по группе</b></td>
                    <td class="td-number"><b><?php echo prettify_number($sum_debet); ?></b></td>
                    <td class="td-number"><b><?php echo prettify_number($sum_kredit); ?></b></td>
                    <td class="td-number"><b><?php echo prettify_number($sum_nachisleno); ?></b></td>
                    <td class="td-number"><b><?php echo prettify_number($sum_oplata); ?></b></td>
                    <td class="td-number"><b><?php echo prettify_number($sum_debet_end); ?></b></td>
                    <td class="td-number"><b><?php echo prettify_number($sum_kredit_end); ?></b></td>
                    <td class="td-number"><b><?php echo prettify_number($sum_itogo_kvt); ?></b></td>

                    <?php
                    $u_sum_debet += $sum_debet;
                    $u_sum_kredit += $sum_kredit;
                    $u_sum_nachisleno += $sum_nachisleno;
                    $u_sum_oplata += $sum_oplata;
                    $u_sum_kredit_end += $sum_kredit_end;
                    $u_sum_debet_end += $sum_debet_end;
                    $u_sum_itogo_kvt += $sum_itogo_kvt;
                    ?>
                    <?php $sum_debet = 0;
                    $sum_kredit = 0;
                    $sum_nachisleno = 0;
                    $sum_oplata = 0;
                    $sum_kredit_end = 0;
                    $sum_debet_end = 0;
                    $sum_itogo_kvt = 0; ?>
                </tr>
            <?php endif; ?>
            <tr>
                <td colspan=9><b><?php echo $data->subgroup_name; ?> </b></td>
            </tr>
        <?php endif; ?>
        <tr>
            <td align=center>
                <?php echo $data->dogovor; ?>
            </td>
            <td>
                <?php echo $data->name; ?>
            </td>
            <td class="td-number">&nbsp;
                <?php echo prettify_number($data->debet_start); ?>
            </td>
            <td class="td-number">&nbsp;
                <?php echo prettify_number($data->kredit_start); ?>
            </td>
            <td class="td-number">
                <?php echo prettify_number($data->itogo_with_nds); ?>
            </td>
            <td class="td-number">
                <?php echo prettify_number($data->oplata_value); ?>
            </td>
            <td class="td-number">
                <?php echo prettify_number($data->debet_end); ?>
            </td>
            <td class="td-number">
                <?php echo prettify_number($data->kredit_end); ?>
            </td>
            <td class="td-number">
                <?php echo prettify_number($data->itog_kvt); ?>
            </td>

        </tr>
        <?php
        $last_group = $data->subgroup_id;
        $sum_debet += $data->debet_start;
        $sum_kredit += $data->kredit_start;
        $sum_nachisleno += $data->itogo_with_nds;
        $sum_oplata += $data->oplata_value;
        $sum_kredit_end += $data->kredit_end;
        $sum_debet_end += $data->debet_end;
        $sum_itogo_kvt += $data->itog_kvt;
        ?>
    <?php endforeach; ?>
    <tr class="td-number">
        <td colspan=2 class="td-number"><b>Итого по группе</b></td>
        <td class="td-number"><b><?php echo prettify_number($sum_debet); ?></b></td>
        <td class="td-number"><b><?php echo prettify_number($sum_kredit); ?></b></td>
        <td class="td-number"><b><?php echo prettify_number($sum_nachisleno); ?></b></td>
        <td class="td-number"><b><?php echo prettify_number($sum_oplata); ?></b></td>
        <td class="td-number"><b><?php echo prettify_number($sum_debet_end); ?></b></td>
        <td class="td-number"><b><?php echo prettify_number($sum_kredit_end); ?></b></td>
        <td class="td-number"><b><?php echo prettify_number($sum_itogo_kvt); ?></b></td>
    </tr>
    <?php
    $u_sum_debet += $sum_debet;
    $u_sum_kredit += $sum_kredit;
    $u_sum_nachisleno += $sum_nachisleno;
    $u_sum_oplata += $sum_oplata;
    $u_sum_kredit_end += $sum_kredit_end;
    $u_sum_debet_end += $sum_debet_end;
    $u_sum_itogo_kvt += $sum_itogo_kvt;
    ?>
    <tr>
        <td colspan=9>&nbsp;</td>
    </tr>
    <tr>
        <td colspan=2 class="td-number">Итого</td>
        <td class="td-number"><font size=1><?php echo prettify_number($u_sum_debet); ?></font></td>
        <td class="td-number"><font size=1><?php echo prettify_number($u_sum_kredit); ?></font></td>
        <td class="td-number"><font size=1><?php echo prettify_number($u_sum_nachisleno); ?></font></td>
        <td class="td-number"><font size=1><?php echo prettify_number($u_sum_oplata); ?></font></td>
        <td class="td-number"><font size=1><?php echo prettify_number($u_sum_debet_end); ?></font></td>
        <td class="td-number"><font size=1><?php echo prettify_number($u_sum_kredit_end); ?></font></td>
        <td class="td-number"><font size=1><?php echo prettify_number($u_sum_itogo_kvt); ?></font></td>
    </tr>

</table>
<br>
<br>
<center>
    <table>
        <tr>
            <td>Главный бухгалтер</td>
            <td width=150px></td>
            <td> <?php echo $org->glav_buh; ?></td>
        </tr>
        <tr>
            <td>Начальник отдела сбыта</td>
            <td width=150px></td>
            <td> <?php echo trim($org->nachalnik_otdela_sbyta); ?></td>
        </tr>
    </table>
</center>
</html>