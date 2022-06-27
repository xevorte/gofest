<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TransportationRequest;
use App\Transportation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Storage;

class TransportationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.transportation.index', [
            'active' => 'transportation',
            'transportations' => Transportation::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.transportation.create', [
            'active' => 'transportation'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransportationRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->company_name);
        $data['image'] = $request->file('image')->store(
            'assets/gallery',
            'public'
        );

        try {
            Transportation::create($data);
            $queryStatus = "Success Create Destination";
        } catch (Exception $e) {
            $queryStatus = "Failed Create Destination";
        }

        return redirect()->route('transportation.index')->with(['message' => $queryStatus]);
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
        return view('pages.admin.transportation.edit', [
            'active' => 'transportation',
            'transportation' => Transportation::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransportationRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['image'] = $request->file('image')->store(
            'assets/gallery',
            'public'
        );

        try {
            Storage::disk('public')->delete(Transportation::findOrFail($id)->image);
            Transportation::findOrFail($id)->update($data);
            $queryStatus = "Success Edit Destination";
        } catch (Exception $e) {
            $queryStatus = "Failed Edit Destination";
        }

        return redirect()->route('transportation.index')->with(['message' => $queryStatus]);
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
            Storage::disk('public')->delete(Transportation::findOrFail($id)->image);
            Transportation::findOrFail($id)->delete();
            $queryStatus = "Success Delete Destination";
        } catch (Exception $e) {
            $queryStatus = "Failed Delete Destination";
        }

        return redirect()->route('transportation.index')->with(['message' => $queryStatus]);
    }
}
