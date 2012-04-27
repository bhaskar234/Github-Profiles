<title>Repositories</title>

<?php

/*
echo "<br><pre>";
print_r($data['repos']->result());
echo "</pre>";
*/


echo "<h2><center>Repositories</center></h2>";
$i=1;
foreach($data['repos']->result() as $repo)
{

?>
	<center><div style='width:500px'><div class='well	'><div class='row span'><span class='span1'><?php echo $i; ?></span><span class='span3'><a href='<?php echo base_url(); ?>index.php/Welcome/getRepoInfo/<?php echo $repo->name; ?>/<?php echo $repo->owner; ?>'><?php echo $repo->name; ?></a></span></div></div></div></center>

<?php

    $i++;

}

?>