<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideojuegosController extends Controller
{
  public function index(){
    $titulo = 'Estos son mis vdeojugos favoritos';
    $videojuegos = ['castlevania', 'didi kong racing', 'minecraft', 'cod mobile', 'smite'];

    return view('videojuegos.index', array(
      'titulo' => $titulo,
      'videojuegos' => $videojuegos
    ));
  }
}
