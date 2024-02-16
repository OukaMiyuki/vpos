<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class InvitationCode extends Model {
    use HasFactory;

    protected $fillable = [
        'id_marketing',
        'holder_name',
        'code',
        'attempt',
        'is_active',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_marketing', 'id');
    }

    protected $casts = [
        'created_at' => 'datetime:d/m/Y', // Change your format
        'updated_at' => 'datetime:d/m/Y',
    ];
}
