<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Detail;
use Auth;
use Session;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
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
        
        $filename=$this->convertBase64ToImage($request['img']);
        $details=new Detail;
        $details->company_name=$request['company_name_2'];
        $details->contact_no=$request['contact_no_2'];
        $details->address=$request['address_2'];
        $details->user_id=Auth::user()->id;
        $details->filename=$filename;
        $details->save();


        $request->session()->flash('success', 'Details Updated successfully.');

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        session(['company_id' => $id]);
        return view('Customer.index');

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


     public function convertBase64ToImage($photo = null, $path = null) {
    

    define('UPLOAD_DIR', getcwd().DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'company'.DIRECTORY_SEPARATOR);
    $image_parts = explode(";base64,", $photo);
    $image_type_aux = explode("image", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $filename = uniqid().'.png';
    $file = UPLOAD_DIR.$filename;
    file_put_contents($file, $image_base64);
    return $filename;
    }

    public function delete($id,Request $request)
    {
        $company=Detail::find($id);
        $company->delete();
        $request->session()->flash('success', 'Details Delated successfully.');

        return redirect()->route('home');

    }
}
