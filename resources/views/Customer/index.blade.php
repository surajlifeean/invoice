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



<div class="panel-body" style="margin-top: 10%;">
<div class="card">
  
 <p><a href="{{route('customer.index')}}"><button>Existing Customer</button></a></p>


</div>

  <div class="card">

 <p><a href="{{route('customer.create')}}"><button>Add New Customer</button></a></p>
</div>
</div>
@endsection

@section('scripts')

<script src="{{ asset('js/cropper.js') }}"></script>

@endsection

