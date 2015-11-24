<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SurveyRequest as SurveyRequest;
use App\Transformers\SurveyTransformer as SurveyTransformer;
use App\Http\Controllers\Api\ApiController;

class SurveysController extends ApiController
{

    protected $survey;

    protected $SurveyTransformer;


    public function __construct(\App\Models\Survey $survey, SurveyTransformer $surveyTransformer)
    {
        $this->survey = $survey;
        $this->surveyTransformer = $surveyTransformer;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category_id)
    {
        $surveys = \App\Models\Category::find($category_id)->surveys;

        return $this->respond($this->surveyTransformer->transformCollection($surveys->all()));
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
    public function store(SurveyRequest $request)
    {
        $survey = \App\Models\Survey::create($request->all());

        return $this->respondCreated($this->surveyTransformer->transform($survey));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category_id, $survey_id)
    {
        $survey = \App\Models\Survey::find($survey_id);

        return $this->respond($this->surveyTransformer->transform($survey));
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
    public function update(SurveyRequest $request, $category_id, $survey_id)
    {
        $survey = \App\Models\Survey::find($survey_id);

        $survey->update($request->all());

        return $this->respondUpdated($this->surveyTransformer->transform($survey));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id, $id)
    {
        $survey = \App\Models\Survey::find($id);
        $survey->delete();

        return $this->respondDeleted();
    }
}
