<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use App\Models\User;
use Illuminate\Http\Request;

class DietController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function dietsIndex()
    {
        $diets = Diet::all();
        return view('admin.diets.index', compact('diets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createDiet()
    {
        $diets = Diet::all();
        return view('admin.diets.create', compact('diets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeDiet(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'description' => 'required|max:70|',
        ]);

        $diet = new Diet();
        $diet->name = $request->name;
        $diet->description = $request->description;

        $diet->save();

   

        return redirect()->route('admin.diets.dietsIndex')
            ->with('message_status', 'Dieta registrada exitosamente')
            ->with('icon', 'success');
    }

     /**
     * Display the specified resource.
     */
    public function show($id){
        $diet = Diet::findOrFail($id);
        return view('admin.diets.show',compact('diet'));
    }

    
      /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $diet = Diet::findOrFail($id);
        return view('admin.diets.edit',compact('diet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        $diet = Diet::findOrFail($id);

        $request->validate([
            'name' => 'required|max:30',
            'description' => 'required|max:70|',
        ]);

        $diet->name = $request->name;
        $diet->description = $request->description;

        $diet->save();

        return redirect()->route('admin.diets.dietsIndex')
        ->with('message_status', 'Dieta actualizada exitosamente')
        ->with('icon', 'success');
    }

    /**
     * Confirm removal of the specified resource from storage.
     */
    public function confirmDeleteDiet($id)
    {
        $diet = Diet::findOrFail($id);
        return view('admin.diets.delete', compact('diet'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteDiet($id)
    {
        $diet = Diet::findOrFail($id);

        $users = User::where('dietId', $diet->id)->get();
    
        $diet->status = 'inactivo';
        $diet->save();
    
        foreach ($users as $user) {
            $user->dietId = null; 
            $user->save();
        }

        return redirect()->route('admin.diets.dietsIndex')
            ->with('message_status', 'Dieta eliminada exitosamente')
            ->with('icon', 'success');
    }

    /**
     * Show inactive diets.
     */
    public function showInactiveDiets()
    {
        $diets = Diet::all();
        return view('admin.diets.inactive', compact('diets'));
    }

    /**
     * Confirm diet activation.
     */
    public function confirmActivateDiet($id)
    {
        $diet = Diet::findOrFail($id);
        return view('admin.diets.activate', compact('diet'));
    }

    /**
     * Active diet.
     */
    public function activateDiet($id)
    {
        $diet = Diet::findOrFail($id);
        $diet->status = 'activo';

        $diet->save();

        return redirect()->route('admin.diets.dietsIndex')
            ->with('message_status', 'Dieta activada exitosamente')
            ->with('icon', 'success');
    }


}
