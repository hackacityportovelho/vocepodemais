<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\DonatorRequest;
use Illuminate\Support\Facades\Auth;

use App\Donator;
use App\User;

class DonatorController extends Controller
{
  public function index()
  {
    if (auth()->check()) {
      return redirect()->route('donator.visualization');
    }
    return view('donator.index');
  }

  public function login(Request $request)
  {
    $email = $request->get('email');
    $password = $request->get('password');

    if( Auth::attempt(['email' => $email, 'password' => $password, 'reference_type' => 'donator']) ) {
      return redirect()->route('donator.visualization');
    }

    return redirect()->back()->withErrors(['login' => 'Usuário inválido']);

  }

  public function create()
  {
    return view('donator.create');
  }

  public function store(DonatorRequest $request)
  {
    $data = $request->except('password');
    $data['password'] = bcrypt($request->get('password'));

    $model = Donator::create($data);
    $user = User::create($data);
    $user->update(['reference_type' => 'donator', 'reference_id' => $model->id]);

    Auth::login($user);

    return redirect()->route('donator.visualization');
  }

  public function visualization()
  {
    return view('donator.visualization');
  }
}
