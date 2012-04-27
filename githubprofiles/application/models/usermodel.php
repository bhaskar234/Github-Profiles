
<?php

    class UserModel extends CI_Model
   {



     function isUnique($login)
     {
         $res=$this->db->get_where("users",array('login'=>$login));

         return $res->num_rows();





     }//end if isUnique

     function postuserdata($data)
     {

         $array=array(

         "type"=>$data['type'],
         "login"=>$data['login'],
         "collaborators"=>$data['collaborators'],
         "public_repos"=>$data['public_repos'],
         "public_gists"=>$data['public_gists'],
         "private_repos"=>$data['plan']['private_repos'],
         "private_gists"=>$data['private_gists'],
         "followers"=>$data['followers'],
         "gravatar_id"=>$data['gravatar_id'],
         "html_url"=>$data['html_url'],
         "url"=>$data['url'],
         "created_at"=>$data['created_at'],
         "id"=>$data['id']


         );

        return $this->db->insert("users",$array);
     }//end of function postuserdata

     function updateUserData($data)
     {

          $array=array(

		           "type"=>$data['type'],

		           "collaborators"=>$data['collaborators'],
		           "public_repos"=>$data['public_repos'],
		           "public_gists"=>$data['public_gists'],
		           "private_repos"=>$data['plan']['private_repos'],
		           "private_gists"=>$data['private_gists'],
		           "followers"=>$data['followers'],
		           "gravatar_id"=>$data['gravatar_id'],
		           "html_url"=>$data['html_url'],
		           "url"=>$data['url'],
		           "created_at"=>$data['created_at'],
		           "id"=>$data['id']


		           );

		           $this->db->where('login',$data['login']);

		          return $this->db->update("users",$array);


     }//updateUserData

     function getUsers($options)
     {

       $users=$this->db->get("users",$options['perpage'],$options['offset'])->result();

       $rows=$this->db->get("users")->num_rows();
       $data['users']=$users;
       $data['totalrows']=$rows;
       return $data;




     }//end of getUsers()

     function showProfile($user)
     {

     $data=$this->db->get_where("users",array("login"=>$user))->result();

     return $data;





     }





   }//end of class


?>