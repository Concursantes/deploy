<?php

namespace App\Http\Controllers;
use App\Models\User;

use Spatie\Permission\Traits\HasRoles;

use Illuminate\Http\Request;

class UsersController extends Controller
{

	const PERMISSIONS = [
		'create' => 'admin-user-create',
		'show' => 'admin-user-show',
		'edit' => 'admin-user-edit',
		'edit-image' => 'admin-user-image',
	];

	public function __construct()
	{
		$this->middleware('permission:'.self::PERMISSIONS['create'])->only(['create', 'store']);
		$this->middleware('permission:'.self::PERMISSIONS['show'])->only(['index', 'show']);
		$this->middleware('permission:'.self::PERMISSIONS['edit'])->only(['edit', 'update']);
		$this->middleware('permission:'.self::PERMISSIONS['edit-image'])->only('image');
	}

	

	public function index()
	{
		$users = User::paginate();

		return view('admin.user.index', [
			'users' => $users,
		]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('admin.user.create', [
            // 'row' => $user
    	]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
    	$row = new User();
    	$row->fill($request->all());
    	$row->password = bcrypt($request->username);


        $row->created_by         = 1; // TODO Eliminar este paso porque obtendra del usuario en sesión
        $row->updated_by         = 1; // TODO Eliminar este paso porque obtendra del usuario en sesión
        $row->save();

        return redirect()->route('admin.user.show', $row->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
    	return view('admin.user.show', [
    		'row' => $user
    	]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
    	$user->fill($request->all())->save();

    	return redirect()->route('admin.user.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
