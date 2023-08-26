<?php

namespace App\Http\Controllers;

use App\Models\Advertisements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvertisementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('advertisements.create_advertisement');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function create(Request $request)
     {
        if($request->hasFile('image')){
            $destination ='public/images/brands';
            $image = $request->file('image');
            $image_name =$image ->getClientOriginalName();
            $path=$request-> file('image')->storeAs($destination,$image_name);
            $data['image']=$image_name;
        }
         $advertisement = Advertisements::create([
             'type' => $request['type'],
             'description' => $request['description'],
             'image' => $image_name,
             'link' => $request['link'],
            ]);
         $advertisement->save();
         if (!$advertisement) {
             return redirect()->back()->withErrors(['error' => 'Failed to create advertisement']);
         }
         return redirect()->back()->with('success', 'Advertisement created successfully');
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
     * @param  \App\Models\Advertisements  $advertisements
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisements $advertisements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisements  $advertisements
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisements $advertisements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertisements  $advertisements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisements $advertisements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisements  $advertisements
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisements $advertisements)
    {
        //
    }
}
