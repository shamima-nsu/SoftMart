@extends('app')

@section('content')


	<div class="form-group">

		{!! Form::label('title', 'Title: ') !!}
		{!! Form::text('title', array('class'=>'form-control', 'required'=>'required')) !!}

	</div>

	<div class="form-group">

		<?php //$cats= Software_category::all(); ?>

		{!! Form::label('category', 'Software Category: ') !!}
		{!! Form::select('category', $cats , Input::old('category')) !!}

	</div>

	<div class="form-group">

		{!! Form::label('description', 'Description: ') !!}
		{!! Form::text('description') !!}

	</div>

	<div class="form-group">

		{!! Form::label('file', 'Attach a file: ') !!}
		{!! Form::file('file') !!}

	</div>

	<div class="form-group">

		{!! Form::label('deadline', 'Deadline: ') !!}
		{!! Form::date('deadline') !!}

	</div>

	<div class="form-group">

		{!! Form::submit($submit_text, ['class'=>'btn btn-success']) !!}

	</div>

@endsection