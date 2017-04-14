@extends('front.template')

@section('head')

  {!! HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/monokai.css') !!}

@stop

@section('main')

ddsnkndsklcdnkd
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
			  {{ Form::open(['url' => 'purchase', 'method' => 'post', 'class' => 'form-horizontal panel']) }}	
			
			{{ Form::selection('role', $select, null, trans('back/users.role')) }}
			{{ Form::submit(trans('front/form.send')) }}
		    {{ Form::close() }}
				<label> Select Offering </label>
				
				
				
			</div>
		</div>
	</div>

	

</div>

@stop

@section('scripts')

	

@stop
