<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class Usercontroller extends Controller
{
  public function pruebas(Request $request){
    return "Accion de pruebas USER-CONTROLLER";
  }

  public function register(Request $request){

    //json  {"name":"abel","nameTag":"arestk","email":"abel@abel.com","password":"abel12345"}
    // recoger datos del usuario por Post
    $json = $request->input('json', null);
    $params = json_decode($json);
    $params_array = json_decode($json, true);

    if (!empty($params) && !empty($params_array)) {
      //limpiar datos
      $params_array = array_map('trim', $params_array);
      //validar datos
      $validate = \Validator::make($params_array,[
        'name'      =>  'required|alpha|unique:users',
        'nameTag'   =>  'required|alpha',
        'email'     =>  'required|email|unique:users',
        'password'  =>  'required'
      ]);
      if($validate->fails()){
        $data = array(
          'status'  => 'error',
          'code'    =>  404,
          'message' => 'el usuario no se a creado',
          'errors'  => $validate->errors()
        );
      }else{
        //cifrar la password
        $pwd = password_hash($params->password, PASSWORD_BCRYPT, ['cost'=> 10]);
        //crear el usuario
        $user = new User();
        $user->name = $params_array['name'];
        $user->nameTag = $params_array['nameTag'];
        $user->email = $params_array['email'];
        $user->password = $pwd;
        $user->role = 'ROLE_USER';
        //guardar usuario
        $user->save();

        $data = array(
          'status'  => 'success',
          'code'    =>  200,
          'message' => 'el usuario se ha creado correctamente',
          'user' => $user,
        );
      }
    }else{
      $data = array(
        'status'  => 'error',
        'code'    =>  404,
        'message' => 'Los Datos no son correctos'
      );
    }

    //cifrar la password

    //comprobar usuario

    //crear el usuario


    return response()->json($data, $data['code']);
  }

  public function login(Request $request){
    return "Accion de login de ususario ";
  }

}
