<?php
class Shop
{

    public static function create(string $name, int $branches, string $from_hour, string $to_hour, string $profile_img)
    {
        $query = "INSERT INTO shops (name,branches,from_hour,to_hour,profile_img)
        VALUES ('$name',$branches,'$from_hour','$to_hour','$profile_img')";
        return DB::get_db()->executeUpdate($query);
    }

    public static function remove(int $id)
    {
        $query = "DELETE FROM shops WHERE id=$id";
        return DB::get_db()->executeUpdate($query);
    }

    public static function update(int $id, string $name, int $branches, string $from_hour, string $to_hour, string $profile_img)
    {
        $query = "UPDATE shops SET name='$name',branches=$branches,from_hour='$from_hour',to_hour='$to_hour',profile_img='$profile_img' WHERE id=$id";
        return DB::get_db()->executeUpdate($query);
    }

    public static function get_all()
    {
        $query = "SELECT * FROM shops";
        $result = DB::get_db()->execute($query);
        $shops = [];
        while ($shop = $result->fetch_assoc()) {
            $shops[] = $shop;
        }
        return $shops;
    }

    public static function find(int $id)
    {
        $query = "SELECT * FROM shops WHERE id=$id";
        $result = DB::get_db()->execute($query);
        $shop = null;
        if ($result->num_rows > 0) {
            $shop = $result->fetch_assoc();
        }
        return $shop;
    }

    public static function get_top_rated()
    {
        $query = "SELECT shops.id,shops.name,shops.branches,shops.from_hour,shops.to_hour,shops.profile_img, AVG(rating) as rating, count(rating) as reviews FROM shop_reviews inner join shops on shops.id=shop_id group by shop_id order by rating DESC,reviews DESC";
        $result = DB::get_db()->execute($query);
        $shops = [];
        while ($shop = $result->fetch_assoc()) {
            $shops[] = $shop;
        }
        return $shops;
    }


    public static function get_reviews(int $shop_id)
    {
        $query = "SELECT sr.id,concat(u.firstname,' ',u.lastname) as name,sr.review_text,sr.rating FROM shop_reviews as sr inner join users as u on sr.user_id=u.id WHERE sr.shop_id=$shop_id order by sr.id DESC";
        $result = DB::get_db()->execute($query);
        $reviews = [];
        while ($review = $result->fetch_assoc()) {
            $reviews[] = $review;
        }
        return $reviews;
    }
}
