@if(Session::has('success'))
	<div class="alert alert-success" role="alert">
	<strong>Success:</strong>{{Session::get('success')}}
	</div>
@endif

@if(Session::has('error'))
	<div class="alert alert-danger" role="alert">
	{{Session::get('error')}}
	</div>
@endif


<script type="text/javascript">
	
 setTimeout(function() {
        $('.alert').remove();
    }, 5000);
</script>
