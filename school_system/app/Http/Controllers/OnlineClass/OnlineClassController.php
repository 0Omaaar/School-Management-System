<?php

namespace App\Http\Controllers\OnlineClass;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\OnlineClasse;
use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;
use DB;


class OnlineClassController extends Controller
{

    public function index()
    {
        $online_classes = OnlineClasse::where('created_by', auth()->user()->email)->get();
        return view('pages.online_classes.index', compact('online_classes'));
    }


    public function create()
    {
        $Grades = Grade::all();
        return view('pages.online_classes.add', compact('Grades'));
    }


    public function store(Request $request)
    {
        try {

            DB::beginTransaction();

            $class = OnlineClasse::create([
                'integration' => true,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,
                'created_by' => auth()->user()->email,
                'meeting_id' => $request->meeting_id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $request->duration,
                'password' => "null",
                'start_url' => $request->join_url,
                'join_url' => $request->join_url,
            ]);


            $event = new Event;

            $event->name = $class->topic;
            $event->startDateTime = now();
            $event->endDateTime = now()->addHours(1);

            $event->save();
            DB::commit();
            return redirect()->route('online_classes.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $info = OnlineClasse::find($request->id)->delete();

            return redirect()->route('online_classes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}