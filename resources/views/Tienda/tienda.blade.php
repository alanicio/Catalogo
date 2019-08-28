@extends('principal')
@section('keywords')
  @isset($cat)
    <title>{{$cat->meta_title}}</title>
    <meta name="keywords" content="{{$cat->meta_keywords}}">
    <meta name="description" content="{{$cat->meta_description}}">
  @endisset
@endsection

@section('content')

<!-- @php
use \App\Http\Controllers\Producto\ProductoController;
@endphp -->

@php
  use App\ProductoData;
  use App\Urls;
  use App\Imagen;
  use App\Productos_categorias;
  use App\Categoria;
  //dd( Urls::where('request_uri','like','www.seguridad-nonex.com/%/5459-%.html')->first('request_uri') );
@endphp

<div class="col-lg-9">

  <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <!-- 900x350 imagenes del slider -->
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <img class="d-block img-fluid" src="{{asset('imgs/banner/banner1.png')}}" alt="First slide" style="width: 900px;height: 350px;">
      </div>
      <div class="carousel-item">
        <img class="d-block img-fluid" src="{{asset('imgs/banner/banner2.png')}}" alt="Second slide" style="width: 900px;height: 350px;">
      </div>
      <div class="carousel-item">
        <img class="d-block img-fluid" src="{{asset('imgs/banner/banner3.png')}}" alt="Third slide" style="width: 900px;height: 350px;">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="row">


    @foreach($productos as $p)
      @if($p->id_lang==2)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            @php
              $imagen=Imagen::where('id_product',$p->id_product)->first()->id_image;
              $digitos=str_split($imagen);
              $src='imgs/img/p';
              foreach($digitos as $n){
                $src=$src.'/'.$n;
              }
              $src=$src.'/'.$imagen.'.jpg';
              $Pcategoria=Productos_categorias::where('id_product',$p->id_product)->first()->id_category;
              $cat=Categoria::where('id_category',$Pcategoria)->first();
            @endphp

            @if(Urls::where('request_uri','like','www.seguridad-nonex.com/%/'.$p->id_product.'-%.html')->first('request_uri'))
              <a href="{{substr(Urls::where('request_uri','like','www.seguridad-nonex.com/%/'.$p->id_product.'-%.html')->first('request_uri')->request_uri,24)}}"><img class="card-img-top" src="{{asset($src)}}" alt=""></a> 
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">
                  <a href="{{substr(Urls::where('request_uri','like','www.seguridad-nonex.com/%/'.$p->id_product.'-%.html')->first('request_uri')->request_uri,24)}}">{{$p->name}}</a>
                </h5>
            @else
              <a href="{{url('otros/'.$p->id_product.'-'.$p->link_rewrite.'.html')}}"><img class="card-img-top" src="{{asset($src)}}" alt=""></a> 
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">
                  <a href="{{url($cat->link_rewrite.'/'.$p->id_product.'-'.$p->link_rewrite.'.html')}}">{{$p->name}}</a>
                </h5>
            @endif
              
              <p class="card-text">Reference:
                @php
                  $data=ProductoData::where('id_product',$p->id_product)->get();
                  echo($data[0]->reference);
                @endphp
               <br>Condition:{{$data[0]->condition}}</p>
            </div>
            <!-- <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div> -->
          </div>
        </div>
      @endif
    @endforeach
    {{$productos->appends(Request::except('page'))->links()}}
  </div>
  <!-- /.row -->

</div>
<!-- /.col-lg-9 -->


<!-- <script type="text/javascript">
  $('#inicio').prop("class","nav-item");
  $('#tienda').prop("class","nav-item active");
  $('#carrito').prop("class","nav-item");
  $('#usuario').prop("class","nav-item dropdown");
  $('#sesion').prop("class","nav-item dropdown");
  
  $('.btn-success').click(function(){
    var id=$(this).attr('id');
    var cantidad=$('#cantidad'+id).val();
    $.ajax({
        type: "POST",
        url: '{{url("/carrito")}}',
        data:{id:id,cantidad:cantidad},
        success: function(res){
          if(res.status>0)
          {
            $('#'+id).attr('class','btn btn-success btn-sm disabled mt-auto text-center');
            $('#'+id).html('<i class="fas fa-check-square"></i> Añadido al carrito');
            if($('#cantidad'+id).val()==0)
            {
              $('#cantidad'+id).val(1)
            }
          }
          else
          {
            swal("Existencias insuficientes", "¡No disponemos de las existencias suficientes!", "error")
            .then((value) => {
              location.reload(true);
            });
          }
        },
    });
  });

$('input').change(function(){
  var fila=$(this).attr('name');
  //console.log($('#'+fila).attr('class')=='btn btn-success btn-sm disabled mt-auto text-center');
    if($('#'+fila).attr('class')=='btn btn-success btn-sm disabled mt-auto text-center')
    {
      var cantidad=-1*(parseInt(this.value)-parseInt(this.defaultValue));
      this.defaultValue=this.value;
      $.ajax({
            type: "POST",
            url: '{{url("/convert_c")}}',
            data:{id:fila,cantidad:cantidad,numU:this.value},
            success: function(res){
              if(res.status)
              {
                // $('#total'+fila).html('$'+(parseFloat($('#'+fila).val())*res.costo).toFixed(2));
                // $('[id^=total]').each(function(index){
                //   //console.log($(this).html())
                //   total+=parseFloat($(this).html().replace('$',''));
                // });
                // //console.log(total);
                // $('#Ftotal').html('$'+total.toFixed(2));
                // $('#'+fila).defaultValue=$('#'+fila).value;
                 
              }
              else
              {
                // $('#'+fila).attr('readonly', true);
                swal("Existencias insuficientes", "¡No disponemos de las existencias suficientes!", "error")
            .then((value) => {
              location.reload(true);
            });
                // swal("Existencias insuficientes", "¡No disponemos de las existencias suficientes!", "error");
           //     setTimeout(function(){
              //     location.reload(true);
              // }, 2000);
                
              }

                
            },
        });
    }
      
      // var total=0;
      // 
  });
</script> -->


@endsection