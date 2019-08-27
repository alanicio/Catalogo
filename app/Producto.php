<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='ps_product_lang';
    // protected $fillable = [
    //     'modelo',
    //     'marca',
    //     'titulo',
    //     'costoMXN',
    //     'costoUSD',
    //     'peso',
    //     'imagen',
    //     'descripcion',
    //     'categoria_id',
    //     'inventario'
    // ];

    // public function categoria(){
    //     return $this->belongsTo('App\Categoria','categoria_id');
    // }
    public function data(){
        return $this->hasOne('App\ProductoData','id_product');
    }
}
