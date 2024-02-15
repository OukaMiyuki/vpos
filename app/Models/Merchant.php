<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\InvitationCode;
use App\Models\User;

class Merchant extends Model {
    use HasFactory;

    public function invitationCode(){
        return $this->belongsTo(InvitationCode::class, 'inv_code', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_tenant', 'id');
    }
}
