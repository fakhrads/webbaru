<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\Exception;
class ApiController extends Controller
{
    //

    public function cuaca(Request $req) {
        
        $client = new \GuzzleHttp\Client(); 
        try {
            $response = $client->request('GET', 'http://api.openweathermap.org/data/2.5/weather', [
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
            if ($e->getResponse()->getStatusCode() == '400') {
                $errorJson = json_decode($e->getResponse()->getBody(), true);
                $data = [
                    'status' => 400,
                    'message' => $errorJson['message']
                ];
                return $data;
            }
            $errorJson = json_decode($e->getResponse()->getBody(), true);
            $data = [
                'status' => 400,
                'message' => $errorJson['message']
            ];
            return $data;
        } catch (RequestException $e) {
            if ($e->getResponse()->getStatusCode() == '400') {
                $errorJson = json_decode($e->getResponse()->getBody(), true);
                $data = [
                    'status' => 400,
                    'message' => $errorJson['message']
                ];
                return $data;
            }
        } catch (Exception $e) {
            $data = [
                'status' => 400,
                'message' => $e
            ];
            return $data;
        }
    }

    public function corona(Request $req) {
        $apikey = User::where('apikey', '=', $req->input('key'))->first();
        if($apikey === null or $req->input('key') === null) {
            $data = [
                'status' => 500,
                'message' => 'Invalid Api Key'
            ];
            return $data;
        } else {
            $curl = curl_init();

            curl_setopt_array($curl, array(
	            CURLOPT_URL => "https://covid-19-coronavirus-statistics.p.rapidapi.com/v1/stats?country=".$req->input('kota'),
	            CURLOPT_RETURNTRANSFER => true,
	            CURLOPT_FOLLOWLOCATION => true,
	            CURLOPT_ENCODING => "",
	            CURLOPT_MAXREDIRS => 10,
	            CURLOPT_TIMEOUT => 30,
	            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	            CURLOPT_CUSTOMREQUEST => "GET",
	            CURLOPT_HTTPHEADER => array(
		            "x-rapidapi-host: covid-19-coronavirus-statistics.p.rapidapi.com",
		            "x-rapidapi-key: BLCWiekzXcmshH6pyLg4p2OAWUZap1RwCGZjsn2xeFvIIdsk0O"
	            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
	            return "cURL Error #:" . $err;
            } else {
	            return $response;
            }
        }
        
    }
}
