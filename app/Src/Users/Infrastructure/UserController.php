<?php
namespace App\Src\Users\Infrastructure;

use App\Http\Controllers\Controller;
use App\Src\Roles\Domain\RoleRepositoryInterface;
use App\Src\Users\Application\CreateUserHandler;
use App\Src\Users\Application\DeleteUserHandler;
use App\Src\Users\Application\FindUserHandler;
use App\Src\Users\Application\ListUsersHandler;
use App\Src\Users\Application\UpdateUserHandler;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $createUserHandler;
    private $listUsersHandler;
    private $findUserHandler;
    private $updateUserHandler;
    private $deleteUserHandler;
    private $roleRepository;

    public function __construct(CreateUserHandler $createUserHandler, ListUsersHandler $listUsersHandler, FindUserHandler $findUserHandler, UpdateUserHandler $updateUserHandler, DeleteUserHandler $deleteUserHandler, RoleRepositoryInterface $roleRepository)
    {
        $this->createUserHandler = $createUserHandler;
        $this->listUsersHandler = $listUsersHandler;
        $this->findUserHandler = $findUserHandler;
        $this->updateUserHandler = $updateUserHandler;
        $this->deleteUserHandler = $deleteUserHandler;
        $this->roleRepository = $roleRepository;
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
        $roles = $this->roleRepository->list();
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
        $roles = $this->roleRepository->list();
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