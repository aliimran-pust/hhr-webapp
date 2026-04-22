<?php

namespace AI\Auth\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays or serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \AI\Auth\Database\Factories\UserFactory::new();
    }

    public function isAdmin()
    {
        return $this->email == 'aliimran.pust@gmail.com';
    }

    /**
     * Get the item create time.
     *
     * @param  timestamp  $value
     * @return date
     */
    public function getCreatedAtAttribute($value)
    {
        return date('Y-m-d', strtotime("$value"));
    }

    /**
     * Get the item update time.
     *
     * @param  timestamp  $value
     * @return date
     */
    public function getUpdatedAtAttribute($value)
    {
        return date('Y-m-d', strtotime("$value"));
    }
}
