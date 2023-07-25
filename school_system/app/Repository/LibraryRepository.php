<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Library;
use Storage;

class LibraryRepository implements LibraryRepositoryInterface
{
    public function index()
    {
        $books = Library::all();
        return view('pages.library.index', compact('books'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('pages.library.create', compact('grades'));
    }

    public function store($request)
    {
        try {
            $books = new Library();
            $books->title = $request->title;
            $books->file_name = $request->file('file_name')->getClientOriginalName();
            $books->grade_id = $request->grade_id;
            $books->classroom_id = $request->classroom_id;
            $books->section_id = $request->section_id;
            $books->teacher_id = 1;
            $books->save();

            $request->file('file_name')->storeAs('attachments/library/', $books->file_name, 'upload_attachments');

            return redirect()->route('library.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $grades = Grade::all();
        $book = Library::findorFail($id);
        return view('pages.library.edit',compact('book','grades'));
    }

    public function update($request)
    {
        try {

            $book = Library::findorFail($request->id);
            $book->title = $request->title;

            if($request->hasfile('file_name')){

                // $this->deleteFile($book->file_name);
                Storage::disk('upload_attachments')->delete('attachments/library/' . $book->file_name);

                // $this->uploadFile($request,'file_name');
                $request->file('file_name')->storeAs('attachments/library/', $request->file('file_name')->getClientOriginalName(), 'upload_attachments');


                $file_name_new = $request->file('file_name')->getClientOriginalName();
                $book->file_name = $book->file_name !== $file_name_new ? $file_name_new : $book->file_name;
            }

            $book->grade_id = $request->grade_id;
            $book->classroom_id = $request->classroom_id;
            $book->section_id = $request->section_id;
            $book->teacher_id = 1;
            $book->save();

            return redirect()->route('library.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        $name = $request->file_name;
        $exists = Storage::disk('upload_attachments')->exists('attachments/library/' . $name);

        if ($exists) {
            Storage::disk('upload_attachments')->delete('attachments/library/' . $name);
        }

        Library::destroy($request->id);
        
        return redirect()->route('library.index');
    }

    public function download($filename)
    {
        return response()->download(public_path('attachments/library/'.$filename));
    }
}