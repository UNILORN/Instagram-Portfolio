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

    public function getAllColumn()
    {
        $query = [
            "access_token" => $this->access_token,
            "count" => 100
        ];
        $response = file_get_contents(
            $this->base_url .
            http_build_query($query)
        );

        return json_decode($response);

    }

    public function putAllColumn()
    {
        $instagram = $this->getAllColumn();
        foreach ($instagram->data as $image) {

            // 画像が複数存在する場合
            if (!empty($image->carousel_media)) {
                foreach ($image->carousel_media as $multi_image) {
                    echo $multi_image->images->standard_resolution->url;
                }
            } else {
                // 画像が一つの場合
                echo $image->images->standard_resolution->url;
            }
        }
    }
}