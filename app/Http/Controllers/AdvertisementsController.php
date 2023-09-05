<?php

namespace App\Http\Controllers;

use App\Models\Advertisements;
use App\Models\Companies;
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

     public function create(Request $request ,$id)
     {

        $product = Companies::find($id);

        // if($request->hasFile('image')){
        //     $destination ='public/images';
        //     $image = $request->file('image');
        //     $image_name =$image ->getClientOriginalName();
        //     $path=$request-> file('image')->storeAs($destination,$image_name);
        //     $data['image']=$image_name;
        // }
        // $image_path = $request->file('image')->store('image', 'public');
        $imageName = "";
        if($request->hasFile("cover")){
            $file=$request->file("cover");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("cover/"),$imageName);
        }

         $advertisement = Advertisements::create([
             'Business_Activity' => $request['Business_Activity'],
             'description' => $request['description'],
             'image' => $imageName,
             'link' => $request['link'],
             'company_id' =>1
            ]);
         $advertisement->save();



         $company = Companies::where('id',1);
        $company = new Companies([
            'Business_Activity' => $request->input('Business_Activity'),
        ]);
        $company->update();


         if (!$advertisement) {
             return redirect()->back()->withErrors(['error' => 'Failed to create advertisement']);
         }

         return redirect()->back()->with('message', 'Advertisements created successfully!');
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // $data = $request->only('Business_Activity');
    // dd($data);
    // $avd = Advertisements::create($data);
    // return back()->with("success",'done');


    public function store(Request $request ,$id)
    {
        // $product = Companies::find($id);
        // $transaction = new Companies([
        //     'Business_Activity' => $request['Business_Activity'],
        // ]);
        // $transaction->save();
        $company = Companies::find($id);

        // حفظ قيمة Business_Activity في جدول companies
        $company->Business_Activity = $request->input('Business_Activity');
        $company->save();

        // إنشاء إعلان وحفظ قيمته في جدول advertisements

        $advertisement = Advertisements::find($id);
        $advertisement = new Advertisements([
            'Business_Activity' => $request->input('Business_Activity'),
        ]);
        $advertisement->update();

        dd("done");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisements  $advertisements
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $advertisements = Advertisements::get();
        return view('advertisements/show',compact('advertisements'));
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
    public function destroy($id)
    {
        // dd($id);
        $adv = Advertisements::findOrfail($id);
        $adv->delete();
        return redirect()->back()->with('error', 'Advertisements deleted successfully!');
    }
}
