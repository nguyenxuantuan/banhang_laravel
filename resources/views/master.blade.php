<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Banh Tuan Quynh </title>
	@include('layout.css')
</head>
<body>
	@include('layout.header')

	<div class="rev-slider">
		@yield('content')
	</div>

	@include('layout.footer')
	@include('layout.js')
	{{-- <script>
	$(document).ready(function(){
    $('.xoagiohang_ajax').click(function(e){
      e.preventDefault();
      var id = $(this)
      if(confirm('Are you sure you want to delete this')){
        $.ajax({
          type: "POST",
          url: "{{route('deltecart_ajax')}}",
          data: "id:id",
          dataType: "JSON",
          success: function (response) {
            console.log(response);
            // $('#cart'+response).fadeOut(500);
          }
        });
      }
    })
	})
</script> --}}

</body>
</html>
