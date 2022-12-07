<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBreedRequest;
use App\Http\Requests\UpdateBreedRequest;
use App\Http\Resources\BreedResource;
use App\Models\Breed;
use App\Http\Resources\BreedCollection;
use Illuminate\Http\Request;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new BreedCollection(Breed::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreBreedRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBreedRequest $request)
    {
        $validated = $request->validated();
        Breed::create(['name' => $validated['name']]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new BreedResource(Breed::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateBreedRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBreedRequest $request, $id)
    {
        $validated = $request->validated();
        $breed = Breed::findOrFail($id);
        $breed->name = $validated['name'];
        $breed->save();
        return new BreedResource($breed->fresh());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Breed::destroy($id);
        return response()->json([
            'data' => "Successfully deleted ${id}",
        ], 200);
    }
}
