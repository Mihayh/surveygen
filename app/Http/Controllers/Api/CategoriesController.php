<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoryRequest as CategoryRequest;
use App\Transformers\CategoryTransformer as CategoryTransformer;
use App\Http\Controllers\Api\ApiController;

class CategoriesController extends ApiController
{


    protected $category;

    protected $categoryTransformer;


    public function __construct(\App\Models\Category $category, CategoryTransformer $categoryTransformer)
    {
        
        $this->category = $category;
        $this->categoryTransformer = $categoryTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = \App\Models\Category::get();

        return $this->respond($this->categoryTransformer->transformCollection($categories->all()));
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
    public function store(CategoryRequest $request)
    {
        $category = \App\Models\Category::create($request->all());
        return \Response::json($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = \App\Models\Category::find($id);

        return Response::json($category);
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
    public function update(CategoryRequest $request, $id)
    {
        $category = App\Models\Category::find($id);
        $category->update($request->all());

        return \Response::json($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
