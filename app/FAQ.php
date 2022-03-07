<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = 'faq';
    public $incrementing = true;
    public $timestamps = true;
}
