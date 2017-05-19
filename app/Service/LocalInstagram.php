<?php

namespace App\Service;

class LocalInstagram
{
    private $access_token;
    private $base_url = "https://api.instagram.com/v1/users/self/media/recent?";

    /**
     * LocalInstagram constructor.
     */
    public function __construct()
    {
        $this->access_token = env('INSTAGRAM_ACCESSTOKEN');
    }

    public function getAllColumn(){
        $query = [
            "access_token" => $this->access_token,
            "count" => 100
        ];
        $response = file_get_contents(
            $this->base_url.
            http_build_query($query)
        );

        return json_decode($response);

    }

}