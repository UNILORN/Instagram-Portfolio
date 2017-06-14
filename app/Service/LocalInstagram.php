<?php

namespace App\Service;


use App\Model\Image;
use App\Model\Instagram;

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
        $instagram_data = [];
        $image_data = [];
        foreach ($instagram->data as $image) {

            if(is_null(Instagram::find($image->id))) {
                $instagram_data[] = [
                    "id" => $image->id,
                    "title" => !empty($image->caption) ? $image->caption->text : "",
                    "url" => $image->link,
                ];
            }

            // 画像が複数存在する場合
            if (!empty($image->carousel_media)) {
                foreach ($image->carousel_media as $multi_image) {
                    if(empty(Image::where("url",$multi_image->images->standard_resolution->url)->get()->toArray())){
                        $image_data[]=[
                            "url" => $multi_image->images->standard_resolution->url,
                            "instagram_id" => $image->id,
                            "created"=>date("Y-m-d H:i:00",$image->created_time),
                            "link"=>$image->link
                        ];
                    }

                }
            } else {
                // 画像が一つの場合
                if(empty(Image::where("url",$image->images->standard_resolution->url)->get()->toArray())) {
                    $image_data[] = [
                        "url" => $image->images->standard_resolution->url,
                        "instagram_id" => $image->id,
                        "created"=>date("Y-m-d H:i:00",$image->created_time),
                        "link"=>$image->link
                    ];
                }
            }
        }
        $result = [];
        if(!empty($instagram_data)){
            Instagram::insert($instagram_data);
        }
        else{
            $result[]="Instagram_data 変更なし";
        }
        if (!empty($image_data)) {
            Image::insert($image_data);
        }
        else{
            $result[]="Image_data 変更なし";
        }

        return $result;
    }
}