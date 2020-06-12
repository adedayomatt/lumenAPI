<?php

use App\Paper;
use App\PaperStudent;
use App\PaperType;
use App\Question;
use App\Status;
use App\Student;
use App\Subject;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paperTypes = [Paper::TYPE_GUIDE, Paper::TYPE_SUBMISSION];
        foreach ($paperTypes as $type) {
            Paper::create([
                'paper_type' => $type
            ]);
        }

        factory(Subject::class,10)->create();
        factory(Question::class,10)->create();
        factory(Student::class,10)->create();
        // factory(PaperStudent::class,10)->create();

    }
}
