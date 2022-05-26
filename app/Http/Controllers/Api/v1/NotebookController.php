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
     *     summary="Display all Notebooks. 10 items per page",
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
     *         description="Everything is fine",
     *         )
     *     ),
     * )
     *
     * Display a listing of the notebook.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        
        /*
        // without pagination.
        return NotebookResource::collection(Notebook::all());
        */

        // pagination. 10 item per page.
        return NotebookResource::collection(Notebook::paginate(10));
        
    }

    /**
     * @OA\Post(
     *     path="/notebook",
     *     operationId="notebookCreate",
     *     tags={"Notebook"},
     *     summary="Create yet another notebook",
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *     ),
     * )
     * Store a newly created notebook in storage.
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
     *         description="Everything is fine",
     *         )
     *     ),
     * )
     *
     * Display notebook by id.
     *
     * @return \Illuminate\Http\JsonResponse
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
     *         response="202",
     *         description="Note deleted",
     *         )
     *     ),
     * )
     *
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
