<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
  const TYPE_GUIDE = 'Marking guide';
  const TYPE_SUBMISSION = 'Submission';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'paper_type',
    ];

    public function questions(){
      return $this->hasMany(Question::class);
    }

    public function paperStudent(){
      return $this->hasMany(PaperStudent::class);
    }
}
