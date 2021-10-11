<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
     protected $table = 'sections';

     protected $fillable = [
            'student_school_id',
            'section_name',
     ];
}
