<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medicamentosModel extends Model
{
    /* use AuthenticableTrait;
    use Notifiable; */
    
    protected $table = 'medicamentos';//Nombre de la tabla 
    protected $fillable = array('nombre','formula','subtotal','total');
    public $timestamps = false;
}
