<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	@extends('layouts.app');
	@section('content')
	<div class="container">
		
	    @if(session('info'))
		    <div class="alert alert-danger">
			{{session('info')}}
			</div>
		@endif

		<ul class="a d-flex ">
		{{$articles->links()}}
		<h1 class="aa ml-3">Article List</h1>
		
		</ul>

		
		@foreach($articles as $article)
		<div class="card mt-3">	
				<div class="card-header">
					{{$article->title}}
				</div>
				<div class="card-body">
					{{$article->created_at->diffForHumans()}} <br><br>
					{{$article->body}}
				</div>
				<div class="card-footer">
				<a href="{{url("/articles/detail/$article->id")}}">View </a>
				</div>
		</div>		
		@endforeach
	</div>
	@endsection 
</body>
</html>