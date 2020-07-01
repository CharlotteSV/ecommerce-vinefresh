<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    //Definiciones básicas---------- 
    protected $table = 'tb_zona';
    protected $primaryKey = 'ZON_CODIGO';
    public $timestamps = false;
    /*public $incrementing = false;
    protected $keyType = 'string';
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
    */

    //Definición de relaciones-----------
    /**
     * OneToMany Inverse
     * Recibir la sucursal a la que pertenece la zona
    */
    public function sucursal()
    {
        return $this->belongsTo('App\Sucursal', 'SUC_CODIGO', 'ZON_CODIGO');
    }

    /**
     * OneToMany
     *  Recibir los horarios de despacho de la zona
    */
    public function horariosDespacho()
    {
        return $this->hasMany('App\HorarioDespacho', 'ZON_CODIGO', 'HOR_CODIGO');
    }

}
