@extends('layouts.app')


@section('stylesheets')

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">


        {{Form::open(['route' =>'customer.store','files' => true, 'class'=>'form-horizontal company-form','data-parsley-validate'])}}
            <div class="panel panel-default">

                <div class="panel-body">



                <div class="row">
                    <div class="col-md-12 input-field">
                         <input type="text" name="name" id='name' class="form-control" placeholder="Full Name" required>
                     </div>
                  
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-6 input-field">
                         <input type="text" name="email_id" id="email_id" class="form-control" placeholder="Email ID" required>
                     </div>
                     <div class="col-md-6 input-field">
                         <input type="text" name="contact_no" id="contact_no" class="form-control" placeholder="Contact No" required>
                    </div>

                    

                </div>

                    
                    <button class="btn btn-success" type="submit" >Save Customer info
                     </button>



                </div>


                </div>
            </div>


        </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script src="{{ asset('js/cropper.js') }}"></script>
<script type="text/javascript">
    

</script>

@endsection
