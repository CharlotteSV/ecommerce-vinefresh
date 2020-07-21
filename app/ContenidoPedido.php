<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContenidoPedido extends Model
{
    //Definiciones básicas----------
    protected $table = 'tb_contenidopedido';
    protected $primaryKey = 'CON_CODIGO';
    //public $incrementing = false;
    //protected $keyType = 'string';
    //const CREATED_AT = 'PRO_CREATED_AT';
    //const UPDATED_AT = 'PRO_UPDATED_AT';

    //Definición de relaciones----------
    /**
     * OneToMany Inverse
     * Recibir el pedido al cual pertenece el contenido pedido
    */
    public function pedido()
    {
        return $this->belongsTo('App\Pedido', 'PED_CODIGO', 'CON_CODIGO');
    }
    
    /**
     * OneToMany Inverse
     * Recibir el producto del contenido pedido
    */
    public function producto()
    {
        return $this->belongsTo('App\Producto', 'PRO_CODIGO', 'CON_CODIGO');
    }
}
