<?php

namespace App\Http\Requests\Users;

use Illuminate\Http\Request;
use Domain\Payloads\UserCreatorPayload;

class UserCreatorRequest implements UserCreatorPayload
{
    private const NAME = 'name';
    private const USERNAME = 'username';
    private const EMAIL = 'email';
    private const STREET = 'street';
    private const SUITE = 'suite';
    private const CITY = 'city';
    private const ZIP_CODE = 'zipcode';
    private const LAT = 'lat';
    private const LNG = 'lng';
    private const PHONE = 'phone';
    private const WEB_SITE = 'website';
    private const COMPANY = 'company';
    private const CATCH_PHRASE = 'catchPhrase';
    private const BS = 'bs';

    public function __construct(private Request $request)
    {
        $this->validate();
    }
    
    public function name(): string { return $this->request->input(self::NAME); }
    public function username(): string { return $this->request->input(self::USERNAME); }
    public function email(): string { return $this->request->input(self::EMAIL); }
    public function street(): string { return $this->request->input(self::STREET); }
    public function suite(): string { return $this->request->input(self::SUITE); }
    public function city(): string { return $this->request->input(self::CITY); }
    public function zipcode(): string { return $this->request->input(self::ZIP_CODE); }
    public function lat(): string { return $this->request->input(self::LAT); }
    public function lng(): string { return $this->request->input(self::LNG); }
    public function phone(): string { return $this->request->input(self::PHONE); }
    public function website(): string { return $this->request->input(self::WEB_SITE); }
    public function company(): string { return $this->request->input(self::COMPANY); }
    public function catchPhrase(): string { return $this->request->input(self::CATCH_PHRASE); }
    public function bs(): string { return $this->request->input(self::BS); }

    private function validate()
    {
        $this->request->validate([
            self::NAME => ['required'],
            self::USERNAME => ['required'],
            self::EMAIL => ['required', 'email'],
            self::STREET => ['required'],
            self::SUITE => ['required'],
            self::CITY => ['required'],
            self::ZIP_CODE => ['required'],
            self::LAT => ['required'],
            self::LNG => ['required'],
            self::PHONE => ['required'],
            self::WEB_SITE => ['required', 'url'],
            self::COMPANY => ['required'],
            self::CATCH_PHRASE => ['required'],
            self::BS => ['required'],
        ]);
    }
}
