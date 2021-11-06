<?php

namespace App\Http\Controllers;

use App\Events\UserCreated;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Office;
use App\Models\Role;
use App\Models\User;
use App\Notifications\UserDeactivatedNotification;
use App\Notifications\UserUpdatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class,'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = new User;

        $roles = Role::withCount(['users' => function ($query) {
            $query->byRole();
        }])->get();
        $offices = Office::withCount(['users' => function ($query) {
            $query->byRole();
        }])->get();

        $user = $user->byRole();

        if ($request->role) {
            $role = Role::findByName($request->role);
            $user = $user->where('role_id', $role->id);
        }

        if ($request->office) {
            $office = Office::where('acronym', $request->office)->first();
            $user = $user->where('office_id', $office->id);
        }

        if ($request->q) {
            $user = User::search($request->q)->constrain($user);
        }

        $users = $user->paginate();

        return view('users.index', compact('users', 'roles','offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $offices = Office::all();
        $roles = Role::all();

        return view('users.create', compact('offices','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $password = nanoid(8);

        $user = new User($request->validated());
        $user->password = Hash::make($password);
        $user->save();

        if ($request->activate) {
            $user->activate();
        }

        event(new UserCreated($user, $password));

        session()->flash('status', 'success|Successfully created user');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Request $request)
    {
        $tab = 'profile';

        if ($request->tab) {
            $tab = $request->tab;
        }

        return view('users.show', compact('user', 'tab'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'))
            ->with(['offices'=> Office::all(), 'roles' => Role::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        if ($request->offices) {
            $user->offices()->sync($request->offices);
        }

        $user->notify(new UserUpdatedNotification(auth()->id()));

        session()->flash('status', 'success|Successfully updated user');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // soft delete the user
        // this is better approach
        // to prevent deletion of PAPs by deleted users
        $user->deactivate();

        // TODO: Notify User
        $user->notify(new UserDeactivatedNotification);

        session()->flash('status', 'success|Successfully deactivated user');

        return redirect()->route('users.index');
    }
}
