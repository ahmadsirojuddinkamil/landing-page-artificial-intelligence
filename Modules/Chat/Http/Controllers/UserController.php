<?php

namespace Modules\Chat\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Chat\Entities\User;
use Modules\Chat\Http\Requests\{CreateUserRequest, UpdateUserRequest};
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $userLatest = User::latest();

        if (request('search')) {
            $userLatest->where('name', 'like', '%' . request('search') . '%');
        }

        if (request('role') && request('role') == 'admin') {
            $userLatest->whereHas('roles', function ($query) {
                $query->where('name', 'admin');
            });
        }

        $admin = getAdmin();
        $title = 'Dashboard | User Manager';
        $allUser = $userLatest->paginate(8);
        $userNow = getUserNow();
        $user = User::all();

        // notifikasi
        $totalNotifikasi = getTotalNotifikasiUser();
        $listNotifikasi = getListNotifikasi();

        return view('chat::pages.user.index', compact('admin', 'title', 'allUser', 'userNow', 'user', 'totalNotifikasi', 'listNotifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $admin = getAdmin();
        $title = 'Dashboard | Tambah User Baru';
        $userNow = getUserNow();

        // notifikasi
        $totalNotifikasi = getTotalNotifikasiUser();
        $listNotifikasi = getListNotifikasi();

        return view('chat::pages.user.create', compact('admin', 'title', 'userNow', 'totalNotifikasi', 'listNotifikasi'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateUserRequest $request)
    {
        $validateData = $request->validated();

        $raw = $request->password;

        $validateData['password'] = bcrypt($raw);

        $user = User::create($validateData);

        $roleName = $request->input('role');

        $role = Role::where('name', $roleName)->first();

        $user->assignRole($role);

        return redirect('/user')->with('success', 'User baru berhasil ditambahkan!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(User $user)
    {
        $admin = getAdmin();
        $userNow = getUserNow();
        $title = 'Dashboard | Detail Data User';
        $detail = $user;

        // notifikasi
        $totalNotifikasi = getTotalNotifikasiUser();
        $listNotifikasi = getListNotifikasi();

        return view('chat::pages.user.show', compact('admin', 'userNow', 'title', 'detail', 'totalNotifikasi', 'listNotifikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(User $user)
    {
        $admin = getAdmin();
        $userNow = getUserNow();
        $title = 'Dashboard | User Edit Profile';
        $dataUser = $user;

        // notifikasi
        $totalNotifikasi = getTotalNotifikasiUser();
        $listNotifikasi = getListNotifikasi();

        return view('chat::pages.user.edit', compact('admin', 'userNow', 'title', 'dataUser', 'totalNotifikasi', 'listNotifikasi'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // return $request;

        $validateData = $request->validated();

        // Cek apakah input password lama atau baru
        if ($validateData['password'] == $user->password) {
            $validateData['password'] = $user->password;
        } else {
            $raw = $request->password;
            $validateData['password'] = bcrypt($raw);
        }

        User::where('id', $user->id)->update($validateData);

        $roleName = $request->input('role');

        $role = Role::where('name', $roleName)->first();

        $updatedUser = User::find($user->id);

        $updatedUser->syncRoles([$role]);

        return redirect('/user')->with('success', 'Data user berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('/user')->with('success', 'Data user berhasil dihapus!');
    }
}
