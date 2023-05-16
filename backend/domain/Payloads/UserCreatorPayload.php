<?php

namespace Domain\Payloads;

interface UserCreatorPayload
{
    public function name(): string;
    public function username(): string;
    public function email(): string;
    public function street(): string;
    public function suite(): string;
    public function city(): string;
    public function zipcode(): string;
    public function lat(): string;
    public function lng(): string;
    public function phone(): string;
    public function website(): string;
    public function company(): string;
    public function catchPhrase(): string;
    public function bs(): string;
}
