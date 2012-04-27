
<title>Profile</title>
<h2>Profile</h2>
<table class="table" style="width:500px">

      <?php

      /*
      foreach($data['userprofile'][0] as $item)
      {


    echo "<tr><td class='span2' >".key($data['userprofile'][0])."</td>";
    echo "<td class='span4'>".$item."</td></tr>";

     }

*/



      ?>
      <tr>
        <td>Type</td>
        <td><?php echo $data['userprofile'][0]->type; ?></td>
      </tr>
      <tr>
        <td>Login</td>
        <td><?php echo $data['userprofile'][0]->login; ?></td>
      </tr>
      <tr>
        <td>Collaborators</td>
        <td><?php echo $data['userprofile'][0]->collaborators; ?></td>
      </tr>
      <tr>
	          <td>Public Gists</td>
	          <td><?php echo $data['userprofile'][0]->public_gists; ?></td>
      </tr>
      <tr>
	          <td>Private Gists</td>
	          <td><?php echo $data['userprofile'][0]->private_gists; ?></td>
      </tr>
      <tr>
	          <td><a href="<?php echo base_url(); ?>index.php/Welcome/showrepos/<?php echo $data['userprofile'][0]->login; ?>">Public Repositories</a></td>
	          <td><?php echo $data['userprofile'][0]->public_repos; ?></td>
      </tr>
      <tr>
	          <td>Private Repositories</td>
	          <td><?php echo $data['userprofile'][0]->private_repos; ?></td>
      </tr>
      <tr>
	          <td>Followers</td>
	          <td><?php echo $data['userprofile'][0]->followers; ?></td>
      </tr>
      <tr>
	          <td>Html Url</td>
	          <td><?php echo "<a href=".$data['userprofile'][0]->html_url." target='_blank'>".$data['userprofile'][0]->html_url."</a>"; ?></td>
      </tr>




</table>

<br>