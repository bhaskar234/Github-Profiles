<?php


  class ReposModel extends CI_Model
  {

    function postrepos($data)
    {

       $repos=$data['repositories'];
       for($i=0;$i<sizeof($repos);$i++)
       {
         /*
          echo "<br>Repo ".$i."<pre>";
          print_r($repos[$i]);
          echo "</pre>";
          */
          $this->db->insert("repos",$repos[$i]);


       }



    }//end of postrepos

    function updateRepos($data)
    {
             $repos=$data['repositories'];
             for($i=0;$i<sizeof($repos);$i++)
	         {
               $rows=$this->db->get_where("repos",array("owner"=>$repos[$i]['owner'],"name"=>$repos[$i]['name']))->num_rows();
               if($rows==1)
	           $this->db->update("repos",$repos[$i],array("owner"=>$repos[$i]['owner'],"name"=>$repos[$i]['name']));
	           else
	           {

	           $this->db->insert("repos",$repos[$i]);

	           }


	         }


    }

    function getRepos($user)
    {

     $repos=$this->db->get_where("repos",array("owner"=>$user));

     return $repos;

    }//getRepos


    function getRepoInfo($repo,$user)
    {

    $info=$this->db->get_where("repos",array("owner"=>$user,"name"=>$repo));
    return $info->result();




    }//end of getRepoInfo

  }//end of class


?>