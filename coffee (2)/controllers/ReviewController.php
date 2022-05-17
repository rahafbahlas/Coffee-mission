<?php
class ReviewController
{
    public static function create($form_data)
    {
        $shop_id = intval($form_data['shop_id']);
        $shop = Shop::find($shop_id);
        if ($shop == null) {
            Util::go('index.php');
        } else {
            $user_id = $_SESSION['id'];
            $review_text = $form_data['review_text'];
            $rating = $form_data['rating'];
            $query = "INSERT INTO shop_reviews (shop_id,user_id,review_text,rating) VALUES ($shop_id,$user_id,'$review_text',$rating)";
            if (DB::get_db()->executeUpdate($query)) {
                $query_string = ['msg' => 'Review posted successfully', 'msg_type' => 'success', 'id' => $shop_id];
            } else {
                $query_string = ['msg' => 'Failed to post review', 'msg_type' => 'error', 'id' => $shop_id];
            }
            Util::go('postReview.php?' . http_build_query($query_string));
        }
    }
}
