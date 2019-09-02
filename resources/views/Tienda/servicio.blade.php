@extends('principal')
@section('keywords')
	<meta name="keywords" content="{{$servicio->meta_keywords}}">
	<title>{{$servicio->meta_title}}</title>
	<meta name="description" content="{{$servicio->meta_description}}">

@endsection
@section('content')
	<div class="col-lg-9" style="margin-top: 5%;">
		
		{!!$servicio->content!!}

	</div>
@endsection