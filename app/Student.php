<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Student extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function paperStudent() {
        return $this->hasMany(PaperStudent::class);
    }

    public function answers() {
        return $this->hasMany(Question::class, 'question_id');
    }


}
