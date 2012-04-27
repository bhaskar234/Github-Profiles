<title>Repository Info</title>



<?php
/*
echo "<pre>";
print_r($data);
echo "</pre>";
*/

?>
<center><h2>Respository Info</h2>
<div style="width:450px;text-align:left">

  <div class="well ">

          <div class="row" >
          <span class="span1">Name</span>
    	  <span class="span4"><?php echo $data['repoinfo'][0]->name; ?></span>


          </div>
    </div>
    <div class="well ">

          <div class="row" >
          <span class="span1">Owner</span>
    	  <span class="span4"><a href="<?php echo base_url(); ?>index.php/Welcome/showprofile/<?php echo $data['repoinfo'][0]->owner; ?>"><?php echo $data['repoinfo'][0]->owner; ?></a></span>


          </div>
    </div>



  <div class="well ">

    <div class="row" >

      <span class="span1">Description</span>
      <span class="span4"><?php echo $data['repoinfo'][0]->description; ?></span>

    </div>
  </div>
  <div class="well ">

    <div class="row" >
      <span class="span1">Has Issues</span>
	  <span class="span4"><?php if($data['repoinfo'][0]->has_issues==0)echo "NO"; else echo "Yes"; ?></span>



    </div>
  </div>
  <div class="well ">

      <div class="row" >
      <span class="span1">Has Downloads</span>
	  <span class="span4"><?php if($data['repoinfo'][0]->has_downloads==0)echo "NO"; else echo "Yes"; ?></span>


      </div>
  </div>
  <div class="well ">

      <div class="row" >
      <span class="span1">Forks</span>
	  <span class="span4"><?php echo $data['repoinfo'][0]->forks; ?></span>


      </div>
  </div>
  <div class="well ">

      <div class="row" >
      <span class="span1">Homepage</span>
	  <span class="span4"><?php echo $data['repoinfo'][0]->homepage; ?></span>


      </div>
  </div>
  <div class="well ">

        <div class="row" >
        <span class="span1">Has Wiki</span>
  	  <span class="span4"><?php if($data['repoinfo'][0]->has_wiki==0)echo "NO"; else echo "Yes"; ?></span>


        </div>
  </div>
  <div class="well ">

        <div class="row" >
        <span class="span1">Created At</span>
  	  <span class="span4"><?php echo $data['repoinfo'][0]->created_at; ?></span>


        </div>
  </div>
  <div class="well ">

        <div class="row" >
        <span class="span1">Fork</span>
  	  <span class="span4"><?php echo $data['repoinfo'][0]->fork; ?></span>


        </div>
  </div>
  <div class="well ">

        <div class="row" >
        <span class="span1">watchers</span>
  	  <span class="span4"><?php echo $data['repoinfo'][0]->watchers; ?></span>


        </div>
  </div>
  <div class="well ">

        <div class="row" >
        <span class="span1">size</span>
  	  <span class="span4"><?php echo $data['repoinfo'][0]->size; ?></span>


        </div>
  </div>
  <div class="well ">

        <div class="row" >
        <span class="span1">private</span>
  	  <span class="span4"><?php if($data['repoinfo'][0]->private==0)echo "No"; else echo "Yes"; ?></span>


        </div>
  </div>
  <div class="well ">

        <div class="row" >
        <span class="span1">Open Issues</span>
  	  <span class="span4"><?php echo $data['repoinfo'][0]->open_issues; ?></span>


        </div>
  </div>
    <div class="well ">

        <div class="row" >
        <span class="span1">Pushed At</span>
  	  <span class="span4"><?php echo $data['repoinfo'][0]->pushed_at; ?></span>


        </div>
  </div>
  <div class="well ">

        <div class="row" >
        <span class="span1">Url</span>
  	  <span class="span4"><a href="<?php echo $data['repoinfo'][0]->url; ?>" target="_blank"><?php echo $data['repoinfo'][0]->url; ?></a></span>


        </div>
  </div>
</div>
</center>