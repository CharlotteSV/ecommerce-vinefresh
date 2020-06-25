<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormatoMedida extends Model
{
    //Definiciones básicas---------- 
    protected $table = 'tb_formatomedida';
    protected $primaryKey = 'FOR_CODIGO';
    /*public $incrementing = false;
    protected $keyType = 'string';
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
    */

    //Definición de relaciones----------
    /**
     * OneToMany
     * Recibir los productos con este formato de medida
    */
    public function productos()
    {
        return $this->hasMany('App\Producto', 'FOR_CODIGO', 'PRO_CODIGO');
    }
}
