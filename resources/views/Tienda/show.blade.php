@extends('principal')
@section('keywords')
  <meta name="keywords" content="{{$producto->meta_keywords}}">
  <meta name="description" content="{{$producto->meta_description}}">
  <title>{{$producto->meta_title}}</title>
@endsection


@section('content')
@php
  use App\ProductoData;
  use App\Urls;
  use App\Imagen;

  $imagen=Imagen::where('id_product',$producto->id_product)->first()->id_image;
  $digitos=str_split($imagen);
  $src='imgs/img/p';
  foreach($digitos as $n){
    $src=$src.'/'.$n;
  }
  $src=$src.'/'.$imagen.'.jpg';
@endphp
<div class="col-lg-9">

  <div class="card mt-4">
    <img class="card-img-top img-fluid" src="{{asset($src)}}" alt="">
    <div class="card-body">
      <h2>{{$producto->name}}</h2>
      <h5><strong>Reference:
        @php
          $data=ProductoData::where('id_product',$producto->id_product)->get();
          echo($data[0]->reference);
        @endphp
        </strong>
      </h5>
      <h5><strong>Condition: </strong> {{$data[0]->condition}}</h5>
      <br>
      <h5>{!!$producto->description_short!!}</h5>
      <br>
      <h4 class="card-title">More info</h4>
      <br>
      <p class="card-text">{!!$producto->description!!}</p>
     <!--  <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
      4.0 stars -->
    </div>
  </div>

</div>
<!-- /.col-lg-9 -->
@endsection