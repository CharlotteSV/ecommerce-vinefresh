<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorarioDespacho extends Model
{
    //Definiciones básicas---------- 
    protected $table = 'tb_horariodespacho';
    protected $primaryKey = 'HOR_CODIGO';
    /*public $incrementing = false;
    protected $keyType = 'string';
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
    */

    //Definición de relaciones-----------
    /**
     * TERMINAR
    */
    public function zona()
    {
        return $this->hasMany('App\Pedido', 'HOR_CODIGO', 'PED_CODIGO');
    }

    /**
     * OneToMany Inverse
     * Recibir los pedidos a despachar en ese horario
    */
    public function pedidos()
    {
        return $this->hasMany('App\Pedido', 'HOR_CODIGO', 'PED_CODIGO');
    }
}
