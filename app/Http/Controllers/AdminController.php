<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use App\Models\Product;
use App\Models\User;
use Barryvdh\DomPDF\Facade\pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application admin dashboard.
     */
    public function dashboard()
    {
        return view('admin.index');
    }

    /**
     * Users functions.
     */

    /**
     * Display a listing of the resource.
     */
    public function usersIndex()
    {
        $users = User::with('diet')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createUser()
    {
        $diets = Diet::all();
        return view('admin.users.create', compact('diets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'studentId' => 'required|max:15|unique:users',
            'age' => 'required|integer|min:5|max:14',
            'grade' => 'required',
            'dietId' => 'required|exists:diets,id',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->studentId = $request->studentId;
        $user->age = $request->age;
        $user->grade = $request->grade;
        $user->dietId  = $request->dietId;

        $user->save();

        //Assign the 'user' role to the newly created user
        $user->assignRole('user');

        return redirect()->route('admin.users.usersIndex')
            ->with('message_status', 'Estudiante registrado exitosamente')
            ->with('icon', 'success');
    }

    /**
     * Confirm removal of the specified resource from storage.
     */
    public function confirmDeleteUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.delete', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'inactivo';

        $user->save();

        return redirect()->route('admin.users.usersIndex')
            ->with('message_status', 'Estudiante eliminado exitosamente')
            ->with('icon', 'success');
    }

    /**
     * Show inactive users.
     */
    public function showInactiveUsers()
    {
        $users = User::all();
        return view('admin.users.inactive', compact('users'));
    }

    /**
     * Confirm user activation.
     */
    public function confirmActivateUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.activate', compact('user'));
    }

    /**
     * Active user.
     */
    public function activateUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'activo';

        $user->save();

        return redirect()->route('admin.users.usersIndex')
            ->with('message_status', 'Estudiante activado exitosamente')
            ->with('icon', 'success');
    }


}

