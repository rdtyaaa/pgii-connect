<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Log;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Document;
use App\Models\Interview;
use App\Models\Achievement;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use App\Models\DetailStudent;
use App\Models\StudentParent;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
            'parent_type' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            $student = Student::create([
                'user_id' => Auth::id(),
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'gender' => $validatedData['gender'],
                'status' => 'Tahap 1',
                'user_id' => auth()->id(),
            ]);

            $parent = StudentParent::create([
                'student_id' => $student->id,
                'type' => $validatedData['parent_type'],
                'name' => $validatedData['parent_name'],
                'email' => $validatedData['parent_email'],
                'phone' => $validatedData['parent_phone'],
            ]);

            $detailStudent = DetailStudent::create([
                'student_id' => $student->id,
                'school_origin' => $validatedData['school_origin'],
            ]);

            Log::create([
                'student_id' => $student->id,
                'action' => 'Student created',
                'description' => 'Pendaftar Baru: ' . $student->name,
            ]);

            DB::commit();

            return redirect()
                ->route('payment', ['paymentType' => 'formulir'])
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

    public function indexDocument()
    {
        $student = Student::where('user_id', auth()->id())->first();
        $parents = StudentParent::where('student_id', $student->id)->get();
        $details = DetailStudent::where('student_id', $student->id)->first();
        return view('student.document-data', compact('student', 'parents', 'details'));
    }

    public function storeDocument(Request $request)
    {
        $validatedData = $request->validate([
            'rapot' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:2048',
            'kartu_keluarga' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:2048',
            'akte_kelahiran' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:2048',
            'surat_sehat' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:2048',

            'nickname' => 'required|string|max:255',
            'nisn' => 'required|numeric',
            'nis' => 'required|numeric',
            'ijazah_number' => 'required|string|max:255',
            'skhun_number' => 'required|string|max:255',
            'exam_number' => 'required|string|max:255',
            'nik' => 'required|numeric',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'religion' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'siblings_count' => 'required|numeric',
            'child_position' => 'required|numeric',
            'language' => 'required|string|max:255',
            'special_needs' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'transport' => 'required|string|max:255',
            'living_with' => 'required|string|max:255',
            'home_phone' => 'nullable|string|max:255',
            'kps_number' => 'nullable|string|max:255',

            'father_name' => 'string|max:255',
            'father_birth_year' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'father_special_needs' => 'required|in:tidak,ya',
            'father_job' => 'required|string|max:255',
            'father_education' => 'required|string|max:255',
            'father_monthly_income' => 'required|integer|min:0',

            'mother_name' => 'string|max:255',
            'mother_birth_year' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'mother_special_needs' => 'required|in:tidak,ya',
            'mother_job' => 'required|string|max:255',
            'mother_education' => 'required|string|max:255',
            'mother_monthly_income' => 'required|integer|min:0',

            'guardian_name' => 'nullable|string|max:255',
            'guardian_birth_year' => 'nullable|integer|digits:4|min:1900|max:' . date('Y'),
            'guardian_special_needs' => 'nullable|in:tidak,ya',
            'guardian_job' => 'nullable|string|max:255',
            'guardian_education' => 'nullable|string|max:255',
            'guardian_monthly_income' => 'nullable|integer|min:0',

            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'blood_type' => 'required|string|max:255',
            'distance_to_school' => 'required|numeric',
            'travel_time' => 'required|string|max:255',

            'achievement_type.*' => ['nullable', 'string', 'max:255'],
            'achievement_level.*' => ['nullable', 'string', 'max:255'],
            'achievement_name.*' => ['nullable', 'string', 'max:255'],
            'achievement_year.*' => ['nullable', 'digits:4', 'integer', 'min:1900', 'max:' . date('Y')],
            'achievement_organizer.*' => ['nullable', 'string', 'max:255'],

            'scholarship_type.*' => ['nullable', 'string', 'max:255'],
            'scholarship_organizer.*' => ['nullable', 'string', 'max:255'],
            'scholarship_start_year.*' => ['nullable', 'digits:4', 'integer', 'min:1900', 'max:' . date('Y')],
            'scholarship_end_year.*' => ['nullable', 'digits:4', 'integer', 'min:1900', 'max:' . date('Y'), 'gte:scholarship_start_year.*'],
        ]);

        $documents = [
            'rapot' => $request->file('rapot'),
            'kartu_keluarga' => $request->file('kartu_keluarga'),
            'akte_kelahiran' => $request->file('akte_kelahiran'),
            'surat_sehat' => $request->file('surat_sehat'),
        ];

        $student = Student::where('user_id', auth()->id())->first();

        // Mulai transaksi hanya untuk penyimpanan data di database
        DB::beginTransaction();

        try {
            // Pengolahan file menggunakan Queue untuk mempercepat proses
            $fileUrls = [];
            foreach ($documents as $type => $file) {
                if ($file) {
                    // Queue job untuk mengupload file ke Cloudinary
                    $fileUrls[$type] = Cloudinary::upload($file->getRealPath(), [
                        'folder' => 'documents/' . $student->name,
                    ])->getSecurePath();
                }
            }

            // Simpan file URLs ke database
            foreach ($fileUrls as $type => $fileUrl) {
                Document::create([
                    'student_id' => $student->id,
                    'type' => $type,
                    'path' => $fileUrl,
                ]);
            }

            // Simpan data student dan orang tua
            DetailStudent::updateOrCreate(['student_id' => $student->id], $validatedData);

            // Proses data orang tua
            $this->saveParentsData($student->id, $validatedData);

            // Simpan pencapaian
            $this->saveAchievements($student->id, $request);

            // Simpan beasiswa
            $this->saveScholarships($student->id, $request);

            // Jadwalkan wawancara
            $this->scheduleInterview($student->id);

            // Simpan log
            Log::create([
                'student_id' => $student->id,
                'action' => 'Completed document input',
                'description' => 'Dokumen sudah diinputkan oleh: ' . $student->name . ' Wawancara dijadwalkan pada ' . Carbon::now()->addWeek(),
            ]);

            // Perbarui status
            $student->update(['status' => 'Tahap 3']);

            DB::commit();

            return redirect()->route('information')->with('success', 'Data dokumen berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    protected function saveParentsData($studentId, $validatedData)
    {
        $parents = [
            'Ayah' => [
                'birth_year' => $validatedData['father_birth_year'],
                'special_needs' => $validatedData['father_special_needs'],
                'job' => $validatedData['father_job'],
                'education' => $validatedData['father_education'],
                'monthly_income' => $validatedData['father_monthly_income'],
            ],
            'Ibu' => [
                'birth_year' => $validatedData['mother_birth_year'],
                'special_needs' => $validatedData['mother_special_needs'],
                'job' => $validatedData['mother_job'],
                'education' => $validatedData['mother_education'],
                'monthly_income' => $validatedData['mother_monthly_income'],
            ],
            'Wali Murid' => [
                'birth_year' => $validatedData['guardian_birth_year'] ?? null,
                'special_needs' => $validatedData['guardian_special_needs'] ?? null,
                'job' => $validatedData['guardian_job'] ?? null,
                'education' => $validatedData['guardian_education'] ?? null,
                'monthly_income' => $validatedData['guardian_monthly_income'] ?? null,
            ],
        ];

        foreach ($parents as $type => $parentData) {
            if (!empty($parentData)) {
                StudentParent::updateOrCreate(['student_id' => $studentId, 'type' => $type], array_merge($parentData, ['student_id' => $studentId, 'type' => $type]));
            }
        }
    }

    protected function saveAchievements($studentId, $request)
    {
        if ($request->has('achievement_name') && count($request->achievement_name) > 0) {
            foreach ($request->achievement_name as $key => $value) {
                if (!empty($value)) {
                    Achievement::create([
                        'student_id' => $studentId,
                        'type' => $request->achievement_type[$key] ?? 'default',
                        'level' => $request->achievement_level[$key] ?? null,
                        'name' => $value,
                        'year' => $request->achievement_year[$key] ?? null,
                        'organizer' => $request->achievement_organizer[$key] ?? null,
                    ]);
                }
            }
        }
    }

    protected function saveScholarships($studentId, $request)
    {
        if ($request->has('scholarship_type') && count($request->scholarship_type) > 0) {
            foreach ($request->scholarship_type as $key => $value) {
                if (!empty($value)) {
                    Scholarship::create([
                        'student_id' => $studentId,
                        'type' => $value,
                        'organizer' => $request->scholarship_organizer[$key] ?? null,
                        'start_year' => $request->scholarship_start_year[$key] ?? null,
                        'end_year' => $request->scholarship_end_year[$key] ?? null,
                    ]);
                }
            }
        }
    }

    protected function scheduleInterview($studentId)
    {
        Interview::create([
            'student_id' => $studentId,
            'scheduled_at' => Carbon::now()->addWeek(),
            'interviewer' => null,
            'status' => 'dijadwalkan',
        ]);
    }

    public function indexInformation()
    {
        $student = Student::where('user_id', auth()->id())
            ->with('interviews') // Memuat relasi interviews
            ->first();

        $settings = Setting::whereIn('key', ['school_email', 'school_phone'])
            ->get()
            ->pluck('value', 'key');

        $scheduledInterview = $student->interviews->first();

        return view('student.information', compact('student', 'scheduledInterview', 'settings'));
    }

    public function final()
    {
        return view('student.final');
    }
}
