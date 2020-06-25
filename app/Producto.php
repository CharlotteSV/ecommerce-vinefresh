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
    //const CREATED_AT = 'creation_date';
    //const UPDATED_AT = 'last_update';

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
}
