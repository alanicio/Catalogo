@php
	use App\Servicio;
	$servicios=Servicio::where('id_lang',2)->get();
@endphp
<div class="col-lg-3">

  <h1 class="my-4"><a href="/"><img src="{{asset('imgs/nonex_logo.png')}}" style="width: 250px;"></a></h1>
  <div class="list-group">
  	<div id="accordion">
	  	@foreach($servicios as $s)
		  	<div class="card">
		  		<a href="{{url('content/'.$s->id_cms.'-'.$s->link_rewrite)}}">{{$s->meta_title}}</a>
		  	</div>
	    @endforeach
	</div>
  </div>

</div>
<!-- /.col-lg-3 -->