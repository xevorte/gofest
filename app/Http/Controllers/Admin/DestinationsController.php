<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TravelPackageRequest;
use App\TravelPackage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class DestinationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.destinations.index', [
            'active' => 'destinations',
            'destinations' => TravelPackage::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.destinations.create', [
            'active' => 'destinations'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelPackageRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        try {
            TravelPackage::create($data);
            $queryStatus = "Success Create Destination";
        } catch (Exception $e) {
            $queryStatus = "Failed Create Destination";
        }

        return redirect()->route('destinations.index')->with(['message' => $queryStatus]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.admin.destinations.edit', [
            'active' => 'destinations',
            'destination' => TravelPackage::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TravelPackageRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        try {
            TravelPackage::findOrFail($id)->update($data);
            $queryStatus = "Success Edit Destination";
        } catch (Exception $e) {
            $queryStatus = "Failed Edit Destination";
        }

        return redirect()->route('destinations.index')->with(['message' => $queryStatus]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            TravelPackage::findOrFail($id)->delete();
            $queryStatus = "Success Delete Destination";
        } catch (Exception $e) {
            $queryStatus = "Failed Delete Destination";
        }

        return redirect()->route('destinations.index')->with(['message' => $queryStatus]);
    }
}
