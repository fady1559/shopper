<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{

    public function profile()
    {
        $user = auth()->user();
        return view('dashboard.pages.users.profile', compact('user'));
    }


public function show_admins(){
    $admins=User::where('User_Type','admin')->orderBy('id','asc')->simplePaginate(5);
    return view('dashboard.pages.users.show_admins',compact('admins'));
}
public function show_moderators(){
    $moderators=User::where('User_Type','moderator')->orderBy('id','asc')->simplePaginate(5);
    return view('dashboard.pages.users.show_moderators',compact('moderators'));
}
public function show_customers(){
    $customers=User::where('User_Type','customer')->orderBy('id','asc')->simplePaginate(5);
    return view('dashboard.pages.users.show_customers',compact('customers'));
}

public function index()
    {
        $users=User::orderBy('id','asc')->simplePaginate(5);
      return view('dashboard.pages.users.index',compact('users'));
    }


    public function create()
    {
        return view('dashboard.pages.users.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'image' => 'nullable|image|max:2048',
            'User_Type' => 'required'
        ]);

        try {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }

            $user->User_Type = $request->User_Type;

            if ($request->hasFile('image')) {
                $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
                $user->image = $request->file('image')->storeAs('public/assets/uploads/Users', $imageName);
            }

            $user->save();

            return redirect()->route('users.index')->with('success', "The user {$user->name} has been created successfully.");
        }
        catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'An error occurred while creating the user: ' . $e->getMessage());
        }
    }

    public function show(string $id)
    {
          $user=User::find($id);
          if($user== null){
            return view('dashboard.pages.categories.error.page-404');
          }
          return view('dashboard.pages.users.show',compact('user'));
    }


    public function edit(string $id)
    {
        $user=User::find($id);
        if($user==null){
            return view('dashboard.pages.categories.error.page-404');
        }

        else{

            if(auth()->user()->User_Type=='admin'){

                return view('dashboard.pages.users.edit', compact('user'));

              }

        else{

            return view('dashboard.pages.categories.error.page-404');
        }

        }
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'User_Type' => 'required'
        ]);

        $user = User::find($id);
        if (!$user) {
            return view('dashboard.pages.categories.error.page-404');
        }

        try {
            $imagePath = $user->image;

            if ($request->hasFile('image')) {
                if ($request->file('image')->isValid()) {
                    if ($imagePath&& Storage::exists($imagePath)) {
                        Storage::delete($imagePath);
                    }
                    $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
                    $imagePath = $request->file('image')->storeAs('public/assets/uploads/Users', $imageName);
                }
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->image = $imagePath;
            $user->User_Type = $request->User_Type;

            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }

            $user->save();

            return redirect()->route('users.index')->with('update', "The user {$user->name} has been updated successfully.");

        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'An error occurred while updating the user: ' . $e->getMessage());
        }
    }


   public function destroy(string $id)
{
    $user = User::find($id);
    if (!$user) {
        return view('dashboard.pages.categories.error.page-404');
    }

    try {
        $user->delete();
        return redirect()->route('user.delete')->with('delete_user', 'User deleted successfully.');
    }
    catch (\Exception $e) {
        return redirect()->route('user.delete')->with('error', 'An error occurred while deleting the user: ' . $e->getMessage());
    }
}

    public function delete(){
        $users = User::onlyTrashed()->orderBy('id', 'asc')->simplePaginate(1);
        return view('dashboard.pages.users.delete', compact('users'));
    }

    public function restore($id)
{
    try {
        $user = User::withTrashed()->find($id);

        if ($user) {
            $user->restore();
            $username = $user->name;

            return redirect()->route('users.index')->with('restore', "The user '{$username}' has been restored.");
        } else {
            return view('dashboard.pages.categories.error.page-404');
        }
    } catch (\Exception $e) {
        return redirect()->route('users.index')->with('error', 'An error occurred while restoring the user: ' . $e->getMessage());
    }
}


public function forcedelete($id)
{
    try {
        $user = User::withTrashed()->find($id);
        if ($user) {
            $user->forceDelete();
            return redirect()->route('users.index')->with('forceDelete', "The user has been force deleted.");
        }
        else {
            return view('dashboard.pages.categories.error.page-404');
        }
    } catch (\Exception $e) {
        return redirect()->route('users.index')->with('error', 'An error occurred while force deleting the user: ' . $e->getMessage());
    }
}

}
