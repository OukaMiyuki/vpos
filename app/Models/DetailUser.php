<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class DetailUser extends Model {
    use HasFactory;

    protected $fillable = [
        'id_user',
        'nama_lengkap',
        'no_ktp',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
