<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\ Http \ Exceptions\ PostTooLargeException;

class UsersController extends Controller
{
        // public function __construct()
        // {
        //     $this->middleware(['auth' , 'verified']);
        // }
        public function __construct()
        {
            $this->middleware('auth');
        }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index')->with('users' , User::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'name'     => 'required',
            'email'    => 'required',
            'admin'    => 'required',
            'image'    => 'image',
        ]);

        if($image = $request->file('image'))
        {
            $imagePath = 'images/avatar/';
            $imageNmae = date('Ymd_hi') . "_" . "avatar" . rand(0 , 1000) . $image->getClientOriginalExtension();
            $image->move($imagePath , $imageNmae);
            $request['image'] = $imageNmae;
        }
        $password = 'password';

       $user =  User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'admin'    => $request->admin,
            'image'    => $request->image,
            'password' => $password,
        ]);

        // create new profile for user
        Profile::create([
            'user_id' => $user->id,
            'avatar'  => '1.webp',
        ]);

        return redirect()->back()->with('success' , 'User addes successflly with name { ' . $request->name . ' } and email { ' .$request->email .' }');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if($user->profile === null)
        {
            // create new profile for user
            Profile::create([
                'user_id' => $user->id,
                'avatar'  => '1.webp',
            ]);
        }
        return view('users.profile' , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request , [
            'name'     => 'required',
            'email'    => 'required',
            'admin'    => 'required',
            'avatar'   => 'image',
        ]);

        if($image = $request->file('avatar'))
        {
            $imagePath = 'images/avatar/';
            $imageName = date('Ymd_hi') . "_" . "avatar" . rand(0 , 1000) . $image->getClientOriginalExtension();
            $image->move($imagePath , $imageName);
            $user->profile()->update([
                'avatar'    => $imageName,
            ]);
        }

       $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'admin'    => $request->admin,
        ]);

        return redirect()->back()->with('success' , 'User updated successflly');
    }

    public function updateProfile(Request $request, User $user)
    {
        $this->validate($request , [
            'name'     => 'required',
            'email'    => 'required',
            'admin'    => 'required',
            'avatar'   => 'image',
        ]);

        if($image = $request->file('avatar'))
        {
            $imagePath = 'images/avatar/';
            $imageName = date('Ymd_hi') . "_" . "avatar" . rand(0 , 1000) . $image->getClientOriginalExtension();
            $image->move($imagePath , $imageName);
            $user->profile()->update([
                'avatar'    => $imageName,
            ]);
        }
        $input = [
            'name'     => $request->name,
            'email'    => $request->email,
            'admin'    => $request->admin,
        ];

        // add password if user changed it
        // if(isset($request->password))
        // {
        //     $input['password'] = $request->password;
        // }

       $user->update($input);

        $user->profile()->update([
            'facebook'    => $request->facebook,
            'x'           => $request->x,
            'github'      => $request->github,
            'about'       => $request->about,
        ]);

        return redirect()->back()->with('success' , 'User updated successflly');
    }

    /**
     * Make user admin.
     */
    public function admin(User $user)
    {
        $user->admin = 1;
        $user->update();
        return redirect()->route('users')->with('success' , 'saved changed successflly');
    }

    /**
     * Make user admin.
     */
    public function Dadmin(User $user)
    {
        $user->admin = 0;
        $user->update();
        return redirect()->route('users')->with('success' , 'saved changed successflly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }


}
