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

<div class="panel-body">
<h3>Recently Billed Customers</h3>
<ul class="list-group list-group-flush">

  @foreach($customers as $customer)

<li class="list-group-item">

<p>

  <b>{{$customer->name}},{{$customer->contact_no}}</b>

  <a href="{{route('customer.show',$customer->id)}}"><button style="width: 10%;">Select</button></a>

 <a href="javascript:void(0)"><button onclick="myFunction({{$customer->id}})" style="background-color: red;width: 10%;">Delete</button></a>
</p>
</li>

  @endforeach
</ul>
</div>
@endsection

@section('scripts')

<script src="{{ asset('js/cropper.js') }}"></script>

<script type="text/javascript">

function myFunction(id) {
    var r=confirm("Press a button!");

    if (r == true) {
      
      window.location="{{route('customer.delete','')}}"+"/"+id;

} else {

   return false;
}


}

</script>

@endsection

