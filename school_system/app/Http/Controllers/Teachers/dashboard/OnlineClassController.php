<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\OnlineClasse;
use Illuminate\Http\Request;
use DB;
use Spatie\GoogleCalendar\Event;

class OnlineClassController extends Controller
{

    public function index()
    {
        $online_classes = OnlineClasse::where('created_by', auth()->user()->email)->get();
        return view('pages.Teachers.dashboard.online_classes.index', compact('online_classes'));
    }


    public function create()
    {
        $Grades = Grade::all();
        return view('pages.Teachers.dashboard.online_classes.add', compact('Grades'));
    }


    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            OnlineClasse::create([
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

            $event->name = $request->topic;
            $event->startDateTime = now();
            $event->endDateTime = now()->addHours(1);

            $event->save();

            DB::commit();
            return redirect()->route('teacher_online_classes.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    

    public function destroy(Request $request)
    {
        // try {
        //     $info = OnlineClasse::findOrFail($id)->delete();

        //     return redirect()->back();
        // } catch (\Exception $e) {
        //     return redirect()->back()->with(['error' => $e->getMessage()]);
        // }
            $id = $request->id;
        return $id;
    }
}