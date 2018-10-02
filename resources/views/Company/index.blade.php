@extends('layouts.app')


@section('stylesheets')

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
@endsection

@section('content')

<div class="row">


@foreach($company as $value)


<div class="col-md-3">
<div class="card">
  <img src="{{asset('/images/company/'.$value->filename)}}" alt="John" style="width:100%">
  <h1>{{$value->company_name}}</h1>
  <p class="title">{{$value->address}}</p>
 <!--  <p>{{$value->contact_no}}</p> -->
 <!--  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
 </div> -->
 <p><a href="{{route('company-details.show',$value->id)}}"><button>Select</button></a></p>
 <p><a href="javascript:void(0)"><button onclick="myFunction({{$value->id}})" style="background-color: red;">Delete</button></a></p>

<!-- {{route('company-details.delete',$value->id)}} -->
 
</div>

</div>

@endforeach


<div class='col-md-3'>

  <div class="card">
  <a href="{{route('company-details.index')}}"><img src="{{asset('/images/company/add_new.png')}}" alt="add new" style="width:100%"></a>

 <p><a href="{{route('company-details.index')}}"><button>Add New Company</button></a></p>
</div>

</div>

</div>
@endsection

@section('scripts')

<script src="{{ asset('js/cropper.js') }}"></script>
<script type="text/javascript">

function myFunction(id) {
    var r=confirm("Press a button!");

    if (r == true) {
      
      window.location="{{route('company-details.delete','')}}"+"/"+id;

} else {

   return false;
}


}

</script>

@endsection

