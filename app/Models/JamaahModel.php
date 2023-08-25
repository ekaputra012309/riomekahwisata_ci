<?php
namespace App\Models;

use CodeIgniter\Model;

class JamaahModel extends Model{
    protected $table = 'tbl_jamaah';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama_lengkap', 'nomor_ktp', 'tempat', 'tgl_lahir', 'umur', 'kewarganegaraan',
        'alamat', 'provinsi', 'kota', 'kecamatan', 'desa', 'kode_pos', 'handphone',
        'email', 'pendidikan', 'pekerjaan', 'no_passport', 'tgl_dikeluarkan',
        'tempat_dikeluarkan', 'masa_berlaku', 'nama_marham', 'hub_marham',
        'status', 'gol_darah', 'baju', 'photo', 'create_at'
    ];
    protected $useAutoIncrement = true;
    protected $dateFormat = 'date';
    protected $createdField = 'create_at';
}