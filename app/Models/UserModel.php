<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'full_name', 'email', 'created_at'];

    public function getDemoUser()
    {
        return $this->first();
    }
}