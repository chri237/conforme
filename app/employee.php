<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



/**
 * Class Procedures
 * @package App
 *
 * @var array
 */

class employee extends Model
{

  protected $fillable =[  'nom', 'prenom', 'login','password', 'poste','whatsapp','tel1', 'tel2', 'email'];
  public $timestamp = false;

}
