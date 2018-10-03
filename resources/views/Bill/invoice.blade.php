<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>

    
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="7">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{asset('/images/company/'.$details->filename)}}" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                Invoice #: {{$invoiceno}}<br>
                                Created: {{$createdat}}<br>
                                <!-- Due: February 1, 2015 -->
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="7">
                    <table>
                        <tr>
                        
                            <td>
                                <b>{{$details->company_name}}.</b><br>
                                {{$details->address}}<br>
                            </td>
                            
                            <td>
                                {{$customer->name}}<br>
                                {{$customer->email}}<br>
                                {{$customer->contact_no}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
        @php
            $total=0;
            $total_tax=0;
        @endphp
            <tr class="heading">
            <td>
                 SI. No
             </td>
                <td>
                
                  DESCRIPTION OF GOODS
                    
                </td>
                
                <td>
                  
                    HSN/SAC
                    
                </td>

                <td>
                  
                    GST RATE
                    
                </td>
                <td>
                  
                    QTY
                    
                </td>
                <td>
                  
                    RATE
                    
                </td>
                <td>
                  
                    AMOUNT
                    
                </td>
            </tr>
            

           
            @foreach($amount as $key=>$value)

            <tr class="item">
                <td>
                    {{$key+1}}
                </td>
                
                <td>
                    {{$value->des}}
                </td>

                <td>
                    {{$value->hsn}}
                </td>
                <td>
                   {{$value->gst}}
                </td>
                <td>
                    {{$value->qty}}
                </td>
                <td>
                    {{$value->rate}}
                </td>
                <td>
                    {{$value->amt}}
                    @php $total=$total+$value->amt; @endphp
                </td>
            </tr>
            @endforeach
            
            
            
            <!-- <tr class="item last">
                <td>
                    Domain name (1 year)
                </td>
                
                <td>
                    $10.00
                </td>
            </tr>
             -->

            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                
                
                <td colspan="2">
                   <b>Sub Total: {{$total}}</b>
                </td>
            </tr>
    
<!-- tax table -->
<tr class="heading">
            <td colspan="1">
            SI. No
          </td>
                <td>
                
                  DESCRIPTION OF GOODS
                    
                </td>
                
                <td>
                  
                  TAXABLE VALUE
                    
                    
                </td>

                <td>
                  
                    CGST RATE
                    
                    
                </td>
                <td>
                  
                    CGST AMOUNT
                    
                    
                </td>
                <td>
                  
                    SGCT RATE
                    
                    
                </td>
                <td>
                  
                     SGCT AMOUNT
                    
                    
                </td>
            </tr>

                @foreach($tax as $key=>$value)
            <tr class="item">
                <td>
                    {{$key+1}}
                </td>
                
                <td>
                    {{$value->des}}
                </td>

                <td>
                    {{$value->taxable_value}}
                     @php $total_tax=$total_tax+$value->taxable_value; @endphp
                </td>
                <td>
                   {{$value->cgst}}
                </td>
                <td>
                    {{$value->cgst_amt}}
                </td>
                <td>
                    {{$value->sgst}}
                </td>
              
                <td>
                    {{$value->sgst_amt}}
                    
                </td>
            </tr>
            @endforeach

             <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                
                
                <td colspan="2">
                   <b>Total Tax: {{$total_tax}}</b>
                </td>
            </tr>



             <tr class="total">
                <td></td>
                <td style="border-top:0px solid #eee;"></td>
                <td></td>
                <td></td>
                <td></td>
               
                
                <td colspan="2">
                   <b>Total Payable: {{$total_tax+$total}}</b>
                </td>
            </tr>
            

        </table>
        @php $print_name=$customer->name.'_'.date('d-m-Y').'_'.$invoiceno @endphp
        <a style="width:30px;margin-left: 50%" href="javascript:void(0);" onclick="document.title='{{$print_name}}';window.print();">
            <img src="{{asset('images/print.ico')}}" title="Click to print" style="width: 27px; margin-top: 30px;"> 
        </a>
    
    </div>
</body>
</html>

