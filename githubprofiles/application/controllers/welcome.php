<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller...
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function test()
	{


		$this->load->view('welcome_message');


	}

   function showrepos($user)
   {
      $this->load->model('ReposModel');
      $repos=$this->ReposModel->getRepos($user);
      $array['data']['repos']=$repos;
      $array['data']['content']="showrepos";
      $this->load->view('firsttemplate',$array);



   }//showrepos

   function getRepoInfo($repo,$user)
   {
   $this->load->model('ReposModel');
   $repoinfo=$this->ReposModel->getRepoInfo($repo,$user);
   $array['data']['repoinfo']=$repoinfo;
   $array['data']['content']="showrepoinfo";
   $this->load->view('firsttemplate',$array);



   }





   function showusers($perpage,$offset)
   {

       if(isset($perpage))
	          $options['perpage']=$perpage;
	          else
	          $options['perpage']=10;
	          if(isset($offset))
	          $options['offset']=$offset;
	          else
	          $options['offset']=0;


       $array['data']['options']['perpage']=$options['perpage'];
       $array['data']['options']['offset']=$options['offset'];

       $this->load->model('UserModel');
       $res=$this->UserModel->getUsers($options);
       $users=$res['users'];
       $totalrows=$res['totalrows'];
       $array['data']['users']=$users;
       $array['data']['content']="showusers";
       $array['data']['totalrows']=$totalrows;

       $this->load->view('firsttemplate',$array);




   }

   function showprofile($user)
   {
   /*
     echo "<pre>";
          print_r($this->UserModel->showProfile($user));
      echo "</pre>";
    */
       $this->load->model('UserModel');

      $array['data']['userprofile']=$this->UserModel->showProfile($user);
      $array['data']['content']="userprofile";

      $this->load->view('firsttemplate',$array);


   }//end of showprofile





    public function updateProfile()
    {
      $this->auth();
      $url="https://api.github.com/user?".$_SESSION['access_token'];
	  		  $request = new HttpRequest($url, HTTP_METH_GET);
	  		  $request->send();
	  		  $response = $request->getResponseBody();
	  		  $array = json_decode(stripslashes($response), true);
	  		  $this->load->model('UserModel');
	  		  $rows=$this->UserModel->isUnique($array['login']);
              if($rows==1)
              {
	  		  $result=$this->UserModel->updateUserData($array);

	  		  $url="http://github.com/api/v2/json/repos/show/".$array['login'];
	  			$request = new HttpRequest($url, HTTP_METH_GET);
	  			$request->send();
	  			$response = $request->getResponseBody();
	  			$array = json_decode(stripslashes($response), true);

	              $this->load->model('ReposModel');
	              $this->ReposModel->updateRepos($array);

                $array['data']['msg']="Profile Updated Successfully";
                  }
                  else
                  {

                    $array['data']['msg']="Profile doesnt exist, <a href='".base_url()."'> create first </a>";
                  }

                  $array['data']['content']="updatesuccess";


                  $this->load->view('firsttemplate',$array);

    }//end of updateProfile

	public function index()
	{

          $this->auth();

       if(isset($_SESSION['access_token']))
        {
          if(($_SESSION['access_token']!="")&&($_SESSION['access_token']!=null))
          {


          $url="https://api.github.com/user?".$_SESSION['access_token'];
		  $request = new HttpRequest($url, HTTP_METH_GET);
		  $request->send();
		  $response = $request->getResponseBody();
		  $array = json_decode(stripslashes($response), true);
		  $_SESSION['login']=$array['login'];
		  $this->load->model('UserModel');
		  $rows=$this->UserModel->isUnique($array['login']);
		  if($rows==0)
		  {
		  $result=$this->UserModel->postuserdata($array);
		  $url="http://github.com/api/v2/json/repos/show/".$array['login'];
			$request = new HttpRequest($url, HTTP_METH_GET);
			$request->send();
			$response = $request->getResponseBody();
			$array = json_decode(stripslashes($response), true);

            $this->load->model('ReposModel');
            $this->ReposModel->postrepos($array);

            $array['data']['msg']="Profile created successfully ";

           }
           else
           {
             $array['data']['msg']="Your profile already created , do you want to update it ?";
           }

           $array['data']['content']="indexpage";
           $this->load->view("firsttemplate",$array);


          }

        }



	}


    public function auth()
    {

        session_start();

        $redirecturi="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

			   $client_secret="20ee6fd2deaed712409544d28f683dc7ead68501";

			   $getTokenUrl="https://github.com/login/oauth/access_token?client_id=799c118a4784b2e967f8&redirect_uri=".$redirecturi."&client_secret=".$client_secret;

			   $getCodeUrl = "https://github.com/login/oauth/authorize?client_id=799c118a4784b2e967f8&redirect_uri=".$redirecturi."&scope=user,public_repo";

        $getAccessToken=0;

        if(isset($_SESSION['access_token']))
          {
            if(($_SESSION['access_token']=="")||($_SESSION['access_token']==null))
            {
             $getAccessToken=1;
             }


          }
          else
          $getAccessToken=1;

        if($getAccessToken==1)
        {
           if(isset($_REQUEST['code']))
             {
                if(($_REQUEST['code']!="")||($_REQUEST['code']!=null))
                {

                         $code=$_REQUEST['code'];
                         $getTokenUrl = $getTokenUrl."&code=".$code;
              		     $request = new HttpRequest($getTokenUrl, HTTP_METH_POST);
						 $request->send();
						 $response = $request->getResponseBody();
						 $_SESSION['access_token']=$response;
                }
                else
                {
                     ?>
					 <script>self.location="<?php echo $getCodeUrl; ?></script>
					 <?php

                }
             }
             else
             {
			 		?>
					<script>self.location="<?php echo $getCodeUrl; ?>"</script>
					<?php

             }


        }
    }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
