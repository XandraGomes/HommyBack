<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Republic;

class RepublicController extends Controller
{
    public function createRepublic(Request $request){
        /*Função que cria uma republica*/
        $republic = new Republic;
        $request->$createRepublic($request);
        return response()->json($republic);
    }
    public function showRepublic($id){
        /*Função que mostra a republica atraves do id*/
        $republic = Republic::find($id);
        if ($republic){
            return response()->success($republic);
        } else{
            $dado = "informação não encontrada";
            return response()->erro($dado);
        }
    }
    public function listRepublic(Request $request){
        /*Função que lista todas as republicas cadastradas*/
        $republic = Republic::all();
        return response()->json($republic);
    }
    public function updateRepublic(Request $request, $id){
        /*Função que altera algum dado especifico de uma republica*/
        $republic = Republic::findOrFail($id);

        if($request->nameRepublic){
            $republic->nameRepublic = $request->nameRepublic;
        }
        if($request->address){
            $republic->address = $request->address;
        }
        if($request->bedroom){
            $republic->bedroom = $request->bedroom;
        }
        
        if($request->telephoneRepublic){
            $republic->dtelephoneRepublic = $request->telephoneRepublic;
        }
        
        if($request->description){
            $republic->description = $request->description;
        }
        if($request->acessibility){
            $republic->acessibility = $request->acessibility;
        }
        if($request->bathroom){
            $republic->bathroom = $request->bathroom;
        }
        if($request->rules){
            $republic->rules = $request->rules;
        }
        if($request->gender){
            $republic->gender = $request->gender;
        }
        if($request->facillity){
            $republic->facillity = $request->facillity;
        }
        $republic->save();
        return response()->json($republic);
        }
    
    public function deleteRepublic($id){
        /*Função que permite deletar a uma republica*/
        Republic::destroy($id);
        return response()->json(['Produto Deletado']);
    }

    public function returnDelete(Request $request){
        //Retorna os usuarios deletados
        $deletede = Republic::onlyTrashed()->get();
        return response()->json($deletede);
    }

    

    public function searchRepublic(Request $request) { 
        $republic = Republic::query(); // Gera um objeto do tipo Builder    like()
        if ($request->address)
            $republic->where('address','LIKE','%'.$request->address.'%');
        if ($request->nameRepublic)
            $republic->where('nameRepublic','LIKE','%'.$request->nameRepublic.'%');
        if ($request->bedroom)
            $republic->where('bedroom','<>','%'.$request->bedroom.'%');
        $search = $republic->get();
        return response()->json($search);
    }
    
    
}



// public function show($id){
    //     // filtra os nomesd das republicas e os seus enderessos
    //     $republic = Republic::where('id',$id)->first();
    //     if($republic){
    //         echo "<h1> Dados usuario </h1>";
    //         echo "<p>Nome: {$republic->nameRepublic} E-mail:{$republic->address}  Telefone:{$republic->telephoneRepublic} </p>";
    //     }
    // }

    // public function store(Request $request){
    //     $user = new App\User;
    //     $user->createUser($request);
    //     return response()->success($user);
    // }
