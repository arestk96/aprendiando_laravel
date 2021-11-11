<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\category;
class PruebasController extends Controller
{
    public function index(){
      $titulo = 'Animales';
      $animales = ['Perro', 'Gato', 'tigre'];

      return view('pruebas.index', array(
        'titulo' => $titulo,
        'animales' => $animales
      ));
    }

    public function testORM(){
/*
      $posts = post::all();
      foreach ($posts as $post){
        echo "<h1>".$post->title."</h1>";
        echo "<span style = 'color:green;'>{$post->user->name} - {$post->category->name}</span>";
        echo "<p>".$post->content."</p>";
        echo '<hr>';
      }*/

      $categories = Category::all();
      foreach ($categories as $category) {
        echo "<h1>{$category->name}</h1>";
        foreach ($category->posts as $post){
          echo "<h4>".$post->title."</h4>";
          echo "<span style = 'color:green;'>{$post->user->name} - {$post->category->name}</span>";
          echo "<p>".$post->content."</p>";
        }
        echo '<hr>';
      }
      die();
    }
}
