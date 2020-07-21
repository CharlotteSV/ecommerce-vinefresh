<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //Definiciones básicas----------
    protected $table = 'tb_pedido';
    protected $primaryKey = 'PED_CODIGO';
    /*public $incrementing = false;
    protected $keyType = 'string';*/    
    const CREATED_AT = 'PED_CREATED_AT';
    const UPDATED_AT = 'PED_UPDATED_AT';
    

    //Definición de relaciones----------
    /**
     * OneToMany Inverse
     * Recibir el horario de despacho del pedido
    */
    public function horarioDespacho()
    {
        return $this->belongsTo('App\HorarioDespacho', 'HOR_CODIGO', 'PED_CODIGO');
    }

    /**
     * OneToMany Inverse
     * Recibir la sucursal encargada del pedido
    */
    public function sucursal()
    {
        return $this->belongsTo('App\Sucursal', 'SUC_CODIGO', 'PED_CODIGO');
    }

    /**
     * OneToMany Inverse
     * Recibir al usuario que le pertenece el pedido
    */
    public function user()
    {
        return $this->belongsTo('App\User', 'USE_CODIGO', 'PED_CODIGO');
    }

    /**
     * OneToMany
     * Recibir el contenido del pedido
    */
    public function contenidoPedidos()
    {
        return $this->hasMany('App\ContenidoPedido', 'PED_CODIGO', 'CON_CODIGO');
    }

    //Definición de funciones SCOPE----------

    public function scopeBuscarpor($query, $tipo, $buscar){

        if( ($tipo) && ($buscar) ){
            return $query->where($tipo, 'like', "%$buscar%");
        }
    }
}
