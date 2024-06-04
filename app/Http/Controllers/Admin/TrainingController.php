<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;
use App\Models\Training;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Program;



class TrainingController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = Training::all();
       
        return view('admin.trainings.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users= User::all();
        
        return view('admin.trainings.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTrainingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainingRequest $request)
    {
        $form_data = $request->all();
        $training = new Training();
        $slug = Str::slug($form_data['title'], '-');
        $form_data['slug'] = $slug;
        $training->user_id = auth()->user()->id;
        $training->fill($form_data);

        $training->save();

        foreach ($form_data['programs'] as $program_data) {
            $program = new Program();
            $program->week_number = $program_data['week_number'];
            $program->day_of_week = $program_data['day_of_week'];
            $program->description = $program_data['description'];
            $training->programs()->save($program); // Collega il programma al piano di allenamento
        }
    
        

        return redirect()->route('admin.trainings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        return view('admin.trainings.show', compact('training'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        $users = User::all();
        return view('admin.trainings.edit', compact('training', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrainingRequest  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrainingRequest $request, Training $training)
    {
        $form_data = $request->all();
        $slug = Str::slug($form_data['title'], '-');
        $form_data['slug'] = $slug;
        $training->update($form_data);

        // Aggiornamento dei programmi associati
        $training->programs()->delete(); // Elimina i vecchi programmi
        foreach ($form_data['programs'] as $program_data) {
            $program = new Program();
            $program->week_number = $program_data['week_number'];
            $program->day_of_week = $program_data['day_of_week'];
            $program->description = $program_data['description'];
            $training->programs()->save($program); // Collega il programma al training
        }

        return redirect()->route('admin.trainings.index');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training)
    {
        //
    }
}
