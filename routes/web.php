<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
//
//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});



//Paper Route
$router->get('/papers', 'PaperController@index');
$router->get('/papers/{id}', 'PaperController@show');
$router->post('/papers', 'PaperController@store');
$router->put('/papers/{id}', 'PaperController@update');
$router->patch('/papers/{id}', 'PaperController@update');
$router->delete('/papers/{id}', 'PaperController@delete');


//PaperStudent Route
$router->get('/paperStudents', 'PaperStudentController@index');
$router->get('/paperStudents/{id}', 'PaperStudentController@getStudentResult');
$router->get('/paperStudents/{id}', 'PaperStudentController@getMarkingGuide');
$router->post('/paperStudents/', 'PaperStudentController@storeStudentSubmission');
$router->patch('/paperStudents/{id}', 'PaperStudentController@markStudentPaper');
$router->delete('/paperStudents/{id}', 'PaperStudentController@deleteStudentResult');


//PaperType Route
$router->get('/paperTypes', 'PaperTypeController@index');
$router->get('/paperTypes/{id}', 'PaperTypeController@show');
$router->post('/paperTypes', 'PaperTypeController@store');
$router->put('/paperType/{id}', 'PaperTypeController@update');
$router->patch('/paperType/{id}', 'PaperTypeController@update');
$router->delete('/paperType/{id}', 'PaperTypeController@delete');


//Question
$router->get('/questions', 'QuestionController@index');
$router->get('/questions/{id}', 'QuestionController@show');
$router->post('/questions', 'QuestionController@store');
$router->put('/questions/{id}', 'QuestionController@update');
$router->patch('/questions/{id}', 'QuestionController@update');
$router->delete('/questions/{id}', 'QuestionController@delete');



//Status Route
$router->get('/statuses', 'StatusController@index');
$router->get('/statuses/{id}', 'StatusController@show');
$router->post('/statuses', 'StatusController@store');
$router->put('/statuses/{id}', 'StatusController@update');
$router->patch('/statuses/{id}', 'StatusController@update');
$router->delete('/statuses/{id}', 'StatusController@delete');



//Student Route
$router->get('/students', 'StudentController@index');
$router->get('/students/{id}', 'StudentController@show');
$router->post('/students', 'StudentController@store');
$router->put('/students/{id}', 'StudentController@update');
$router->patch('/students/{id}', 'StudentController@update');
$router->delete('/students/{id}', 'StudentController@delete');


//Subject Route
$router->get('/subjects', 'SubjectController@index');
$router->get('/subjects/{id}', 'SubjectController@show');
$router->post('/subjects', 'SubjectController@store');
$router->put('/subjects/{id}', 'SubjectController@update');
$router->patch('/subjects/{id}', 'SubjectController@update');
$router->delete('/subjects/{id}', 'SubjectController@delete');


/*********Adeadyo Matthews Code************* */
$router->get('/guides', 'PaperStudentController@markingGuides');
$router->get('/submissions', 'PaperStudentController@submissions');
$router->get('/mark', 'PaperStudentController@markSubmissions');
