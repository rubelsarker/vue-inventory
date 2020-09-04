<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name','email','address','nid_number','joining_date','salary','photo'];
}
