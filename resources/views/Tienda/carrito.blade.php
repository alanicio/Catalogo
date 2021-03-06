@extends('principal')
@section('content')
<div class="card" style="width: 75%;">
  <div class="card-header">
    <h4>Carrito <i class="fas fa-cart-arrow-down"></i></h4>
  </div>
  <div class="card-body">
  		<form method="POST" action="{{Route('direccion.create')}}">
  			@csrf
	    	<table class="table">
				<thead>
					<tr>
					  <th scope="col">Producto</th>
					  <th scope="col">Precio unitario</th>
					  <th scope="col">Cantidad</th>
					  <th scope="col">Total</th>
					  <th scope="col">Eliminar</th>
					</tr>
				</thead>
				<tbody>
					@php
						$total=0;
						//dd();
					@endphp
					@foreach($productos as $p)
						
						<input type="hidden" name="id[]" value="{{$p->id}}">
						<tr id="row{{$p->id}}">
						  <th scope="row">{{stripslashes(utf8_decode($p->titulo))}}</th>
						  <td><input id="costo{{$p->id}}" type="text" value="${{ number_format($p->costoMXN,2)}}" readonly="" style="width: 150px"></td>
						  <td><input type="number" name="cantidad[]" id="{{$p->id}}" min="1" value="{{Session::get('cantidadSeleccionada'.$p->id)>0?Session::get('cantidadSeleccionada'.$p->id):1}}" style="width: 75px;"></td>
						  <td id="total{{$p->id}}">${{number_format((Session::get('cantidadSeleccionada'.$p->id)>0?($p->costoMXN)*Session::get('cantidadSeleccionada'.$p->id):$p->costoMXN),2)}}</td>
						  <td><a id="minus{{$p->id}}"><i class="fas fa-minus-circle" style="color:red;"></i></a></td>
						</tr>
						@php
						if(Session::get('cantidadSeleccionada'.$p->id)>0)
						{
							$total+=(($p->costoMXN)*Session::get('cantidadSeleccionada'.$p->id));
						}
						else
						{
							$total+=$p->costoMXN;
						}
						@endphp
					@endforeach
					<tr>
						<th scope="row">Total</th>
						<td ID="Ftotal">${{number_format($total,2)}}</td>
					</tr>
				</tbody>
			</table>
			@if($productos->count())
				<input type="submit" value="Concretar compra">
			@endisset
		</form>
  </div>
</div>

<script type="text/javascript">
	$('#inicio').prop("class","nav-item");
	$('#tienda').prop("class","nav-item");
	$('#carrito').prop("class","nav-item active");
	$('#usuario').prop("class","nav-item dropdown");
	$('#sesion').prop("class","nav-item dropdown");
</script>

<script type="text/javascript">
	$('a').click(function(){
		var row=$(this).attr('id').substring(5);
		$.ajax({
	        type: "GET",
	        url: '{{url("/quitar_carrito")}}'+'/'+row,
	        success: function(res){
	        	var sustraendo=parseFloat($('#total'+row).html().replace('$',''));
	        	$('#row'+row).remove();
	        	var minuendo=parseFloat($('#Ftotal').html().replace('$',''));
	        	$('#Ftotal').html('$'+res.Ftotal);
	        	if(res.Ftotal==0)
	        	{
	        		$('input[type="submit"]').remove();
	        	}
	        },
	    });

	});


	$('input').change(function(){
		// console.log(this.defaultValue);
		var fila=$(this).attr('id');
		var total=$('#Ftotal').html().replace('$','');
		total=total.replace(',','');
		//console.log(total);
		var cantidad=-1*(parseInt(this.value)-parseInt(this.defaultValue));
		this.defaultValue=this.value;
		$.ajax({
	        type: "POST",
	        url: '{{url("/convert_c")}}',
	        data:{id:fila,cantidad:cantidad,numU:this.value,Ftotal:total},
	        success: function(res){
	        	if(res.status)
	        	{
	        		$('#total'+fila).html('$'+res.total);
		        	$('[id^=total]').each(function(index){
		        		//console.log($(this).html())
		        		total+=parseFloat($(this).html().replace('$',''));
		        	});
		        	//console.log(total);
		        	$('#Ftotal').html('$'+res.Ftotal);
		        	$('#'+fila).defaultValue=$('#'+fila).value;
		        	 
	        	}
	        	else
	        	{
	        		$('#'+fila).attr('readonly', true);
	        		swal("Existencias insuficientes", "¡No disponemos de las existencias suficientes!", "error")
					.then((value) => {
					  location.reload(true);
					});
	        		// swal("Existencias insuficientes", "¡No disponemos de las existencias suficientes!", "error");
	       //  		setTimeout(function(){
				    //     location.reload(true);
				    // }, 2000);
	        		
	        	}

		        	
	        },
	    });
	});
</script>
@endsection