<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class GenerateToken extends Controller
{
  public function index()
  {
         $client = new \GuzzleHttp\Client();
         $response = $client->request('POST', 'https://login.microsoftonline.com/common/oauth2/token?access_token', [
             'form_params' => [
                 'grant_type' => 'password',
                 'username' => 'sehati1@prawathiyakarsapradiptha.onmicrosoft.com',
                 'password' => 'S3h4t112345',
                 'client_id' => '6126ea36-bc47-4a81-b6be-f6e118363e8d',
                 'resource' => 'https://analysis.windows.net/powerbi/api',
                 'scope' => 'openid',
                 'client_secret' => '[-.z10DA.EUZsiyJuxQUbCkRK2JPScw1'
             ]
         ]);
         $response = $response->getBody()->getContents();
         $response = json_decode($response);
         $access_token = $response->access_token ;
         Session::put('access_token',$access_token);
         $expires_on = $response->expires_on ;
         Session::put('expire_on',$expires_on);
         $token = $access_token ;
  }
}
