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
        $users = User::query();
        $roles = Role::withCount('users')->get();
        $offices = Office::withCount('users')->get();
        $user = auth()->user();

        if (!$user->isAdmin()) {
            if ($user->isIpd()) {
                $users->whereIn('office_id', $user->offices->pluck('id')->toArray() ?? []);
            }

            if ($user->isEncoder()) {
                $users->where('office_id', $user->office_id);
            }
        }

        if ($request->q) {
            $users = $users->whereRaw('LOWER(CONCAT(first_name, last_name)) like ? ','%' . trim(strtolower($request->q)) .'%');
        }

        if ($request->role) {
            $role = Role::findByName($request->role);
            $users->where('role_id', $role->id);
        }

        if ($request->office) {
            $office = Office::where('acronym', $request->office)->first();
            $users->where('office_id', $office->id);
        }

        $users = $users->paginate(10);

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
        $user->username = generate_username($request->email);
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
