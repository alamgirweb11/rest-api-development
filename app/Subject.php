<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $fillable = [
          'student_class_id',
          'subject_name',
          'subject_code',
    ];
}
