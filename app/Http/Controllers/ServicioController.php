<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;
use App\Mail\Contacto;
use Mail;

class ServicioController extends Controller
{
    public function show($id,$link)
    {
    	$servicio=Servicio::where('id_cms',$id)->where('id_lang',2)->first();
    	if($servicio->link_rewrite==$link)
    	{
    		return view('Tienda.servicio',['servicio'=>$servicio]);
    	}
    	else
    	{
    		abort(404, 'Page not found');
    	}
    }

    public function contacto(Request $request)
    {
        Mail::to('ventas@seguridad-nonex.com')->send(new Contacto($request->all()));
        return redirect('/');
    }
}
