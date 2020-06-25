<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    //Definiciones básicas----------
    protected $table = 'tb_sucursal';
    protected $primaryKey = 'SUC_CODIGO';
    /*public $incrementing = false;
    protected $keyType = 'string';
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
    */

    //Definición de relaciones-----------
    /**
     * OneToMany
     * Recibir los productos de la sucursal
    */
    public function productos()
    {
        return $this->hasMany('App\Producto', 'SUC_CODIGO', 'PRO_CODIGO');
    }

    /**
     * OneToMany
     * Recibir los pedidos de la sucursal
    */
    public function pedidos()
    {
        return $this->hasMany('App\Pedido', 'SUC_CODIGO', 'PED_CODIGO');
    }
}
