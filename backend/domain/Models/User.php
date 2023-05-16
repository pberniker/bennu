<?php

namespace Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Domanin\Payload\UserUpdatorPayload;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'street',
        'suite',
        'city',
        'zipcode',
        'lat',
        'lng',
        'phone',
        'website',
        'company',
        'catch_phrase',
        'bs',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    public function address(): array
    {
        return [
            'street' => $this->street,
            'suite' => $this->suite,
            'city' => $this->city,
            'zipcode' => $this->zip_code,
            'geo' => $this->geo(),
        ];
    }    

    public function company(): array
    {
        return [
            'name' => $this->company,
            'catchPhrase' => $this->catch_phrase,
            'bs' => $this->bs,
        ];
    }    

    private function geo(): array
    {
        return [
            'lat' => $this->lat,
            'lng' => $this->lng,
        ];
    }
}
