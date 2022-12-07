<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBreedRequest;
use App\Http\Requests\UpdateBreedRequest;
use App\Models\Breed;
use App\Models\GuestCheckin;
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
        $breeds = Breed::all();
        return response()->json([
            'breeds' => $breeds
        ]);
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
        $breed=Breed::findOrFail($id);
        return response()->json([
            'breed' => $breed
        ]);    }

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
        $breed= Breed::findOrFail($id);
        $breed->name=$validated['name'];
        $breed->save();

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
    }
}
