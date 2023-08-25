<?php
namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model{
    protected $table      = 'tbl_paket';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kategori', 'nama_paket', 'create_at'];
    protected $useAutoIncrement = true; 
    protected $createdField = 'create_at';
}