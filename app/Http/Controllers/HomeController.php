<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = file_get_contents('https://graph.facebook.com/oauth/access_token?client_id='.env('FB_APP_ID').'&client_secret='.env('FB_APP_SECRET').'&grant_type=client_credentials');
        $obj = json_decode($res);
          
        $fb = new \Facebook\Facebook([
            'app_id' => env('FB_APP_ID'),
            'app_secret' => env('FB_APP_SECRET'),
            'default_graph_version' => 'v2.10',
            //'default_access_token' => 'EAACEdEose0cBAKwLvJgAzJc96Gvq9v1ZAdzNMGcdYc5Gb9Dk8BdT9NN1qiYnZAbaVb01l6eiIiG3Dto7uZBLd1lUJW9t5KS5C7lsyja75qX0hRqyZA7CufXmXA4D3Gd6TzVANZBMQpR0Hp24LChYvO4t8m7omGreVIwZCBpi8ztt1IiESBXJKOTqjJjnYErEUZD',
          ]);

          try {
            // Get the \Facebook\GraphNodes\GraphUser object for the current user.
            // If you provided a 'default_access_token', the '{access-token}' is optional.
            $response = $fb->get('/143477955718812', $obj->access_token);
          } catch(\Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
          } catch(\Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
          }
          
          $me = $response->getGraphUser();
          // echo 'Logged in as ' . $me->getName();

          return view('home', compact('obj'));
 
    }
}
