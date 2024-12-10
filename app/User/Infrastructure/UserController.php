<?php

namespace App\User\Infrastructure;


use App\Http\Controllers\Controller;
use App\Models\Role;
use App\User\Application\CreateUserHandler;
use App\User\Application\DeleteUserHandler;
use App\User\Application\FindUserHandler;
use App\User\Application\ListUsersHandler;
use App\User\Application\UpdateUserHandler;
use Illuminate\Http\Request;
use Log;

class UserController extends Controller
{
    private $createUserHandler;
    private $listUsersHandler;
    private $findUserHandler;
    private $updateUserHandler;
    private $deleteUserHandler;

    public function __construct(CreateUserHandler $createUserHandler, ListUsersHandler $listUsersHandler, FindUserHandler $findUserHandler, UpdateUserHandler $updateUserHandler, DeleteUserHandler $deleteUserHandler)
    {
        $this->createUserHandler = $createUserHandler;
        $this->listUsersHandler = $listUsersHandler;
        $this->findUserHandler = $findUserHandler;
        $this->updateUserHandler = $updateUserHandler;
        $this->deleteUserHandler = $deleteUserHandler;
    }

    public function index()
    {
        $users = $this->listUsersHandler->handle();
        return view('Users::index', compact('users'));
    }

    public function show(Request $request)
    {
        $user = $this->findUserHandler->handle($request->route('user'));
        return view('Users::show', compact('user'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('Users::create', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        $this->createUserHandler->handle($data);

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit(Request $request)
    {
        $roles = Role::all();
        $user = $this->findUserHandler->handle($request->route('user'));

        return view('Users::edit', compact('user', 'roles'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
       
        $this->updateUserHandler->handle($request->route('user'), $data);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(Request $request)
    {
        $this->deleteUserHandler->handle($request->route('user'));
        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}