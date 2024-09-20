<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use App\Models\User;
use Barryvdh\DomPDF\Facade\pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show($id){
        $user = User::with('diet')->findOrFail($id);
        return view('admin.users.show',compact('user'));
    }

      /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $user = User::with('diet')->findOrFail($id);
        $diets = Diet::all();
        return view('admin.users.edit',compact('user','diets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        $user = User::with('diet')->findOrFail($id);

        $request->validate([
            'name'=>'required|max:50',
            'grade' => 'required',
            'dietId' => 'required|exists:diets,id',
        ]);

        $user->name = $request->name;
        $user->grade = $request->grade;
        $user->dietId = $request->dietId; 

        $user->save();

        return redirect()->route('admin.users.usersIndex')
        ->with('message_status', 'Estudiante actualizado exitosamente')
        ->with('icon', 'success');
    }

}
