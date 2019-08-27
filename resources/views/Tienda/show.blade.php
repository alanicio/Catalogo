@extends('principal')
@section('keywords')
@endsection


@section('content')

<div class="col-lg-9">

  <div class="card mt-4">
    <img class="card-img-top img-fluid" src="{{strlen($producto->imagen)?$producto->imagen:asset('imgs/not_found.jpeg')}}" alt="">
    <div class="card-body">
      <h2>{{$producto->name}}</h2>
      <h5>testo</h5>
      <h5>read</h5>
      <br>
      <h5>880</h5>
      <br>
      <h4 class="card-title">data</h4>
      <br>
      <p class="card-text">data</p>
     <!--  <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
      4.0 stars -->
    </div>
  </div>

</div>
<!-- /.col-lg-9 -->
@endsection