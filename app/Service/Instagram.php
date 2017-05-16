<?php

namespace App\Service;

class Instagram
{

    private $base_url = "https://api.instagram.com/v1/users/self/media/recent";
    private $access_token = "";

    public function __construct()
    {
        $this->access_token = env("INSTAGRAM_ID");
    }

    /**
     * @param array $data
     * @see Instagram APIより画像情報
     */
    public function getAllColumn(array $data)
    {
        $query = [
            $this->access_token,

        ];
        $response = file_get_contents(
            $this->base_url.
            http_build_query($query)
        );
    }
}