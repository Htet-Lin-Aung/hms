<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\Interfaces\RoleInterface;
use App\Repositories\Interfaces\UserInterface;

class UserController extends Controller
{

    private $userRepository;
    private $roleRepository;

    public function __construct(UserInterface $userRepository, RoleInterface $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->allUsersWithPaginate(10);

        $roles = $this->roleRepository->allRoles();
        return view('user.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleRepository->allRoles();
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $status = $this->userRepository->storeUser($request);

        $message = ($status) ? 'User Created Successfully' : 'User Creation Failed';

        // toast($message,$status ? 'success' : 'error');

        return redirect()->route('admin.user.index')->with('success',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->getUserDetails($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->getUserDetails($id);

        $roles = $this->roleRepository->allRoles();

        return view('user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $status = $this->userRepository->UpdateUser($request, $id);

        $message = ($status) ? 'User Updated Successfully' : 'User Updation Failed';


        // toast($message,$status ? 'success' : 'error');

        return redirect()->route('admin.user.index')->with('success',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = $this->userRepository->destroyUser($id);

        $message = ($status) ? 'User deleted Successfully' : 'User deletion Failed';

        // toast($message,$status ? 'success' : 'error');

        return redirect()->route('admin.user.index')->with('success',$message);
    }
}
