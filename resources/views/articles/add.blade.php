<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	@extends('layouts.app')
	@section('content')
	<div class="container">

	
		@if($errors->any())
		<div class="alert alert-warning">
		  <ol>
			  @foreach($errors->all() as $error)
			    <li>{{$error}}</li>
			  @endforeach
		  </ol>
		</div>
		@endif
	
		
		<form method="post" >
		@csrf
			<div class="form-group">
				Title <br>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				Body <br>
				<textarea name="body"  class="form-control"></textarea>
			</div>
			<div class="form-group">
				<select name="category_id" class="form-control" >
					@foreach($categories as $category)
					   <option value="{{$category['id']}}">
						   {{$category['name']}}
					   </option>
					@endforeach
				</select>
			</div>
			<input type="submit" value="Add New Category">
		</form>
	</div>
	@endsection
</body>
</html>