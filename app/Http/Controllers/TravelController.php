<?php

namespace App\Http\Controllers;

use App\User;
use App\Testimonial;
use App\TravelPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transportation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.index', [
            'active' => 'home',
            'travels' => TravelPackage::with(['review', 'galleries'])->latest()->get(),
            'transportations' => Transportation::latest()->get(),
            'testimonials' => Testimonial::with(['user'])->paginate(3)
        ]);
    }

    public function search(Request $request)
    {
        $data = TravelPackage::with(['review', 'galleries']);
        $keyword = $request->all();

        if(isset($keyword['location'])) {
            $data->where('country', 'like', '%'.$keyword['location'].'%');
        }
        if(isset($keyword['type'])) {
            $data->where('type', 'like', '%'.$keyword['type'].'%');
        }
        if(isset($keyword['rating'])) {
            $data->where('rating', '>=', $keyword['rating']);
        }

        return view('pages.destinations', [
            'active' => 'destinations',
            'data' => $data->latest()->paginate(4)
        ]);
    }

    public function search_transportation(Request $request)
    {
        $data = Transportation::latest();
        $keyword = $request->all();

        if(isset($keyword['type'])) {
            $data->where('type', 'like', '%'.$keyword['type'].'%');
        }
        if(isset($keyword['status'])) {
            $data->where('status', 'like', '%'.$keyword['status'].'%');
        }

        return view('pages.transportations', [
            'active' => 'transportations',
            'data' => $data->latest()->paginate(4)
        ]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($country, $type, TravelPackage $travelpackage)
    {
        return view('pages.detail', [
            'active' => 'destinations',
            'detail' => $travelpackage,
            'members' => User::paginate(4),
            'similars' => TravelPackage::where('type', $travelpackage->type)->where('country', $travelpackage->country)->paginate(3)
        ]);
    }

    public function transportation($type, Transportation $transportation)
    {
        return view('pages.transportation', [
            'active' => 'transportations',
            'detail' => $transportation,
            'similars' => Transportation::where('type', $type)->paginate(3)
        ]);
    }

    public function destinations()
    {
        return view('pages.destinations', [
            'active' => 'destinations',
            'data' => TravelPackage::with(['review', 'galleries'])->latest()->paginate(4)
        ]);
    }

    public function transportations()
    {
        return view('pages.transportations', [
            'active' => 'transportations',
            'data' => Transportation::latest()->paginate(4)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return view('pages.profile', [
            'data' => User::findOrFail($request->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();

        if (Hash::check($data['currentpassword'], Auth::user()->password)) {
            if ($_FILES['image']['error'] == 4) {
                $data['image'] = $request->currentimage;
            } else {
                $data['image'] = $request->file('image')->store(
                    'assets/user_image',
                    'public'
                );

                Storage::disk('public')->delete(User::findOrFail($data['id'])->image);
            }

            User::findOrFail($data['id'])->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'job' => $data['job'],
                'image' => $data['image'],
                'password' => Hash::make($data['newpassword'])
            ]);

            $query = "Profile Saved";
        } else {
            $query = "Profile Failed Save";
        }

        return redirect()->route('home')->with(['profile' => $query]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
