<?php

namespace App\Http\Controllers;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Foudation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

use App\User;
use App\Republic;
Use App\Comment;

class UserController extends Controller
{
    public function createUser(Request $request){
        /*Função que cria um usuario*/
        $user = new User;
        $user->createUser($request);
        return response()->json($user);
    }
    public function showUser($id){
        /*Função que mostra o usuario por id*/
        $user = User::find($id);
        if ($user){
            return response()->success($user);
        } else{
            $dado = "informação não encontrada";
            return response()->erro($dado);
        }
    }
    public function listUser(){
        /*Função que lista todos os usuarios*/
        $user = User::all();
        return response()->json($user);
    }
    public function updateUser(Request $request, $id){
        /*Função que permite um usuario alterar algum dado específico*/
        $user = Republic::findOrFail($id);

        if($request->name){
            $user->name = $request->name;
        }
        if($request->email){
            $user->email = $request->email;
        }
        if($request->email_verified_at){
            $user->email_verified_at = $request->email_verified_at;
        }
        
        if($request->password){
            $user->password = $request->password;
        }
        $user->save();
        return reponse()->json($user);
        }
    public function deleteRepublic($id){
        /*Função que permite um usuário ser deletado*/
        Republic::destroy($id);
        return reponse()->json(['usuario Deletado']);
    }
    public function construct(){
        $this->middleware('delete');
    }
    
   
}
