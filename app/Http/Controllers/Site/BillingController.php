<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Detail;
use Auth;
use Session;
use App\Invoice;
use App\Customer;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Bill.index');
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
        $des=$request['description'];
        $hsn=$request['hsn'];

        $gst=$request['gst'];

        $qty=$request['qty'];

        $rate=$request['rate'];

        $invoice_no=date('dmyHis');
        $createdat=date('d-m-y H:i a');
        $amount=array();
        $tax=array();


        $company_id=session('company_id');
        $customer_id=session('customer_id');

        $details=Detail::find($company_id);
        $customer=Customer::find($customer_id);


        foreach ($des as $key => $value) {
            
            $invoice=new Invoice;
            $invoice->invoice_no=$invoice_no;
            $invoice->hsn=$hsn[$key];
            $invoice->gst=$gst[$key];
            $invoice->qty=$qty[$key];
            $invoice->rate=$rate[$key];
            $amt=$qty[$key]*$rate[$key];
            $invoice->amt=$amt;
            $cgst=$gst[$key]/2;
            $cgst_amt=$cgst*$amt/100;
            $sgst=$gst[$key]/2;
            $sgst_amt=$sgst*$amt/100;
            $invoice->taxable_value=$cgst_amt+$sgst_amt;
            $invoice->due_date="0000";
            $invoice->customer_id='1';

            $invoice->save();

            array_push($amount,(object)['des'=>$value,'hsn'=>$hsn[$key],'gst'=>$gst[$key],'qty'=>$qty[$key],'rate'=>$rate[$key],'amt'=>$amt]);
            array_push($tax,(object)['des'=>$value,'taxable_value'=>$sgst_amt+$cgst_amt,'cgst'=>$cgst,'sgst'=>$sgst,'cgst_amt'=>$cgst_amt,'sgst_amt'=>$sgst_amt]);



        }
                    
        // dd($amount);

        return view('Bill.invoice')->withInvoiceno($invoice_no)->withCreatedat($createdat)->withDetails($details)->withAmount($amount)->withTax($tax)->withCustomer($customer);
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
