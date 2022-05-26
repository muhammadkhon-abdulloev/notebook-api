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
     * @OA\Get(
     *     path="/notebook",
     *     operationId="notebookAll",
     *     tags={"Notebook"},
     *     summary="Display all Notebooks. 10 objects per page",
     *     @OA\Parameter(
     *          name="page",
     *          in="query",
     *          description="The page number.",
     *          example="4",
     *          required=false,
     *          @OA\Schema(
     *              type="integer",
     *          )
     *    ),
     *     @OA\Response(
     *         response="200",
     *         description="Successfully",
     *         ),
     * 
     *      @OA\Response(
     *         response="400",
     *         description="Bad request",
     *         ),
     *      
     *      @OA\Response(
     *         response="404",
     *         description="Notebook not found",
     *         ),     * 
     *      @OA\Response(
     *         response="405",
     *         description="Method not allowed",
     *         ),
     * 
     *      @OA\Response(
     *         response="500",
     *         description="Internal server error",
     *         ),
     * 
     *      @OA\Response(
     *         response="503",
     *         description="Service unavailable",
     *         )
     *     ),
     * )
     *
     * Display a listing of the notebook.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    // method index - shows all of the objects recived from the db. paginate datas by 10 objects per page
    public function index()
    {
        
        /*
        // without pagination.
        return NotebookResource::collection(Notebook::all());
        */

        // pagination. 10 objects per page.
        return NotebookResource::collection(Notebook::paginate(10));
        
    }

    /**
     * @OA\Post(
     *     path="/notebook",
     *     operationId="notebookCreate",
     *     tags={"Notebook"},
     *     summary="Create yet another notebook",
     *     @OA\Response(
     *         response="201",
     *         description="Note created successfully",
     *     ),
     * 
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/NotebookStoreRequest"),
     *     ),
     * 
     *      @OA\Response(
     *         response="400",
     *         description="Bad request",
     *         ),
     *      
     *      @OA\Response(
     *         response="404",
     *         description="Notebook not found",
     *         ),     * 
     *      @OA\Response(
     *         response="405",
     *         description="Method not allowed",
     *         ),
     * 
     *      @OA\Response(
     *         response="500",
     *         description="Internal server error",
     *         ),
     * 
     *      @OA\Response(
     *         response="503",
     *         description="Service unavailable",
     *         ),
     * )
     * Store a newly created notebook in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // method store - stores the newly created object to the db and returns the created object (Notebook)
    
    public function store(NotebookStoreRequest $request)
    {
        $created_notebook = Notebook::create($request->validated());
        
        return new NotebookResource($created_notebook);
    }

    /**
     * @OA\Get(
     *     path="/notebook/{id}",
     *     operationId="notebookByID",
     *     tags={"Notebook"},
     *     summary="Display Notebook by ID",
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="The id of the Notebook",
     *          required=true,
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *          )
     *    ),
     *     @OA\Response(
     *         response="200",
     *         description="Notebook founded successfully",
     *         ),
     * 
     *      @OA\Response(
     *         response="400",
     *         description="Bad request",
     *         ),
     *      
     *      @OA\Response(
     *         response="404",
     *         description="Notebook not found",
     *         ),     * 
     *      @OA\Response(
     *         response="405",
     *         description="Method not allowed",
     *         ),
     * 
     *      @OA\Response(
     *         response="500",
     *         description="Internal server error",
     *         ),
     * 
     *      @OA\Response(
     *         response="503",
     *         description="Service unavailable",
     *         )
     *     ),
     * )
     *
     * Display notebook by id.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    // method show - reads the object's fields from the db by id and returns the received fields
    public function show(Notebook $notebook)
    {
        // return Notebook::find($id);
        return new NotebookResource($notebook);
    }

    /**
     * @OA\Put(
     *     path="/notebook/{id}",
     *     operationId="notebookUpdate",
     *     tags={"Notebook"},
     *     summary="Create yet another notebook",
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="The id of the Notebook",
     *          required=true,
     *          example="1",
     *          @OA\Schema(
     *              type="integer",
     *          ),
     *      ),
     * 
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/NotebookStoreRequest"),
     *     ),
     *     @OA\Response(
     *         response="201",
     *         description="Note updated successfully",
     *     ),
     * 
     *      @OA\Response(
     *         response="400",
     *         description="Bad request",
     *         ),
     *      
     *      @OA\Response(
     *         response="404",
     *         description="Notebook not found",
     *         ),     * 
     *      @OA\Response(
     *         response="405",
     *         description="Method not allowed",
     *         ),
     * 
     *      @OA\Response(
     *         response="500",
     *         description="Internal server error",
     *         ),
     * 
     *      @OA\Response(
     *         response="503",
     *         description="Service unavailable",
     *         ),
     * )     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // method update - updates the object's received fields by id and returns the updated object
    public function update(NotebookUpdateRequest $request, Notebook $notebook)
    {
        $notebook->update($request->validated());

        return new NotebookResource($notebook);
    }

    /**
     * @OA\Delete(
     *     path="/notebook/{id}",
     *     operationId="deleteByID",
     *     tags={"Notebook"},
     *     summary="Delete Notebook by ID",
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="The id of the Notebook",
     *          required=true,
     *          example="5",
     *          @OA\Schema(
     *              type="integer",
     *          )
     *    ),
     *     @OA\Response(
     *         response="204",
     *         description="Note deleted",
     *         ),
     * 
     *      @OA\Response(
     *         response="400",
     *         description="Bad request",
     *         ),
     *      
     *      @OA\Response(
     *         response="404",
     *         description="Notebook not found",
     *         ),     * 
     *      @OA\Response(
     *         response="405",
     *         description="Method not allowed",
     *         ),
     * 
     *      @OA\Response(
     *         response="500",
     *         description="Internal server error",
     *         ),
     * 
     *      @OA\Response(
     *         response="503",
     *         description="Service unavailable",
     *         )
     *     ),
     * )
     *
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // method destroy - removes an object from the db by id and returns the http status code
    public function destroy(Notebook $notebook)
    {
        $notebook->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
