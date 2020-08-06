<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //Definiciones básicas----------
    protected $table = 'tb_producto';
    protected $primaryKey = 'PRO_CODIGO';
    //public $incrementing = false;
    //protected $keyType = 'string';
    const CREATED_AT = 'PRO_CREATED_AT';
    const UPDATED_AT = 'PRO_UPDATED_AT';

    //Definición de relaciones----------
    /**
     * OneToMany Inverse
     * Recibir la sucursal del producto
    */
    public function sucursal()
    {
        return $this->belongsTo('App\Sucursal', 'SUC_CODIGO', 'PRO_CODIGO');
    }
    
    /**
     * OneToMany Inverse
     * Recibir el formato de medida del producto
    */
    public function formatoMedida()
    {
        return $this->belongsTo('App\FormatoMedida', 'FOR_CODIGO', 'PRO_CODIGO');
    }

    /**
     * OneToMany
     * Recibir todos los contenido a los cuales pertenece el producto
    */
    public function contenidoPedidos()
    {
        return $this->hasMany('App\ContenidoPedido', 'PRO_CODIGO', 'CON_CODIGO');
    }

    //Definición de funciones SCOPE----------

    public function scopeBuscarpor($query, $tipo, $buscar){

        if( ($tipo) && ($buscar) ){
            return $query->where($tipo, 'like', "%$buscar%");
        }
    }
}
