<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotebookStoreRequest;
use App\Http\Requests\NotebookUpdateRequest;
use App\Http\Resources\NotebookResource;
use App\Models\Notebook;
use Illuminate\Http\Response;

class NotebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Notebook::all();
        return NotebookResource::collection(Notebook::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotebookStoreRequest $request)
    {
        $created_notebook = Notebook::create($request->validated());
        
        return new NotebookResource($created_notebook);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Notebook $notebook)
    {
        // return Notebook::find($id);
        return new NotebookResource($notebook);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NotebookUpdateRequest $request, Notebook $notebook)
    {
        $notebook->update($request->validated());

        return new NotebookResource($notebook);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notebook $notebook)
    {
        $notebook->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
