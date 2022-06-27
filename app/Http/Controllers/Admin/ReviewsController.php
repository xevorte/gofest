<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Testimonial;
use App\TravelPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewsRequest;
use Exception;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.reviews.index', [
            'active' => 'reviews',
            'reviews' => Testimonial::with(['user', 'travel_package'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.reviews.create', [
            'active' => 'reviews',
            'users' => User::all(),
            'destinations' => TravelPackage::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewsRequest $request)
    {
        try {
            Testimonial::create($request->all());
            $queryStatus = "Success Create Review";
        } catch (Exception $e) {
            $queryStatus = "Failed Create Review";
        }

        return redirect()->route('reviews.index')->with(['message' => $queryStatus]);
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
        return view('pages.admin.reviews.edit', [
            'active' => 'reviews',
            'review' => Testimonial::findOrFail($id),
            'users' => User::all(),
            'destinations' => TravelPackage::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewsRequest $request, $id)
    {
        try {
            Testimonial::findOrFail($id)->update($request->all());
            $queryStatus = "Success Edit Review";
        } catch (Exception $e) {
            $queryStatus = "Failed Edit Review";
        }

        return redirect()->route('reviews.index')->with(['message' => $queryStatus]);
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
            Testimonial::findOrFail($id)->delete();
            $queryStatus = "Success Delete Review";
        } catch (Exception $e) {
            $queryStatus = "Failed Delete Review";
        }

        return redirect()->route('reviews.index')->with(['message' => $queryStatus]);
    }
}
