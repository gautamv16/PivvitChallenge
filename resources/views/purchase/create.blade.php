@extends('front.template')

@section('head')

  {!! HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/monokai.css') !!}

@stop

@section('main')
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr>
		<div id="ajaxResponse" class="alert alert-success"></div>
		    {!! Form::open(['url' => 'purchase', 'method' => 'post', 'id' => 'purchase','class'=>'form-inline']) !!}	
			{{csrf_field()}}
			<label>Select Offering</label>
			<select class="form-control" name="offeringId" id="offeringId" style="width:20%">
				<option value="0" data-price="0">Select Offering</option>
				@foreach($offerings as $item)
				  <option value="{{$item->id}}_{{$item->price}}" data-price="{{$item->price}}">{{$item->title}}</option>
				@endforeach
			  </select>
			 <br/> 
			<label>Customer Name </label>
			{{ Form::input('text', 'customerName', null, ['id' => 'customername']) }}
			
			{{ Form::input('hidden', 'unit_price', null, ['id' => 'unit_price','value'=>'']) }}
			<br/> 
			<label>Quantity </label>
			{{ Form::input('text', 'quantity', null, ['id' => 'quantity']) }}
			<br/> 
			<label>Total </label>
			{{ Form::input('text', 'total', null, ['id' => 'total']) }}
			<br/> 
			{!! Form::submit('Create') !!}
		    {!! Form::close() !!}
				
			</div>
		</div>
		
	</div>

	

</div>

@stop

@section('scripts')

<script>
$(document).ready(function() {
	
	  $('#offeringId').on('change', function() { 
        var pricedata = $(this).val();
	    var data = pricedata.split("_"); 
		
		var price = data[1];
		
		$('#unit_price').val(price);
      })
	  
    //var url="{{ url('/purchase')}}";
	
    $('#purchase').on('submit', function (e) {
        e.preventDefault();
		var offeringdata = $('#offeringId').val();
		if(offeringdata==0){
			
			alert("Please select ofefring");
			return false;
		}
		var data = offeringdata.split("_"); 
		
		var offeringId = data[0];
        
        var customername = $('#customername').val();
        var total = $('#total').val();
		var quantity = $('#quantity').val();
        $.ajax({
            type: "POST",
            url: '{{ url("/purchase")}}',
            data: {offeringId: offeringId, customerName: customername, total: total,quantity:quantity, "_token": "{{ csrf_token() }}"},
            success: function( response ) {
				if(response.status)
                $("#ajaxResponse").append("<div>Succecss</div>");
			    else
				$("#ajaxResponse").append("<div>Failure</div>");	
            }
        });
    });
});
	
  $( "#quantity" ).blur(function() {
       var quantity = $(this).val();
       var price = $('#unit_price').val();
       var total = parseInt(quantity) * parseInt(price);
       $('#total').val(total);
       
  });	
</script>
@stop
