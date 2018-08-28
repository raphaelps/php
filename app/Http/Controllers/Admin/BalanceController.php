<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;
use App\User;
//use Illuminate\Support\Facades\Request;

class BalanceController extends Controller
{
    public function index()
    {
        $balance = auth()->user()->balance;

        $amount = $balance ? $balance->amount : 0;

        return view('admin.balance.index', compact('amount'));
    }

    public function deposit()
    {
        return view('admin.balance.deposit');
    }

    public function depositStore(MoneyValidationFormRequest $request)
    {

        $balance = auth()->user()->balance()->firstorcreate([]);

        $response = $balance->deposit($request->value);

        if ($response['success'])
            return redirect()
            ->route('admin.balance')
            ->with('success', $response['message']);

        return redirect()->back()->with('error', $response['message']);

    }
    public function withdraw()
    {
        return view('admin.balance.withdraw');

    }
/*
classe para realizar o saque do dinheiro, usa um formrequest para obrigar a informar numero na solicitação

*/
    public function withdrawStore(MoneyValidationFormRequest $request)
    {

//        dd($request->all());

        $balance = auth()->user()->balance()->firstorcreate([]);

        $response = $balance->withdraw($request->value);

        if ($response['success'])
            return redirect()
            ->route('admin.balance')
            ->with('success', $response['message']);

        return redirect()->back()->with('error', $response['message']);

    }

    public function transfer()
    {

        return view('admin.balance.transfer');

    }
/*
classe para confirmar para quem sera enviado o dinheiro, faz a verificação do recebedor e se não esta enviando para a propria pessoa.
verifica o saldo do usuario para realizar a trasnferencia.
*/
    public function confirmTransfer(Request $request, User $user)
    {
        if(!$sender = $user->getSender($request->sender))
            return redirect()
                        ->back()
                        ->with('error','Usuario informado não encontrado');

        if($sender->id === auth()->user()->id)
            return redirect()
                        ->back()
                        ->with('error',' Não pode trasnferir para você mesmo');

        $balance = auth()->user()->balance;

        return view('admin.balance.transfer-confirm', compact('sender', 'balance'));

    }

    public function transferStore(MoneyValidationFormRequest $request, User $user)
    {
        if (!$sender = $user->find($request->sender_id))
            return redirect()
                        ->route('balance.transfer')
                        ->with('success', 'Recebedor Não Encontrado!');
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->transfer($request->value, $sender);
        if ($response['success'])
            return redirect()
                        ->route('admin.balance')
                        ->with('success', $response['message']);
        return redirect()
                    ->route('balance.transfer')
                    ->with('error', $response['message']);
    }

    public function historic(){

        $historics = auth()->user()->historics()->with(['userSender'])->get();

        return view('admin.historic.index', compact('historics'));
    }
}
