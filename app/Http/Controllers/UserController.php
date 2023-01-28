<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $users = User::with('account')->where('account_id', Auth::user()->account_id)->get();
        return view('auth.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return RedirectResponse
     *
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        try {
            $user = User::create($validated);
            if ($user) {
                return to_route('users.index')
                    ->with(['status' => 'Utente aggiunto correttamente',
                        'alert_type' => 'success'
                    ]);
            }
        } catch (Exception $exception) {
            abort(505, $exception);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return View
     */
    public function show(User $user)
    {
        return view('auth.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(User $user)
    {
        return view('auth.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->update($validated);

        return redirect()->route('users.show', ['user' => $user])
            ->with('status', 'Utente modificato correttamente')
            ->with('alert_type', 'success');
    }

    public function updatepsw(UpdatePasswordRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            return redirect()->route('users.show', ['user' => $user])
                ->with('status', 'Password modificata')
                ->with('alert_type', 'success');
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(User $user)
    {
        if (Auth::id() != $user->id) {
            $user->delete();

            return redirect()->route('users.index')->with('status', 'Utente eliminato correttamente');
        } else {
            return redirect()->route('users.index')->with('status', 'Non puoi eliminare te stesso');
        }
    }
}
