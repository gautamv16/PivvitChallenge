@extends('front.template')

@section('head')

  {!! HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/monokai.css') !!}

@stop

@section('main')
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr>
				<table style="width:100%; height:100%" border="1">
 <thead>
<tr>
<th>Purchase ID</th>
<th>Offering title</th>
<th>Quantity</th>
<th>Unit price</th>
<th>Total</th>
</tr>
</thead>
    <tbody id="list">

    </tbody>
  </table>
				
			</div>
		</div>
		
	</div>

	

</div>

@stop

@section('scripts')

<script>
$(document).ready(function() {
	
   
	$.get( '{{ url("/purchase/getlist")}}', function( response ) {
	  
      $.each(response.data, function( index, value ) {
		  console.log(value);
		   var row = '<tr><td>' + value.id+ '</td><td>'+ value.offering.title+'</td><td>'+ value.quantity+'</td><td>'+ value.offering.price+'</td><td>'+ (parseInt(value.quantity) * parseInt(value.offering.price))+'</td></tr>';
		   $('#list').append(row);
		});
	});
});
	
  
</script>
@stop
