<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function index(Request $request) {
        $all_users = $this->user->latest()->paginate(5);
       
        if ($request->search) {
            $all_users = $this->user->where('name','like','%'.$request->search.'%')->latest()->paginate(5)->appends(['search' => $request->search]);
        }

        return view('users.index')->with('all_users', $all_users)->with('search', $request->search);
    }

    public function edit($id) {
        $user = $this->user->findOrFail($id);
        
        if (Auth::user()->id != $user->id ) {
            return redirect()->route('index');
        }
 
        return view('users.edit')->with('user', $user);
     }

     public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|max:50',
            'department' => 'required|max:50',
            'salary' => 'required|min:1|max:10000000',
            'email' => 'required|max:50|email|unique:users,email,' . Auth::user()->id,
            'avatar' =>'mimes:jpeg,jpg,png,gif|max:1048'
           
         ]);

         $user = $this->user->findOrFail($id);
         $user->name = $request->name;
         $user->department = $request->department;
         $user->salary = $request->salary;
         $user->email = $request->email;

         if($request->avatar) {
            $user->avatar = 'data:image/' . $request->avatar->extension() . ' ;base64,' . base64_encode(file_get_contents($request->avatar));
         }
         
         $user->save();

          return redirect()->route('index');
     }

     public function destroy($id) {
        $user = $this->user->findOrFail($id);
        $user->delete();
        # forceDelete() -> will completely remove a modal from the database.

        return redirect()->route('index');
    }

    public function search(Request $request) {
        $users = $this->user->where('name','like','%'.$request->search.'%')->paginate(3)->appends(['search' => $request->search]);
        # $users = $this->user -> retrieve user records
        # where('name','like','%'.$request->search.'%') -> filter users by name containing the search term
        # ->get(); -> retrieve filtered user records

        return view('users.search')
            ->with('users', $users) # passes user data to the view
            ->with('search', $request->search); # passes search term to the view
   }
}
