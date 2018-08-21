<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;
use App\User;

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

    public function confirmTransfer(Request $request, User $user)
    {
        $sender = $user->getSender($request->sender);
        dd($sender);
/*
        $balance = auth()->user()->balance()->firstorcreate([]);

        $response = $balance->transfer($request->value);

        if ($response['success'])
            return redirect()
            ->route('admin.balance')
            ->with('success', $response['message']);

        return redirect()->back()->with('error', $response['message']);
*/
    }





}
