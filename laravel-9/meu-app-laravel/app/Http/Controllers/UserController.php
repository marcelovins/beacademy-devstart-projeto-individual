<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUserFormRequest;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
    
    // public function index() 
    // {
    //     $users = [
    //         'nomes' => ['José Lira', 
    //                     'Marcelo Almeida'
    //         ]
    //     ];

    //     dd($users);
    // }

    public function index() 
    {
        $users = User::paginate(5);

        // dd($users);
        return view('users.index', compact('users'));

    }

    public function show($id) 
    {
        // $user = User::find($id);

        // return $user;

        if(!$user = User::find($id))
            return redirect()->route('users.index');
        
        $title = $user->name;

        return view('users.show', compact('user', 'title'));
        
    }

    

    public function create() 
    {
        
        return view('users.create');

    }

    public function store(StoreUpdateUserFormRequest $request) 
    {
        // dd($request->all());
    //    $user = new User;
    //    $user->name = $request->name;
    //    $user->email = $request->email;
    //    $user->password = bcrypt($request->password);
    //    $user->save(); //maneira 1 de fazer chamada de dados para o banco;

    $data = $request->all();
    $data['password'] = bcrypt($request->password);

    if($request->image){
        $file = $request['image'];
        $path = $file->store('profile', 'public');
        $data['image'] = $path;
    };

    
    $this->model->create($data);

       return redirect()->route('users.index');

    }

    public function edit($id) 
    {

        if(!$user = $this->model->find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));
        
    }

    public function update(StoreUpdateUserFormRequest $request, $id) 
    {

        if(!$user = $this->model->find($id))
            return redirect()->route('users.index');
        
        $data = $request->only('name', 'email');
        if($request->password)
        $data['password'] = bcrypt($request->password);

        $user->update($data);

        return redirect()->route('users.index');
        
    }

    public function destroy($id) 
    {

        if(!$user = $this->model->find($id))
            return redirect()->route('users.index');
        
        $user->delete();
        
        return redirect()->route('users.index');
        
    }
}


// php artisan optimize (para limpar cache)
