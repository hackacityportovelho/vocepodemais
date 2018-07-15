<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ReceiverRequest;
use App\Point;
use App\Receiver;
use App\User;

class ReceiverController extends Controller
{
  public function index()
  {
    if (auth()->check()) {
      return redirect()->route('receiver.visualization');
    }

    return view('receiver.index');
  }

  public function info($id)
  {
    $model = Receiver::find($id);

    return view('receiver.info');
  }

  public function login(Request $request)
  {
    $email = $request->get('email');
    $password = $request->get('password');

    if( Auth::attempt(['email' => $email, 'password' => $password, 'reference_type' => 'receiver']) ) {
      return redirect()->route('receiver.visualization');
    }

    return redirect()->back()->withErrors(['login' => 'Usuário inválido']);
  }

  public function create()
  {
    return view('receiver.create');
  }

  public function store(ReceiverRequest $request)
  {
    $data = $request->except('password');
    $data['password'] = bcrypt($request->get('password'));

    $model = Receiver::create($data);
    $user = User::create($data);
    $user->update(['reference_type' => 'receiver', 'reference_id' => $model->id]);

    Auth::login($user);

    return redirect()->route('receiver.visualization');
  }

  public function visualization()
  {
    $id = auth()->user()->reference_id;

    $model = Receiver::find($id);

    return view('receiver.visualization', compact('model'));
  }

  public function pointStore(Request $request)
  {
    $model = Receiver::first();//find($id);
    $request->code = rand(0, 6);
    $point = $model->Points()->create($request->all());

    return redirect()->route('receiver.point.edit', ['id' => $point->id]);
  }

  public function pointEdit($id, Request $request)
  {
    $model = Point::find($id);

    return view('receiver.point.edit', compact('model'));
  }

  public function pointUpdate($id, Request $request)
  {
    $model = Point::find($id);
    $model->update($request->get('areas'));
    $model->Areas()->sync($request->get('areas', []));

    return redirect()->route('receiver.point.edit', $id);
  }

  public function points(Request $request)
  {
    $areas = $request->get('areas', '');

    if (empty($areas))
      return response()->json([]);

    $areas = explode(',', $areas);
    $points = Point::whereHas('Areas', function($query) use ($areas) {
      $query->whereIn('areas.id', $areas);
    })->get();

    $data = \App\Http\Resources\PointResource::collection($points);

    return response()->json($data);
  }
}
