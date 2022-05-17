<?php
class Review
{

    public static function create(int $shop_id, int $user_id, string $review_text, int $rating = 0)
    {
        $query = "INSERT INTO shop_reviews (shop_id,user_id,review_text,rating)
        VALUES ($shop_id,$user_id,'$review_text',$rating)";
        return DB::get_db()->executeUpdate($query);
    }

    public static function find(int $id)
    {
        $query = "SELECT * FROM shop_reviews WHERE id=$id";
        $result = DB::get_db()->execute($query);
        $review = null;
        if ($result->num_rows > 0) {
            $review = $result->fetch_assoc();
        }
        return $review;
    }

    public static function count(int $shop_id)
    {
        $query = "SELECT count(*) as total FROM shop_reviews WHERE shop_id=$shop_id";
        $result = DB::get_db()->execute($query);
        $count = $result->fetch_assoc()['total'];
        return $count;
    }

    public static function get_all(int $shop_id)
    {
        $query = "SELECT * FROM shop_reviews WHERE shop_id=$shop_id";
        $result = DB::get_db()->execute($query);
        $shops = [];
        while ($shop = $result->fetch_assoc()) {
            $shops[] = $shop;
        }
        return $shops;
    }
}
