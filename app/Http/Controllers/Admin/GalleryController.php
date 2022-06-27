<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Gallery;
use App\TravelPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.gallery.index', [
            'active' => 'gallery',
            'galleries' => Gallery::with(['travel_package'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.gallery.create', [
            'active' => 'gallery',
            'travel_packages' => TravelPackage::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery',
            'public'
        );

        try {
            Gallery::create($data);
            $queryStatus = "Success Create Gallery";
        } catch (Exception $e) {
            $queryStatus = "Failed Create Gallery";
        }

        return redirect()->route('gallery.index')->with(['message' => $queryStatus]);
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
        return view('pages.admin.gallery.edit', [
            'active' => 'gallery',
            'gallery' => Gallery::findOrFail($id),
            'travel_packages' => TravelPackage::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery',
            'public'
        );

        try {
            Storage::disk('public')->delete(Gallery::findOrFail($id)->image);
            Gallery::findOrFail($id)->update($data);
            $queryStatus = "Success Edit Gallery";
        } catch (Exception $e) {
            $queryStatus = "Failed Edit Gallery";
        }

        return redirect()->route('gallery.index')->with(['message' => $queryStatus]);
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
            Storage::disk('public')->delete(Gallery::findOrFail($id)->image);
            Gallery::findOrFail($id)->delete();
            $queryStatus = "Success Delete Gallery";
        } catch (Exception $e) {
            $queryStatus = "Failed Delete Gallery";
        }

        return redirect()->route('gallery.index')->with(['message' => $queryStatus]);
    }
}
