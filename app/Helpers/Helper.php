<?php


namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Helper
{

    public static function sendSMS($mobile = '', $text) {

        $url = "http://bulksmsbd.net/api/smsapi";
        $post_string = array(
            'api_key' => 'WzfqHbxCkgr2XAfUqw5h',
            'message' => $text,
            'number' => '88'.$mobile,
            'senderid' => '8809617624795'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_exec($ch);

        $response['curl_http_code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $response;
    }

    public static function sendSMSBulk($mobile = '', $text) {
        $url = "http://bulksmsbd.net/api/smsapi";
        $post_string = array(
            'api_key' => 'WzfqHbxCkgr2XAfUqw5h',
            'message' => $text,
            'number' => $mobile,
            'senderid' => '8809617624795'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_exec($ch);

        $response['curl_http_code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $response;
    }

}
