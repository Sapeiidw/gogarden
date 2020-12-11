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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return all data
        $data = Plant::all();
        return Inertia::render('Plant/Index', ['data' => $data]);
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
    public function store(Request $request)
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        //
        $data = Plant::find($name);
        // return response()->json($data);
        return Inertia::render('Plant/Show', ['data' => [$data] ]);
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
    public function update(Request $request, $id)
    {
        //
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
            return redirect()->back()->with('message', 'Plant Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        if ($request->has('id')) {

            Plant::find($request->input('id'))->delete();

            return redirect()->back();

        }
    }
}
