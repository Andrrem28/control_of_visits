<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserStoreRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role as ModelsRole;

use function PHPUnit\Framework\returnSelf;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::all()
        ]);
    }

    public function create()
    {
        return view('admin.users.create', [
            'roles' => ModelsRole::all(),
        ]);
    }

    public function store(UserStoreRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
            ]);

            $user->assignRole($request->get('role_id'));

            notify()->success('Usuário criado com sucesso!', 'Informação!');

            DB::commit();

            return to_route('admin.users.index');
        } catch (Exception $e) {
            DB::rollBack();

            return to_route('admin.users.create');
        }

    }

    public function edit(string $userId)
    {
        return view('admin.users.edit', [
                    'user' => User::findOrFail($userId),
                    'roles' => ModelsRole::all(),
                ]);
    }

    public function update(UserStoreRequest $request, string $userId)
    {
        try {
            DB::beginTransaction();

            $user = User::findOrFail($userId);
            $user->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
            ]);

            $user->assignRole($request->get('role_id'));

            notify()->success('Usuário atualizado com sucesso!', 'Informação!');

            DB::commit();

            return to_route('admin.users.index');
        } catch (Exception $e) {
            DB::rollBack();

            return to_route('admin.users.edit', [$userId]);
        }
    }

    public function destroy(string $userId)
    {
        try {
            $user = User::findOrFail($userId);
            $user->delete();

            notify()->success('Usuário excluído com sucesso!', 'Informação!');

            DB::commit();

            return to_route('admin.users.index');
        } catch (Exception $e) {
            DB::rollBack();

            return to_route('admin.users.edit', [$userId]);
        }
    }

}
