<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPHtmlParser\Dom;

class Grabber extends Controller
{
    public static function grab($keyword, $options = [])
    {
        $url = "https://www.google.com/search?q=" . urlencode($keyword) . "&source=lnms&tbm=isch&tbs=";
        $ua = \Campo\UserAgent::random([
            'os_type' => ['Windows', 'OS X'],
            'device_type' => 'Desktop'
        ]);
        $options  = [
            'http' => [
                'method'     =>"GET",
                // 'proxy' => 'tcp://192.168.0.2:3128',
                'user_agent' =>  $ua,
            ],
            'ssl' => [
                "verify_peer"      => FALSE,
                "verify_peer_name" => FALSE,
            ],
        ];
        $context  = stream_context_create($options);
        $response = file_get_contents($url, FALSE, $context);
        $htmldom = new Dom;
        $htmldom->loadStr($response, []);
        $results = [];

        foreach ($htmldom->find('.rg_di > .rg_meta') as $n => $dataset) {
            $data = json_decode($dataset->text);
            $results[$n]['keyword'] = $keyword;
            $results[$n]['title'] = title_case(str_replace('-', ' ', str_slug($data->pt)));
            $results[$n]['alt'] = str_replace('-', ' ', str_slug($data->s));
            $results[$n]['url'] = $data->ou;
            $results[$n]['filetype'] = $data->ity;
            $results[$n]['width'] = $data->ow;
            $results[$n]['height'] = $data->oh;
            $results[$n]['source'] = $data->ru;
        }
        return $results;
    }
}
