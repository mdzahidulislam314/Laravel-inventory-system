<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'email', 'phone','address','city','account_name','account_no','bank_name','bank_branch'
    ];
}
