<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Googleprofile extends MX_Controller {

public function __construct()
{
	parent::__construct();
	
}
	
	public function index(){
		 // //Call Google API
   //      $gClient = new Google_Client();
   //      //var_dump($gClient); die;
   //      $gClient->setApplicationName('A2ztutorials');
   //      $gClient->setClientId($clientId);
   //      $gClient->setClientSecret($clientSecret);
   //      $gClient->setRedirectUri($redirectURL);
   //      $google_oauthV2 = new Google_Oauth2Service($gClient);

        
   //      if(isset($_GET['code']))
   //      {
   //          $gClient->authenticate($_GET['code']);
   //          $_SESSION['token'] = $gClient->getAccessToken();
   //          header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
   //      }

   //      if (isset($_SESSION['token'])) 
   //      {
   //          $gClient->setAccessToken($_SESSION['token']);
   //      }
        
   //      if ($gClient->getAccessToken()) {
   //          $userProfile = $google_oauthV2->userinfo->get();
   //          echo "<pre>";
   //          print_r($userProfile);
   //          die;
   //      } 
   //      else 
   //      {
   //          $url = $gClient->createAuthUrl();
   //          header("Location: $url");
   //          exit;
   //      }
		$this->load->view('googleprofile');
	}
	
		
}
