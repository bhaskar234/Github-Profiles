
<title>List of Users</title>


<h2>Users List</h2>
<table class="table table-striped " style="width:400px" >
        <thead class="span5">
          <tr>
            <th class="span1">#</th>
            <th class="span4">Login</th>
          </tr>
        </thead>
      <?php
      $i=0;
      foreach($data['users'] as $user)
     {
     ?>
        <tbody class="span5">
          <tr>
            <td class="span1" ><?php echo ($data['options']['offset']+$i+1); ?></td>
            <td class="span4"><a href="<?php echo base_url(); ?>index.php/Welcome/showprofile/<?php echo $user->login;  ?>"><?php echo $user->login;  ?></a></td>
          </tr>
        </tbody>
      <?php

      $i++;
      }


      ?>

      </table>

<?php

$totalpages=$data['totalrows']/$data['options']['perpage'];


?>

<br>
<div class="pagination">
  <ul>

  <?php
  if($data['options']['offset']==0)
  $prevoffset=-1;
  else
  $prevoffset=$data['options']['offset']-$data['options']['perpage'];
  if($data['totalrows']>($data['options']['offset']+$data['options']['perpage']))
  $nextoffset=$data['options']['offset']+$data['options']['perpage'];
  else
  $nextoffset=-1;

  ?>
  <?php
  if($prevoffset!=-1){ ?>
    <li><a href="<?php echo base_url(); ?>index.php/Welcome/showusers/<?php echo $data['options']['perpage'].'/'.$prevoffset; ?>">Prev</a></li>

    <?php
    }
    for($i=1;$i<=$totalpages+1;$i++){ ?>

    <li><a href="<?php echo base_url(); ?>index.php/Welcome/showusers/<?php echo $data['options']['perpage'].'/'.($data['options']['perpage']*($i-1)); ?> "><?php echo $i; ?></a></li>
    <?php }

    if($nextoffset!=-1){ ?>
    <li><a href="<?php echo base_url(); ?>index.php/Welcome/showusers/<?php echo $data['options']['perpage'].'/'.$nextoffset; ?>">Next</a></li>
 <?php  }   ?>
 </ul>
</div>




<?php


/*
echo "<pre>";
print_r($data);
echo "</pre>";
*/

?>
