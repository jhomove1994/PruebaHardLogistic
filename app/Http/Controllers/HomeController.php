<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStore;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $filter = $request->query('filter');

        if (!empty($filter)) {
            $users = User::where('dni', 'like', '%'.$filter.'%')
                            ->orWhere('name', 'like', '%'.$filter.'%')
                            ->orWhere('last_name', 'like', '%'.$filter.'%')
                            ->paginate(10);
        } else {
            $users = User::orderBy('id','DESC')->paginate(10);
        }
        return view('welcome', compact('users', 'filter'));
    }

    public function create() {
        return view('user.create');
    }

    public function store(UserStore $request) {
        User::create($request->validated());
        Session::flash('success', 'User saved!');
        return redirect('/');
    }

    public function edit(User $user) {
        return view('user.edit', compact('user'));
    }

    public function update(UserStore $request, User $user) {
        $user->update($request->validated());
        Session::flash('success', 'User updated!');
        return redirect('/');
    }

    public function destroy(User $user) {
        $user->delete();
        Session::flash('success', 'User deleted!');
        return redirect('/');
    }
}
