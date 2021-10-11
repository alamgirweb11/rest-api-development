<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{ 
    use SoftDeletes;

    protected $table = 'students';

    protected $fillable = [
           'student_class_id',
           'section_id',
           'name',
           'phone',
           'email',
           'password',
           'photo',
           'gender',
    ];
}
