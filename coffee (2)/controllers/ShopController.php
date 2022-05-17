<?php

class ShopController
{
    public static function create(array $form_data, array $file_data)
    {

        $response = Util::uploadFile($file_data);
        $query_string = ["msg" => '', 'msg_type' => 'error'];
        if ($response['status'] == 1) {
            $form_data['profile_img'] = $response['newFileName'];
            if (Shop::create(
                $form_data['name'],
                $form_data['branches'],
                $form_data['from_hour'],
                $form_data['to_hour'],
                $form_data['profile_img']
            )) {
                $query_string['msg'] = "Shop successfully saved in database";
                $query_string['msg_type'] = 'success';
            } else {
                $query_string['msg'] = "Failed to save in database";
            }
        } else {
            $query_string['msg'] = $response['msg'];
        }

        Util::go('addShop.php?' . http_build_query($query_string));
    }

    public static function update($form_data, $file_data)
    {
        $response = null;
        $shop = Shop::find($form_data['shop_id']);
        if ($shop == null) {
            Util::go('index.php');
        }
        $profile = $shop['profile_img'];
        if ($file_data != null) {
            $response = Util::uploadFile($file_data);
            if ($response['status'] == 1) {
                unlink("assets/shop_images/$profile");
                $profile = $response['newFileName'];
            }
        }
        $query_string = ["msg" => 'Shop updated successfully', 'msg_type' => 'success', 'id' => $shop['id']];
        if (!Shop::update($shop['id'], $form_data['name'], $form_data['branches'], $form_data['from_hour'], $form_data['to_hour'], $profile)) {
            $query_string = ["msg" => 'Something went wrnog', 'msg_type' => 'error', 'id' => $shop['id']];
        }
        Util::go('editShop.php?' . http_build_query($query_string));
    }


    public static function delete($form_data)
    {
        $shop_id = $form_data['shop_id'];
        $shop = Shop::find($shop_id);
        if ($shop == null) {
            Util::go('shops.php');
        }
        $query_string = ["msg" => 'Shop removed successfully', 'msg_type' => 'success'];
        if (!Shop::remove($shop_id)) {
            $query_string = ["msg" => 'Something went wrnog', 'msg_type' => 'error'];
        } else {
            $profile = $shop['profile_img'];
            unlink("assets/shop_images/$profile");
        }
        Util::go('shops.php?' . http_build_query($query_string));
    }



    public static function get_all()
    {
        return Shop::get_all();
    }

    public static function get_top_rated_shops()
    {
        return Shop::get_top_rated();
    }
}
