<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Inertia\Inertia;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\User\UserRequest;

class UserController extends Controller
{

    public function __construct(protected UserService $userService){
        // code
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usersPaginate = $this->userService->getPaginateData();

        return Inertia::render('User/Index', [
            'users' => $usersPaginate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('User/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        $this->userService->storeOrUpdateData($validated);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return Inertia::render('User/Edit', [
            "user" => new UserResource($user)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $validated = $request->validated();
        $this->userService->storeOrUpdateData($validated, $user->id);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->userService->destroy($user);

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
