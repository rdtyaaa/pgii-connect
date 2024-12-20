<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Log;
use App\Models\Student;
use App\Models\Interview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InterviewController extends Controller
{
    public function index(Request $request)
    {
        // Search by student name if search parameter exists
        $query = Interview::with('student')
            ->where('scheduled_at', '>=', now()) // Only future interviews
            // ->whereNull('status')
            ->orderBy('scheduled_at', 'asc'); // Closest interviews first

        if ($search = $request->get('search')) {
            $query->whereHas('student', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        // Pagination: 10 interviews
        $interviews = $query->paginate(25);

        return view('admin.interviews.index', compact('interviews'));
    }

    public function show($id)
    {
        $interview = Interview::with('student', 'student.detailStudent', 'student.documents', 'student.user')->findOrFail($id);
        return view('admin.interviews.detail', compact('interview'));
    }

    public function updateStatus(Request $request, $id)
    {
        $interview = Interview::findOrFail($id);
        $interview->update([
            'interviewer' => auth()->user()->name,
            'status' => $request->status, 
        ]);

        // Tambahkan log untuk aksi update status
        Log::create([
            'student_id' => $interview->student->id,
            'action' => 'Updated interview status',
            'description' => 'Status wawancara diperbarui menjadi: ' . $request->status . ' oleh: ' . auth()->user()->name . ' pada ' . Carbon::now()->toDateTimeString(),
        ]);

        return redirect()->route('interviews.index')->with('success', 'Interview status updated.');
    }
}
