<?php

namespace App\Models;

use CodeIgniter\Model;

class PerusahaanModel extends Model
{
    protected $table      = 'tbl_perusahaan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['logo', 'nama', 'alias', 'alamat', 'deskripsi', 'created_at'];
    protected $useAutoIncrement = true;
}
