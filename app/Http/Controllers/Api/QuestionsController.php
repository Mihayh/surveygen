<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Transformers\QuestionTransformer;
use App\Http\Controllers\Api\ApiController;

class QuestionsController extends ApiController
{

    protected $question;

    protected $questionTransfomer;

    public function __construct(\App\Models\Question $question, QuestionTransformer $questionTransfomer)
    {
        $this->question = $question;
        $this->questionTransfomer = $questionTransfomer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($survey_id)
    {
        $questions = \App\Models\Survey::find($survey_id)->questions;

        return $this->respond($this->questionTransfomer->transformCollection($questions->all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $survey_id)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($survey_id, $question_id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $survey_id, $question_id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($survey_id, $question_id)
    {
        $question = \App\Models\Question::find($question_id);
        $question->delete();

        return $this->respondDeleted();
    }
}
