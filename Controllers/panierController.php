<?php
if(!isset($_SESSION)) {
    session_start();
}

class panierController
{
    public function addToCart($item): void
    {
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
        $cart[] = $item;
        setcookie('cart', json_encode($cart), time() + (86400 * 30), "/", "", false, true); // 30 days expiration, httponly
    }

    public function getCart()
    {
        return isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
    }

    public function removeFromCart($index): void
    {
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
        if (isset($cart[$index])) {
            unset($cart[$index]);
            $cart = array_values($cart); // Reindex the array
            setcookie('cart', json_encode($cart), time() + (86400 * 30), "/", "", false, true);
        }
    }

    public function updateQuantity($index, $quantity): void
    {
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
        if (isset($cart[$index])) {
            if ($quantity > 0){
                $cart[$index]['quantity'] = $quantity;
            }
            else{
                removeFromCart($index);
            }
            setcookie('cart', json_encode($cart), time() + (86400 * 30), "/", "", false, true);
        }
    }

    public function clearCart(): void
    {
        setcookie('cart', '', time() - 3600, "/", "", false, true); // Expire the cookie
    }
}