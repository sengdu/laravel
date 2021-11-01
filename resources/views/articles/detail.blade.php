<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	@extends("layouts.app")
	@section('content')
	   <div class="container">
		   <div class="card">
			   <div class="card-header">
				   {{$article->title}}
			   </div>
			   <div class="card-header">
				   {{$article->created_at->diffForHumans()}} <br><br>
				  ( Category: <b> {{$article->category->name}}</b> ) <br><br>
				   {{$article->body}}

			   </div>
			   <div class="card-footer">
				  <a href="{{url("/articles/delete/$article->id")}}">Delete</a> 
				  
			   </div>
		   </div>

		   <ul class="list-group mt-4">
			   <li class="list-group-item active">Comments:({{count($article->comments)}})</li>
			   @foreach($article->comments as $comment)
			     <li class="list-group-item">
				 {{$comment->content}}
				 <a href="{{url("/comments/delete/$comment->id")}}">
				   &times;
				 </a>
				 <div class="small">
					 By <b>{{$comment->user->name}}</b> <br>
					 {{ $comment->created_at->diffForHumans() }}

				 </div>
				 </li>
			   @endforeach
		   </ul>
		   @auth
		   <form action="{{url('/comments/add')}}" method="post" class="mt-3">
		       @csrf
			   <input type="text" name="article_id" value="{{$article->id}}"> <br>
			   <textarea name="content" class="list-group-item"></textarea> <br>
			   <input type="submit" value="Add Comments" class="btn btn-primary" >
		   </form>
		   @endauth
	   </div>
	@endsection
</body>
</html>