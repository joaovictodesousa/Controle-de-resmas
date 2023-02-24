<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitacao;



class SolicitacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $solicitacao = new Solicitacao();
        $solicitacao->id_setor = $request->input('id_setor');
        $solicitacao->quant_resmas = $request->input('quant_resmas');
        $solicitacao->id_users =  $request->input('id_users');
        $solicitacao->save();
    }

    // {
    //     $post = $request->all();
    //     if($post){
    //     $solicitacao = new Solicitacao();
    //     $solicitacao->id_setor = $post ['id_setor'];
    //     $solicitacao->matricula = $post ['matricula'];
    //     $solicitacao->nome = $post ['nome'];
    //     $solicitacao->quant_resmas = $post ['quant_resmas'];
    //     $solicitacao->id_users =  $post ['id_users'];
    //     $solicitacao->save();
    //     }
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_setor' => 'required|integer',
            'nome' => 'required|regex:/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/',
            'matricula' => 'required |min: 5| max: 7',
            'quant_resmas' => 'required|integer',
            'id_users' => 'required|integer'
<<<<<<< HEAD

        ],
        [
            'id_setor.required' => 'O campo setor é obrigatório',
            'nome.required' => 'O campo nome é obrigatório',
            'matricula' => 'O campo matricula é obrigatório',
            'quant_resmas' => 'O campo quantidade de resmas é obrigatório'
=======
        ] //colocando o mensagens personalizadas
        ,[
            'id_setor.integer' =>  'O campo Setor é obrigatório.',
            'nome.required' => 'O campo Nome é obrigatório',
            'matricula' => 'O campo Matrícula é obrigatório',
            'quant_resmas' => 'O campo Quantidade de Resmas é obrigatório',
>>>>>>> 30cef7c1ae961bfaabb4a6263123dbc8e87bced5
        ]);

        Solicitacao::create($request->all());

        return redirect()->route('historico')->with('msg','Salvo com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $solicitacao = Solicitacao::findOrFail($id);
        // $solicitacao-> delete();

        // return "Solicitação excluida";
    }
}

