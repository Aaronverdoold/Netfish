<?php

declare(strict_types=1);

namespace Domain;

class User
{
    public $id;
    public $username;
    public $email;
    public $password;
    public $is_admin;

    public function __construct($id, $username, $email, $password, $is_admin)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->is_admin = $is_admin;
    }

}
