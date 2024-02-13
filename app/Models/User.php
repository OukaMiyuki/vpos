<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\DetailUser;
use App\Models\InvitationCode;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'phone',
        'photo',
        'type',
        'is_active',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function detailUser(){
        return $this->hasOne(DetailUser::class, 'id_user', 'id');
    }

    public function invitationCode(){
        return $this->hasMany(InvitationCode::class, 'id_marketing', 'id');
    }

    protected function type(): Attribute {
        return new Attribute(
            get: fn ($value) =>  ["super_admin", "marketing"][$value],
        );
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }    

    public function detailUserStore($model){
        $DetailUser = new DetailUser();
        $DetailUser->id_user = $model->id;
        $DetailUser->nama_lengkap = request()->nama_lengkap;
        $DetailUser->no_ktp = request()->no_ktp;
        $DetailUser->tempat_lahir = request()->tempat_lahir;
        $DetailUser->tanggal_lahir = request()->tanggal_lahir;
        $DetailUser->jenis_kelamin = request()->jenis_kelamin;
        $DetailUser->alamat = request()->alamat;
        $DetailUser->save();
    }
}
