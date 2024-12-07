<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email|max:255',
            'parent_email' => 'required|email|max:255',
            'phone' => 'required|numeric|digits_between:10,15',
            'parent_phone' => 'required|numeric|digits_between:10,15',
            'school_origin' => 'required|string|max:255',
            'gender' => 'required|in:M,W',
        ]);

        DB::beginTransaction();

        try {
            $student = Student::create([
                'user_id' => Auth::id(),
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'parent_name' => $validatedData['parent_name'],
                'parent_email' => $validatedData['parent_email'],
                'parent_phone' => $validatedData['parent_phone'],
                'school_origin' => $validatedData['school_origin'],
                'gender' => $validatedData['gender'],
                'status' => 'Tahap 1',
                'user_id' => auth()->id(),
            ]);

            Log::create([
                'student_id' => $student->id,
                'action' => 'Student created',
                'description' => 'New student created: ' . $student->name,
            ]);

            DB::commit();

            return redirect()
                ->route('payment')
                ->with([
                    'success' => 'Data siswa berhasil disimpan.',
                ]);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
