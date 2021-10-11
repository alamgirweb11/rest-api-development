<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
     protected $table = 'sections';

     protected $fillable = [
            'student_class_id',
            'section_name',
     ];

     public function school(){
          return $this->hasOne(StudentClass::class, 'id', 'student_class_id');
     }
}
