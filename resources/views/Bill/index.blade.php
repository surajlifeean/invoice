<html lang="en">
<head>
  <title>invoice app</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">


        </div>
    </div>
</div>
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
          <!-- <div class="col-md-1">
            SI. No
          </div> -->
          <div class="col-md-3">
            DESCRIPTION OF GOODS
          </div>
          <div class="col-md-2">
            HSN/SAC
          </div>
          <div class="col-md-1">
            GST RATE
          </div>
          <div class="col-md-1">
            QTY.
          </div>
          <div class="col-md-1">
            RATE
          </div>
          <div class="col-md-2">
            AMOUNT
          </div>
        </div>
    </div>
    <div class="panel-body">


        {{Form::open(['route' => 'billing.store','files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}



      	<div class="input-group control-group after-add-more">
          <div class="row data">
          <!-- <div class="col-md-1">
            <input type="text" name="addmore[]" class="form-control" placeholder="">
          </div> -->
          <div class="col-md-3 input-field">
            <input type="text" name="description[]" class="form-control" placeholder="" required>
          </div>
          <div class="col-md-2">
            <input type="text" name="hsn[]" class="form-control" placeholder="" required>
          </div>
          <div class="col-md-1 input-field">
            <input type="text" name="gst[]" class="form-control" placeholder="" required>
          </div>
          <div class="col-md-1 input-field">
            <input type="text" name="qty[]" class="form-control qty" placeholder="" required>
          </div>
          <div class="col-md-1 rate-1 input-field">
            <input type="text" name="rate[]" class="form-control rate" placeholder="" required>
          </div>
          <div class="col-md-2 input-field">
            <input type="text" name="amount[]" class="form-control amt" placeholder="Enter Amount" disabled="true" required>
          </div>
          <div class="col-md-1">
          <div class="input-group-btn"> 
            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add
            </button>
          </div>
        </div>
      </div>
        </div>

<!-- 		<button type="submit">Submit</button> -->
        <div class="row">
          <div class="col-md-3 input-field">
              Billing Date:<input type="text" name="date" class='form-control' placeholder="DD-MM-YYYY"  pattern="(?:0[1-9]|1[0-9]|2[0-9]|3[0-1])-(?:0[1-9]|1[0-2])-(?:19|20)[0-9]{2}" title="Enter a date in this format DD-MM-YYYY" required/>
          </div>
          <div class="col-md-3 input-field">
              <button class="btn btn-success" type="submit" style="margin-top: 20px;"><i class="glyphicon glyphicon-ok"></i> Generate Invoice
              </button>
          </div>
            </div>

        </form>


        <!-- Copy Fields -->
        <div class="copy hide">
          <div class="control-group input-group" style="margin-top:5px">
            <div class="row data">
             
             <div class="col-md-3 input-field">
            <input type="text" name="description[]" class="form-control" placeholder="" required>
          </div>
          <div class="col-md-2">
            <input type="text" name="hsn[]" class="form-control" placeholder="" required>
          </div>
          <div class="col-md-1 input-field">
            <input type="text" name="gst[]" class="form-control" placeholder="" required>
          </div>
          <div class="col-md-1 input-field">
            <input type="text" name="qty[]" class="form-control qty" placeholder="" required>
          </div>
          <div class="col-md-1 rate-1 input-field">
            <input type="text" name="rate[]" class="form-control rate" placeholder="" required>
          </div>
          <div class="col-md-2 input-field">
            <input type="text" name="amount[]" class="form-control amt" placeholder="Enter Amount" disabled="true">
          </div>
              <div class="col-md-1">

            <div class="input-group-btn"> 
              
              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Del
              </button>

            </div>

            </div>
          </div>
        </div>


    </div>
  </div>
</div>
<h3 style="float:right;">
<p id='subtotal'> </p></h3>

              <button class="btn btn-success" id="subtotal_btn" type="button"><i class="glyphicon glyphicon-ok"></i> Get total
              </button>
</div>

<!-- 
gst calculation -->

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
          <!-- <div class="col-md-1">
            SI. No
          </div> -->
          <div class="col-md-3">
            DESCRIPTION OF GOODS
          </div>
          <div class="col-md-2">
            TAXABLE VALUE
          </div>
          <div class="col-md-1">
            CGST RATE
          </div>
          <div class="col-md-2">
            CGST AMOUNT
          </div>
          <div class="col-md-2">
            SGCT RATE
          </div>
          <div class="col-md-2">
            SGCT AMOUNT
          </div>
        </div>
    </div>
    <div class="panel-body">



      	<div class="add-more-gst">

        </div>




        <!-- Copy Fields -->
        <div class="copy-gst hide">
          <div class="control-group input-group" style="margin-top:5px">
            <div class="row">
             
        <div class="col-md-3">
        <input type="text" name="description_2[]" class="form-control" placeholder="">
      </div>
      <div class="col-md-2">
        <input type="text" name="taxable_value[]" class="form-control" placeholder="">
      </div>
      <div class="col-md-1">
        <input type="text" name="cgst_rate[]" class="form-control" placeholder="">
      </div>
      <div class="col-md-2">
        <input type="text" name="cgst_amount[]" class="form-control qty" placeholder="">
      </div>
      <div class="col-md-2 rate-1">
        <input type="text" name="sgst_rate[]" class="form-control rate" placeholder="">
      </div>
      <div class="col-md-2">
        <input type="text" name="sgst_amount[]" class="form-control amt" placeholder="Enter Amount" disabled="true">
      </div>

          </div>
        </div>


    </div>

  </div>
</div>
<h3 style="float:right;">
<p id='taxtotal'> </p></h3>

<h3 style="float:left;">
<p id='total'> </p></h3>


<!-- 
              <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-ok"></i> Generate Invoice
              </button> -->
</div>


<script type="text/javascript">
	var subtotamt=0;



    $(document).ready(function() {


      $(".add-more").click(function(){
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });


      $("body").on("click",".remove",function(){
          $(this).parents(".control-group").remove();
      });


    });


    $(document).ready(function() {


      
          var html = $(".copy").html();
          $(".after-add-more-gst").after(html);
      

    });


$(document).on('change','.rate', function(){
        // LOOP THROUGH EACH DATA ELEMENT.
        // $('.data').each(function (){
            
          var rate = this.value;
    	  var amt = $(this).closest('div').next('div').find('input:text');   
    	  var qty = $(this).closest('div').prev('div').find('input:text').val();
	      amt.val(Number(qty)*Number(rate));
	      sum_amt();

});

$(document).on('change','.qty', function(){
        // LOOP THROUGH EACH DATA ELEMENT.
        // $('.data').each(function (){
            
          var qty = this.value;
    	  // var tgt = $(this).closest('div').next('div').find('input:text');      
    	  var rate = $(this).closest('div').next('div').find('input:text').val();
    	  var amt = $(this).closest('div').next('div').closest('div').next('div').find('input:text');

    	  var gst = $(this).closest('div').prev('div').find('input:text').val();
    	 // console.log(gst);
    	 // console.log(Number(qty)*Number(rate));
    	 amt.val(Number(qty)*Number(rate));
    	 sum_amt();

});

function sum_amt(){
	var amt=0;

	$('.amt').each(function(){
        
          amt = Number(amt)+Number(this.value);
        
	});
	
	subtotamt=amt;
	$('#subtotal').html('Subtotal(Exclusive GST):'+amt);
}

$('#subtotal_btn').click(function(){

	var gst=0;
	var amt=0;
	var cgst=0;
	var sgst=0;
	var cgst_amt=0;
	var sgst_amt=0;
	var total_tax=0;

    
    $(".add-more-gst").html("");
    $('.input-field').each(function(i){

    	//console.log($('.input-field').length);

		if(i >= $('.input-field').length-4) {
			return;
		}
    	if(i%5==0){

    		var des=$(this).find(':input');


    		 $(".add-more-gst").append('<div class="col-md-3">'+des.val()+'</div>');
    	}

    	if(i%5==1){
    		// console.log(this);
    		gst=$(this).find(':input');
    		gst=gst.val();
    	}

    	if(i%5==4){

    		amt=$(this).find(':input');
    		amt=amt.val();


    	taxable_val=Number(amt)*Number(gst)/100;
    	$(".add-more-gst").append('<div class="col-md-2">'+taxable_val+'</div>');

    	cgst=Number(gst)/2;
    	$(".add-more-gst").append('<div class="col-md-1">'+cgst+'</div>');

    	cgst_amt=Number(amt)*cgst/100;
    	$(".add-more-gst").append('<div class="col-md-2">'+cgst_amt+'</div>');

    	sgst=Number(gst)/2;
    
    	$(".add-more-gst").append('<div class="col-md-2">'+sgst+'</div>');

    	sgst_amt=Number(amt)*sgst/100;
    	$(".add-more-gst").append('<div class="col-md-2">'+sgst_amt+'</div>');

    	$(".add-more-gst").append("<br>");


    	total_tax=total_tax+taxable_val;
    	$('#taxtotal').html('Total Tax:'+total_tax);

    	tot=total_tax+subtotamt
		$('#total').html('Total(Including GST):'+tot);
    	// console.log(tot);
    	}

    
    });
	
});


</script>


</body>
