<?php
namespace App\Src\Roles\Infrastructure;

use App\Http\Controllers\Controller;
use App\Src\Roles\Application\CreateRoleHandler;
use App\Src\Roles\Application\DeleteRoleHandler;
use App\Src\Roles\Application\FindRoleHandler;
use App\Src\Roles\Application\ListRolesHandler;
use App\Src\Roles\Application\UpdateRoleHandler;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $createRoleHandler;
    private $listRolesHandler;
    private $findRoleHandler;
    private $updateRoleHandler;
    private $deleteRoleHandler;

    public function __construct(CreateRoleHandler $createRoleHandler, ListRolesHandler $listRolesHandler, FindRoleHandler $findRoleHandler, UpdateRoleHandler $updateRoleHandler, DeleteRoleHandler $deleteRoleHandler)
    {
        $this->createRoleHandler = $createRoleHandler;
        $this->listRolesHandler = $listRolesHandler;
        $this->findRoleHandler = $findRoleHandler;
        $this->updateRoleHandler = $updateRoleHandler;
        $this->deleteRoleHandler = $deleteRoleHandler;
    }

    public function index()
    {
        $roles = $this->listRolesHandler->handle();
        return view('Roles::index', compact('roles'));
    }

    public function show(Request $request)
    {
        $role = $this->findRoleHandler->handle($request->route('role'));
        return view('Roles::show', compact('role'));
    }

    public function create()
    {
        return view('Roles::create', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        $this->createRoleHandler->handle($data);

        return redirect()->route('roles.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit(Request $request)
    {
        $role = $this->findRoleHandler->handle($request->route('role'));
        $roles = $this->listRolesHandler->handle();

        return view('Roles::edit', compact('role', 'roles'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
       
        $this->updateRoleHandler->handle($request->route('role'), $data);

        return redirect()->route('roles.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(Request $request)
    {
        $this->deleteRoleHandler->handle($request->route('role'));
        return redirect()->route('roles.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}