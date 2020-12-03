<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Plant::all();
        return Inertia::render('plants', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [

            'name' => ['required'],
            'genus_name' => ['required'],
            'type' => ['required'],
            'height' => ['required'],
            'width' => ['required'],
            'description' => ['required'],

        ])->validate();

  

        Plant::create($request->all());

  

        return redirect()->back()->with('message', 'Plant Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Plant  $plant
     * @return Response
     */
    public function show(Plant $plant, $id)
    {
        return $plant::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Plant  $plant
     * @return Response
     */
    public function edit(Plant $plant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Plant  $plant
     * @return Response
     */
    public function update(Request $request, Plant $plant)
    {
        Validator::make($request->all(), [

            'name' => ['required'],
            'genus_name' => ['required'],
            'type' => ['required'],
            'height' => ['required'],
            'width' => ['required'],
            'description' => ['required'],

        ])->validate();

  

        if ($request->has('id')) {

            Plant::find($request->input('id'))->update($request->all());

            return redirect()->back()

                    ->with('message', 'Plant Updated Successfully.');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Plant  $plant
     * @return Response
     */
    public function destroy(Plant $plant, Request $request)
    {
        if ($request->has('id')) {

            Plant::find($request->input('id'))->delete();

            return redirect()->back();

        }
    }
}
