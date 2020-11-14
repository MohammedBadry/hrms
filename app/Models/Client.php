<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    public function getName() {
        return json_decode($this->name);
    }

    public function getCompany() {
        return json_decode($this->company);
    }

    public function getAddress() {
        return json_decode($this->address);
    }
}
