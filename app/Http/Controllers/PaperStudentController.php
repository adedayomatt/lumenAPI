<?php

namespace App\Http\Controllers;

use App\Paper;
use App\Question;
use App\PaperStudent;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;


class PaperStudentController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return a list of paperStudent
     *
     * @return Illuminate\Http\Response
     */
    public function index(){
        $paperStudents = PaperStudent::all();
        return  $this->successResponse($paperStudents);
    }
    /**
     * create a specific marking guide
     *
     * @return Illuminate\Http\Response
     */

    public function  getMarkingGuide($id){
        $paperStudent= Paper::findorfail($id);
        return  $this->successResponse($paperStudent);
    }

    /**
     * store a student submission
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request){
        $rules=[
            'student_id'=> 'required|min:1',
            'paper_id'=> 'required|min:1',
        ];
        $this->validate($request,$rules);
        $paper = PaperStudent::create($request->all());
        return  $this->successResponse($paper, Response::HTTP_CREATED);
    }
    public function getStudentSubmission( $id){
        $studentSubmission = PaperStudent::findorfail($id);
        return  $this->successResponse($studentSubmission );



    }

    /**
     * mark script
     *
     * @return Illuminate\Http\Response
     */

    public function markStudentPaper(){

        $submission= $this->getStudentSubmission();
        $guide= $this->getMarkingGuide();
        if($submission){
            $result['answered'] = count($submission['questions']);
            $result['score'] =  count(array_intersect($guide['answer'], $submission['answer']));
            $result['marked'] = 1;
        }else{
            $result['answered'] = 0;
            $result['score'] =  0;
            $result['marked'] = 0;
        }
        $result['percentage'] = ($result['score']/$result['total_questions'])*100;
        $submission->save();
        $guide->save();
        return  $this->successResponse($guide, Response::HTTP_CREATED);



    }

    public function deleteStudentResult($id){
        $paper= PaperStudent::findorfail($id);
        $paper->delete();
        return $this->successResponse($id);

    }



    /**********************Adedayo Matthews Codes here*************************** */

    public function markingGuides(){
        return $this->successResponse($this->getQuestions(Paper::TYPE_GUIDE)); 
    }

    public function submissions(){
        return $this->successResponse($this->getQuestions(Paper::TYPE_SUBMISSION)); 
    }

    public function markSubmissions(){
        /**
         * 
         * I don't know which student to mark and record for because student id is not specified for answers on the questions table (where you said answers are also stored) 
         * I also don't get where there is question_id on the paper_students student if you are using the table to record scores
         *
         * */ 
        return $this->successResponse($this->mark($student_id = 1, $question_id = 1)); 
    }




    /**
     * Get marking guides or submissions. Specify which with the $type.
     * 
     * @param String $type
     * 
     * @return Collection
     */
    private function getQuestions($type){
        return Paper::where('paper_type', $type)->firstorfail()->questions;
    }

    private function mark($student_id, $question_id){
        $paper = Paper::where('paper_type', Paper::TYPE_SUBMISSION)->firstorfail();
        $guides =  $this->getQuestions(Paper::TYPE_GUIDE);
        $submissions =  $this->getQuestions(Paper::TYPE_SUBMISSION);
        $correct = 0;

        foreach($submissions as $submission){
            if($submission->is_answer_correct){
                $correct++;
            }
        }
        $score = ($correct/$guides->count())*100;
 
        return  $paper->paperStudent()->create([
            'student_id' => $student_id, //which student???
            'question_id' => $question_id, // How come questions???
            'marked' => true,
            'score' => $score
        ]);
     }
}
