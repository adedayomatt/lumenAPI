<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaperStudent extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'paper_id',
        'marked',
        'score',
    ];

    public function student() {
        return $this->belongsTo(Student::class);
    }

}
