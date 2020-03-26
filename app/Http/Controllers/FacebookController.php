<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

class FacebookController extends Controller
{
    public function index()
    {
        $fb = new Facebook([
            'app_id' => config('facebook.app_id'),
            'app_secret' => config('facebook.app_secret'),
            'default_graph_version' => config('facebook.default_graph_version')
        ]);

        try {
            $response = $fb->get('/me?fields=id,name', config('facebook.access_token'));
        } catch(FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $user = $response->getGraphUser();

        return view('facebook.index', [
            'user' => $user
        ]);
    }
}
