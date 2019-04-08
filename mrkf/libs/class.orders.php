<?php
class ORDERS
{
    public static function getOrderID()
    {


        if(isset($_COOKIE['orderID']))
            return $_COOKIE['orderID'];

        $orderID = DB::GetOne("CALL sp_add_orders_without_user()");
        setcookie('orderID',$orderID,(time() + (30 * 24 * 60 * 60)), '/');
        return $orderID;

    }
    public static function removeItemFromCart($productID)
    {
        $orderID = SELF::getOrderID();
        $query = "CALL sp_order_details_remove_item($orderID, $productID)";
        return DB::Execute($query);
    }
    public static function getCart()
    {
        $orderID = SELF::getOrderID();
        return DB::GetAll("CALL sp_select_cart_by_orderID($orderID)");

    }
    public static function addItemToCart($productID, $count, $size, $model)
    {
        $orderID = SELF::getOrderID();
        $query = "CALL sp_order_details_insert($orderID, $productID, $count,'$size','$model')";
        return  DB::Execute($query);

    }
}
?>