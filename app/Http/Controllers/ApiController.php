<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
class ApiController extends Controller
{
    //

    public function cuaca(Request $req) {
        
        $client = new \GuzzleHttp\Client(); 
        try {
            $response = $client->request('POST', 'http://api.openweathermap.org/data/2.5/weather', [
                'query' => [
                    'q' => $req->input('kota'),
                    'appid' => 'df307b186bbec0a070108a1637c7126c'    
                ]
            ]);
            //if($response->getStatusCode() == 200) {
            //    return $response->getBody()->getContents();

            //}

            //searching apikey from user table
            $apikey = User::where('apikey', '=', $req->input('key'))->first();
            if($apikey === null) {
                $data = [
                    'status' => 500,
                    'message' => 'Invalid Api Key'
                ];
                return $data;
            } else if($response->getStatusCode() == 200) {
                $re = json_decode($response->getBody()->getContents(), true);
                //storing in new json data
                $data = [
                    'status' => 200, 
                    'data' => [
                        'main' => $re['weather'][0]['main'],
                        'desc' => $re['weather'][0]['description'],
                    ]
                ];
                return $data;
            } 

        } catch (ClientException $e) {
            $errorJson = json_decode($e->getResponse()->getBody(), true);
            $data = [
                'status' => 400,
                'message' => $errorJson['message']
            ];
            return $data;
        } catch (RequestException $e) {
            $errorJson = json_decode($e->getResponse()->getBody(), true);
            $data = [
                'status' => 400,
                'message' => $errorJson['message']
            ];
            return $data;
        } catch (Exception $e) {
            $data = [
                'status' => 400,
                'message' => $e
            ];
            return $data;
        }
    }
}
