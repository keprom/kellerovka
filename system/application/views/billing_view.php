ВСЕГО:  
<?php
    echo $query->num_rows()." предприятий<br><br><table>";
	foreach ($query->result() as $row)
	{
	if ($row->dog_real=="0") {
		 echo "<tr><td>{$row->dogovor}</td><td>";
		 
		 $link ="<FONT COLOR=\"";
		if ($row->firm_closed=="t")
		{
			if ($row->close_type == 1){
			 $link.="GRAY";}
			 else
			 {
			 $link.="YELLOW";
			 }
		}
		else
		{
			if  ($row->is_closed!=NULL)
			{
				$link.= "RED";
			}
			else
			{
				$link.= "GREEN";
			}
		}  
	     $link.="\">   {$row->firm_name}   </FONT>";
	   
	   
	   
	   echo anchor("billing/firm/".$row->firm_id,$link)."</td></tr>";} else {
	   echo "<tr><td>{$row->dog_real}</td><td>";
		 
		 $link ="<FONT COLOR=\"";
		if ($row->firm_closed=="t")
		{
			if ($row->close_type == 1){
			 $link.="GRAY";}
			 else
			 {
			 $link.="YELLOW";
			 }
		}
		else
		{
			if  ($row->is_closed!=NULL)
			{
				$link.= "RED";
			}
			else
			{
				$link.= "GREEN";
			}
		}  
	     $link.="\">   {$row->firm_name}   </FONT>";
		 echo anchor("billing/firm/".$row->firm_id,$link)."</td></tr>";}
	   
	  
	}
	echo "</table><br><br><br>".anchor("billing/add_firm","Добавить фирму");
?>
