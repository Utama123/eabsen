<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
   public function loginKaryawan($username,$password)
   {
    return $this->db->table('tbl_karyawan')
    ->join('tbl_jabatan','tbl_jabatan.id_jabatan=tbl_karyawan.id_jabatan','LEFT')
    ->where([
        'username' => $username,
        'password' => $password,
    ])->get()->getRowArray();
   }
}
