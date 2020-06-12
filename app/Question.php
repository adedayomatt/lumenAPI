<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Question extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_no',
        'answer',
        'subject_id',
        'paper_id',
    ];

    public static function answers(){
        $guide = Paper::where('paper_type', Paper::TYPE_SUBMISSION)->firstorfail();
        return Question::where('paper_id', $guide->id)->get();
    }

    public static function guides(){
        $guide = Paper::where('paper_type', Paper::TYPE_GUIDE)->firstorfail();
        return Question::where('paper_id', $guide->id)->get();
    }
    
    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function paper(){
        return $this->belongsTo(Paper::class);
    }

    public function getIsAnswerCorrectAttribute(){
        $guide_paper = Paper::where('paper_type', Paper::TYPE_GUIDE)->firstorfail();

        $guide = Question::where([['paper_id', $guide_paper->id], ['question_no', $this->question_no]])->first();
        if(!$guide) return false;

        return $this->answer == $guide->answer ? true : false;
    }

}
