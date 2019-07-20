<?php
namespace App\Http\Services;
 
class APIHelper
{
 
    public function post($body,$apiStr)
    {
       

        $client = new \GuzzleHttp\Client(['base_uri' => 'https://www.shikongmall.com/mobile/user.php?act=do_promoters_reward_code']);
        $res = $client->request('POST', $apiStr,
            ['form_params' =>$body,
        ]);
        $data = $res->getBody()->getContents();
        return $data;
    }
    public function post1($body,$apiStr)
    {
       

        $client = new \GuzzleHttp\Client(['base_uri' => 'https://iosapp.shikongmall.com/skgi/sksinterface.php']);
        $res = $client->request('POST', $apiStr,
            ['form_params' =>$body,
        ]);
        $data = $res->getBody()->getContents();
        return $data;
    }
    public function get($apiStr,$header)
    {
        $client = new \GuzzleHttp\Client(['base_uri' => 'http://192.168.31.XX:xxx/api/']);
        $res = $client->request('GET', $apiStr,['headers' => $header]);
        $statusCode= $res->getStatusCode();
 
        $header= $res->getHeader('content-type');
 
        $data = $res->getBody();
 
        return $data;
    }
}