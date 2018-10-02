@extends('layouts.app')


@section('stylesheets')

<style>
    html,
input {
    box-sizing: border-box;
    font-family: Helvetica, sans-serif;
}

* {
    box-sizing: inherit;
}

.hidden {
    display: none;
}

.img-export {
    display: block;
}

</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Company Details</div>

                <div class="panel-body">
                   <!--  @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif -->


 
                   <!--  You are logged in! -->
                        <label class="img-upload-label">
                        Upload Company Logo:
                        <input type="file" class="js-fileinput img-upload" accept="image/jpeg,image/png,image/gif">
                        </label>
                       <!--  <button >Crop</button> -->
                        <canvas class="js-editorcanvas"></canvas>
                        <canvas class="js-previewcanvas"></canvas>


                </div>

                <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 input-field">
                         <input type="text" name="company_name" id='company_name' class="form-control" placeholder="Company Name" required>
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

                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-12 input-field">
                         <input type="text" name="address" id="address" class="form-control" placeholder="Address" required>
                    </div>

                    
                    <button class="btn btn-success js-export img-export"  style="margin-top: 50px; margin-left: 40%;" >Save Company info
                     </button>

                </div>


                </div>

        {{Form::open(['route' => 'company-details.store','files' => true, 'class'=>'form-horizontal company-form','style'=>'display:none','id'=>'company-form','data-parsley-validate'])}}

                    <input type="text" name="company_name_2" id='company_name_2' class="form-control" placeholder="Company Name" required>
                    <input type="text" name="email_id_2" id="email_id_2" class="form-control" placeholder="Email ID" required>
                     <input type="text" name="contact_no_2" id="contact_no_2" class="form-control" placeholder="Contact No" required>
                    <input type="text" name="address_2" id="address_2" class="form-control" placeholder="Contact No" required>
                    <input type="text" name="img" id="img" class="form-control" placeholder="Contact No" required>

                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script src="{{ asset('js/cropper.js') }}"></script>
<script type="text/javascript">
    

</script>

@endsection
