<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account_info extends Model
{
    protected $fillable = [
        'account',
        'name',
        'gender',
        'birth',
        'email',
        'remark',
    ];
    public $timestamps = false;

    protected $table = 'account_info';

    use HasFactory;
}
