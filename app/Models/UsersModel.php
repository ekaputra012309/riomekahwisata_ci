<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'tbl_users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'fullname', 'email', 'pass', 'phone', 'photo', 'created_at'];
    protected $useAutoIncrement = true;
}
