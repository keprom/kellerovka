<?php
function f_d($var)
{
	if ($var==0) return "&nbsp;"; else
	return sprintf("%22.2f",$var);
}
function f_d2($var)
{
	if ($var==0) return "&nbsp;"; else
	return sprintf("%22.0f",$var);
}
?>
<html>
<head>
<title>��������� ���������</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

</head>
<center>��������� ���������</center>
<center><?php echo $org_info->org_name;?> �� <?php echo $period->name." ";
if ($use_ture='1')
  $ture;?> </center>
<?php 
$last_group=-1;

?>

<table  width=100% border=1px cellspacing=0px style="border: black;font-family: Verdana; font-size: xx-small;">
<tr align=center>
<td  rowspan=2>
� ���.
</td>
<td rowspan=2 width=200px >
������������ �����������
</td>
<td colspan=2>
�� ������ ��������� �������
</td>
<td rowspan=2>
���������
</td>
<td rowspan=2>
��������, �����
</td>
<td colspan=2>
�� ����� �������
</td>
<td rowspan=2>
���-�� ���/�
</td>
</tr>
<tr align=center>
<td>
�����
</td>
<td>
������
</td>
<td>
�����
</td>
<td>
������
</td>
</tr>
<!-- ����� ����� -->
<?php $u_sum_debet=0;$u_sum_kredit=0;$u_sum_nachisleno=0;$u_sum_oplata=0;$u_sum_kredit_end=0;$u_sum_debet_end=0;$u_sum_itogo_kvt=0; $sum1=0;$kvt1=0; $sum2=0;$kvt2=0; $sum3=0;$kvt3=0?>

<?php $sum_debet=0;$sum_kredit=0;$sum_nachisleno=0;$sum_oplata=0;$sum_kredit_end=0;$sum_debet_end=0;$sum_itogo_kvt=0?>
<?php foreach($sql_result->result() as $data):?>
<?php if ($last_group!=$data->subgroup_id):?>
	<?php if ($last_group!=-1): ?> 
		<tr align=right><td colspan=2 align=right><b>����� �� ������</b></td>
			<td><b><?php echo f_d($sum_debet); ?></b></td>
			<td><b><?php echo f_d($sum_kredit); ?></b></td>
			<td><b><?php echo f_d($sum_nachisleno); ?></b></td>
			<td><b><?php echo f_d($sum_oplata); ?></b></td>
			<td><b><?php echo f_d($sum_debet_end); ?></b></td>
			<td><b><?php echo f_d($sum_kredit_end); ?></b></td>
			<td><b><?php echo f_d($sum_itogo_kvt); ?></b></td>
			
			<?php 
			$u_sum_debet+=$sum_debet;
			$u_sum_kredit+=$sum_kredit;
			$u_sum_nachisleno+=$sum_nachisleno;
			$u_sum_oplata+=$sum_oplata;
			$u_sum_kredit_end+=$sum_kredit_end;
			$u_sum_debet_end+=$sum_debet_end;
			$u_sum_itogo_kvt+=$sum_itogo_kvt;
			?>
			<?php $sum_debet=0;$sum_kredit=0;$sum_nachisleno=0;$sum_oplata=0;$sum_kredit_end=0;$sum_debet_end=0;$sum_itogo_kvt=0;?>
		</tr>
	<?php endif;?>
<tr><td colspan=9><b><?php echo $data->subgroup_name;?> </b></td></tr>
<?php endif;?>
<tr>
<td align=center>
<?php if ($data->dogovor==1) {$sum1=$data->nachisleno;$kvt1=$data->itogo_kvt;}?>
<?php if ($data->dogovor==1) continue;?>
<?php if ($data->dogovor==2) {$data->nachisleno=$sum1+$data->nachisleno;$data->itogo_kvt=$kvt1+$data->itogo_kvt;}?>
<?php if ($data->dogovor==4) {$sum2=$data->nachisleno;$kvt2=$data->itogo_kvt;}?>
<?php if ($data->dogovor==4) continue;?>
<?php if ($data->dogovor==5) {$sum3=$sum2+$data->nachisleno;$kvt3=$kvt2+$data->itogo_kvt;}?>
<?php if ($data->dogovor==5) continue;?>
<?php if ($data->dogovor==6) {$data->nachisleno=$sum3+$data->nachisleno;$data->itogo_kvt=$kvt3+$data->itogo_kvt;}?>
<?php if ($data->dogovor==1410) {$sum1=$data->nachisleno;$kvt1=$data->itogo_kvt;}?>
<?php if ($data->dogovor==1410) continue;?>
<?php if ($data->dogovor==9000) {$data->nachisleno=$sum1+$data->nachisleno;$data->itogo_kvt=$kvt1+$data->itogo_kvt;}?>
<?php if ($data->dogovor==9007) {$sum2=$data->nachisleno;$kvt2=$data->itogo_kvt;}?>
<?php if ($data->dogovor==9007) continue;?>
<?php if ($data->dogovor==9008) {$sum3=$sum2+$data->nachisleno;$kvt3=$kvt2+$data->itogo_kvt;}?>
<?php if ($data->dogovor==9008) continue;?>
<?php if ($data->dogovor==9099) {$data->nachisleno=$sum3+$data->nachisleno;$data->itogo_kvt=$kvt3+$data->itogo_kvt;}?>
<?php if ($data->dogovor==9009) {$sum1=$data->nachisleno;$kvt1=$data->itogo_kvt;}?>
<?php if ($data->dogovor==9009) continue;?>
<?php if ($data->dogovor==9010) {$data->nachisleno=$sum1+$data->nachisleno;$data->itogo_kvt=$kvt1+$data->itogo_kvt;}?>
<?php echo $data->dogovor;?>
</td>
<td>
<?php echo $data->firm_name;?>
</td>
<td align=right>&nbsp;
<?php echo f_d($data->debet_value);?>
</td>
<td align=right>&nbsp;
<?php echo f_d($data->kredit_value);?>
</td>
<td align=right>
<?php echo f_d($data->nachisleno);?>
</td>
<td align=right>
<?php echo f_d($data->oplata_value);?>
</td>
<?php $saldo=$data->debet_value- $data->kredit_value-$data->oplata_value+$data->nachisleno; ?>
<td align=right>
 <?php if ($saldo>0) echo f_d($saldo); else echo "&nbsp;";?>
</td>
<td align=right>
 <?php if ($saldo<0) echo f_d(-1*$saldo); else echo "&nbsp;"; ?>
</td>
<td align=right>
<?php echo f_d($data->itogo_kvt);?>
</td>

</tr>
<?php 
$last_group=$data->subgroup_id;
$sum_debet+=$data->debet_value;
$sum_kredit+=$data->kredit_value;
$sum_nachisleno+=$data->nachisleno;
$sum_oplata+=$data->oplata_value;
$sum_kredit_end+=($saldo<0?-1*$saldo:0);
$sum_debet_end+=($saldo>0?$saldo:0);
$sum_itogo_kvt+=$data->itogo_kvt;
?>
<?php endforeach;?>
<tr align=right><td colspan=2 align=right><b>����� �� ������</b></td>
			<td><b><?php echo f_d($sum_debet); ?></b></td>
			<td><b><?php echo f_d($sum_kredit); ?></b></td>
			<td><b><?php echo f_d($sum_nachisleno); ?></b></td>
			<td><b><?php echo f_d($sum_oplata); ?></b></td>
			<td><b><?php echo f_d($sum_debet_end); ?></b></td>
			<td><b><?php echo f_d($sum_kredit_end); ?></b></td>
			<td><b><?php echo f_d($sum_itogo_kvt); ?></b></td>
		</tr>
		<?php 
			$u_sum_debet+=$sum_debet;
			$u_sum_kredit+=$sum_kredit;
			$u_sum_nachisleno+=$sum_nachisleno;
			$u_sum_oplata+=$sum_oplata;
			$u_sum_kredit_end+=$sum_kredit_end;
			$u_sum_debet_end+=$sum_debet_end;
			$u_sum_itogo_kvt+=$sum_itogo_kvt;
			?>
<tr><td colspan=9>&nbsp;</td></tr>
<tr>
<td colspan=2 align=right>�����</td>
<td><font size=1><?php echo f_d($u_sum_debet); ?></font></td>
			<td><font size=1><?php echo f_d($u_sum_kredit); ?></font></td>
			<td><font size=1><?php echo f_d($u_sum_nachisleno); ?></font></td>
			<td><font size=1><?php echo f_d($u_sum_oplata); ?></font></td>
			<td><font size=1><?php echo f_d($u_sum_debet_end); ?></font></td>
			<td><font size=1><?php echo f_d($u_sum_kredit_end); ?></font></td>
			<td><font size=1><?php echo f_d2($u_sum_itogo_kvt); ?></font></td>
</tr>

</table>
<br>
<br>
<center>
<table>
<tr>
<td>������� ���������</td><td width=150px></td><td> <?php echo $org_info->glav_buh;?></td>
</tr><tr>
<td>��������� ������ �����</td><td width=150px></td><td> <?php echo trim($org_info->nachalnik_otdela_sbyta);?></td>
</tr>
</table>
</center>
</html>