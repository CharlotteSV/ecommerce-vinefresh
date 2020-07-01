<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorarioDespacho extends Model
{
    //Definiciones básicas---------- 
    protected $table = 'tb_horariodespacho';
    protected $primaryKey = 'HOR_CODIGO';
    public $timestamps = false;
    /*public $incrementing = false;
    protected $keyType = 'string';
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
    */

    //Definición de relaciones-----------
    /**
     * OneToMany Inverse
     *  Recibir la zona a la cual pertenece ese horario de despacho
    */
    public function zona()
    {
        return $this->belongsTo('App\Zona', 'ZON_CODIGO', 'HOR_CODIGO');
    }

    /**
     * OneToMany
     * Recibir los pedidos a despachar en ese horario
    */
    public function pedidos()
    {
        return $this->hasMany('App\Pedido', 'HOR_CODIGO', 'PED_CODIGO');
    }
}
