<?php


class User extends AbstractEntity {

    /**
     * Factory design Methods
     */
    public static function createUser($username, $password) {
        $user = new User();

        self::storeUser($user);

        return $user;
    }

    public static function getUser($user_id) {
        // Go into the db, get user info, fill a new object, return.
        $user = new User($user_id);
        return $user;
    }

    private static function storeUser(User $user) {
        // Store a user
        return $user;
    }

    public static function updateUser(User $user) {
        // Update a user
        return $user;
    }

    /**
     * Object Properties
     */
    private $cart;
    private $password;

    /**
     * Object Methods
     */
    private function __construct() {
        $this->loadCart();
    }

    public function setUsername($username) {
        $this->setName($username);
    }

    public function getUsername() {
        return $this->getName();
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    private function getPassword() {
        return $this->password;
    }

    /**
     * @param $username
     * @param $password
     * @return bool, true if correct login, false otherwise
     */
    public function doLogin($username, $password) {
        // Check login a user?

        return false;
    }

    public function doLogout() {

    }

    private function loadCart() {
        // Load this users cart.
        $this->cart = Cart::retrieveCart($cart_id, $this->$user_id);

    }

    public function getCart() {
        if (!isset($this->cart)) $this->loadCart();
        return $this->cart;
    }

} 