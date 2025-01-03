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

    // public function storeDocument(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'rapot' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:2048',
    //         'kartu_keluarga' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:2048',
    //         'akte_kelahiran' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:2048',
    //         'surat_sehat' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:2048',

    //         'nickname' => 'required|string|max:255',
    //         'nisn' => 'required|numeric',
    //         'nis' => 'required|numeric',
    //         'ijazah_number' => 'required|string|max:255',
    //         'skhun_number' => 'required|string|max:255',
    //         'exam_number' => 'required|string|max:255',
    //         'nik' => 'required|numeric',
    //         'birth_place' => 'required|string|max:255',
    //         'birth_date' => 'required|date',
    //         'religion' => 'required|string|max:255',
    //         'nationality' => 'required|string|max:255',
    //         'siblings_count' => 'required|numeric',
    //         'child_position' => 'required|numeric',
    //         'language' => 'required|string|max:255',
    //         'special_needs' => 'required|string|max:255',
    //         'address' => 'required|string|max:255',
    //         'transport' => 'required|string|max:255',
    //         'living_with' => 'required|string|max:255',
    //         'home_phone' => 'nullable|string|max:255',
    //         'kps_number' => 'nullable|string|max:255',

    //         'father_name' => 'string|max:255',
    //         'father_birth_year' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
    //         'father_special_needs' => 'required|in:tidak,ya',
    //         'father_job' => 'required|string|max:255',
    //         'father_education' => 'required|string|max:255',
    //         'father_monthly_income' => 'required|integer|min:0',

    //         'mother_name' => 'string|max:255',
    //         'mother_birth_year' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
    //         'mother_special_needs' => 'required|in:tidak,ya',
    //         'mother_job' => 'required|string|max:255',
    //         'mother_education' => 'required|string|max:255',
    //         'mother_monthly_income' => 'required|integer|min:0',

    //         'guardian_name' => 'nullable|string|max:255',
    //         'guardian_birth_year' => 'nullable|integer|digits:4|min:1900|max:' . date('Y'),
    //         'guardian_special_needs' => 'nullable|in:tidak,ya',
    //         'guardian_job' => 'nullable|string|max:255',
    //         'guardian_education' => 'nullable|string|max:255',
    //         'guardian_monthly_income' => 'nullable|integer|min:0',

    //         'height' => 'required|numeric',
    //         'weight' => 'required|numeric',
    //         'blood_type' => 'required|string|max:255',
    //         'distance_to_school' => 'required|numeric',
    //         'travel_time' => 'required|string|max:255',

    //         'achievement_type.*' => ['nullable', 'string', 'max:255'],
    //         'achievement_level.*' => ['nullable', 'string', 'max:255'],
    //         'achievement_name.*' => ['nullable', 'string', 'max:255'],
    //         'achievement_year.*' => ['nullable', 'digits:4', 'integer', 'min:1900', 'max:' . date('Y')],
    //         'achievement_organizer.*' => ['nullable', 'string', 'max:255'],

    //         'scholarship_type.*' => ['nullable', 'string', 'max:255'],
    //         'scholarship_organizer.*' => ['nullable', 'string', 'max:255'],
    //         'scholarship_start_year.*' => ['nullable', 'digits:4', 'integer', 'min:1900', 'max:' . date('Y')],
    //         'scholarship_end_year.*' => ['nullable', 'digits:4', 'integer', 'min:1900', 'max:' . date('Y'), 'gte:scholarship_start_year.*'],
    //     ]);

    //     $documents = [
    //         'rapot' => $request->file('rapot'),
    //         'kartu_keluarga' => $request->file('kartu_keluarga'),
    //         'akte_kelahiran' => $request->file('akte_kelahiran'),
    //         'surat_sehat' => $request->file('surat_sehat'),
    //     ];

    //     $student = Student::where('user_id', auth()->id())->first();

    //     DB::beginTransaction();

    //     try {
    //         foreach ($documents as $type => $file) {
    //             if ($file) {
    //                 // Upload file ke Cloudinary
    //                 $uploadedFile = Cloudinary::upload($file->getRealPath(), [
    //                     'folder' => 'documents/' . $student->name,
    //                 ]);

    //                 // Mendapatkan URL file yang diupload
    //                 $fileUrl = $uploadedFile->getSecurePath();

    //                 // Simpan data ke database
    //                 Document::create([
    //                     'student_id' => $student->id,
    //                     'type' => $type,
    //                     'path' => $fileUrl, // Gunakan URL Cloudinary
    //                 ]);
    //             }
    //         }

    //         $detailStudent = DetailStudent::updateOrCreate(
    //             ['student_id' => $student->id],
    //             [
    //                 'nickname' => $validatedData['nickname'],
    //                 'nisn' => $validatedData['nisn'],
    //                 'nis' => $validatedData['nis'],
    //                 'ijazah_number' => $validatedData['ijazah_number'],
    //                 'skhun_number' => $validatedData['skhun_number'],
    //                 'exam_number' => $validatedData['exam_number'],
    //                 'nik' => $validatedData['nik'],
    //                 'birth_place' => $validatedData['birth_place'],
    //                 'birth_date' => $validatedData['birth_date'],
    //                 'religion' => $validatedData['religion'],
    //                 'nationality' => $validatedData['nationality'],
    //                 'siblings_count' => $validatedData['siblings_count'],
    //                 'child_position' => $validatedData['child_position'],
    //                 'language' => $validatedData['language'],
    //                 'special_needs' => $validatedData['special_needs'],
    //                 'address' => $validatedData['address'],
    //                 'transport' => $validatedData['transport'],
    //                 'living_with' => $validatedData['living_with'],
    //                 'home_phone' => $validatedData['home_phone'],
    //                 'kps_number' => $validatedData['kps_number'],
    //                 'height' => $validatedData['height'],
    //                 'weight' => $validatedData['weight'],
    //                 'blood_type' => $validatedData['blood_type'],
    //                 'distance_to_school' => $validatedData['distance_to_school'],
    //                 'travel_time' => $validatedData['travel_time'],
    //             ],
    //         );

    //         $parents = [
    //             'Ayah' => [
    //                 'birth_year' => $validatedData['father_birth_year'],
    //                 'special_needs' => $validatedData['father_special_needs'],
    //                 'job' => $validatedData['father_job'],
    //                 'education' => $validatedData['father_education'],
    //                 'monthly_income' => $validatedData['father_monthly_income'],
    //             ],

    //             'Ibu' => [
    //                 'birth_year' => $validatedData['mother_birth_year'],
    //                 'special_needs' => $validatedData['mother_special_needs'],
    //                 'job' => $validatedData['mother_job'],
    //                 'education' => $validatedData['mother_education'],
    //                 'monthly_income' => $validatedData['mother_monthly_income'],
    //             ],

    //             'Wali Murid' => [
    //                 'birth_year' => $validatedData['guardian_birth_year'] ?? null,
    //                 'special_needs' => $validatedData['guardian_special_needs'] ?? null,
    //                 'job' => $validatedData['guardian_job'] ?? null,
    //                 'education' => $validatedData['guardian_education'] ?? null,
    //                 'monthly_income' => $validatedData['guardian_monthly_income'] ?? null,
    //             ],
    //         ];

    //         $existingFather = StudentParent::where('student_id', $student->id)
    //             ->where('type', 'Ayah')
    //             ->first();

    //         $existingMother = StudentParent::where('student_id', $student->id)
    //             ->where('type', 'Ibu')
    //             ->first();

    //         $existingGuardian = StudentParent::where('student_id', $student->id)
    //             ->where('type', 'Wali Murid')
    //             ->first();

    //         if (!empty($validatedData['father_name'])) {
    //             $parents['Ayah']['name'] = $validatedData['father_name'];
    //         } elseif ($existingFather) {
    //             $parents['Ayah']['name'] = $existingFather->name;
    //         }

    //         if (!empty($validatedData['mother_name'])) {
    //             $parents['Ibu']['name'] = $validatedData['mother_name'];
    //         } elseif ($existingMother) {
    //             $parents['Ibu']['name'] = $existingMother->name;
    //         }

    //         if (!empty($validatedData['guardian_name'])) {
    //             $parents['Wali Murid']['name'] = $validatedData['guardian_name'];
    //         } elseif ($existingGuardian) {
    //             $parents['Wali Murid']['name'] = $existingGuardian->name;
    //         }

    //         foreach ($parents as $type => $parentData) {
    //             if ($type === 'Wali Murid' && empty($parentData['birth_year']) && empty($parentData['special_needs']) && empty($parentData['job']) && empty($parentData['education']) && empty($parentData['monthly_income']) && empty($parentData['name'])) {
    //                 continue;
    //             }

    //             if (!empty($parentData)) {
    //                 StudentParent::updateOrCreate(
    //                     ['student_id' => $student->id, 'type' => $type],
    //                     array_merge($parentData, [
    //                         'student_id' => $student->id,
    //                         'type' => $type,
    //                     ]),
    //                 );
    //             }
    //         }

    //         if ($request->has('achievement_name') && count($request->achievement_name) > 0) {
    //             foreach ($request->achievement_name as $key => $value) {
    //                 if (!empty($value)) {
    //                     $type = $request->achievement_type[$key] ?? 'default';

    //                     Achievement::create([
    //                         'student_id' => $student->id,
    //                         'type' => $type,
    //                         'level' => $request->achievement_level[$key] ?? null,
    //                         'name' => $value,
    //                         'year' => $request->achievement_year[$key] ?? null,
    //                         'organizer' => $request->achievement_organizer[$key] ?? null,
    //                     ]);
    //                 }
    //             }
    //         }

    //         if ($request->has('scholarship_type') && count($request->scholarship_type) > 0) {
    //             foreach ($request->scholarship_type as $key => $value) {
    //                 if (!empty($value)) {
    //                     Scholarship::create([
    //                         'student_id' => $student->id,
    //                         'type' => $value,
    //                         'organizer' => $request->scholarship_organizer[$key] ?? null,
    //                         'start_year' => $request->scholarship_start_year[$key] ?? null,
    //                         'end_year' => $request->scholarship_end_year[$key] ?? null,
    //                     ]);
    //                 }
    //             }
    //         }

    //         $interview = Interview::create([
    //             'student_id' => $student->id,
    //             'scheduled_at' => Carbon::now()->addWeek(),
    //             'interviewer' => null,
    //             'status' => 'dijadwalkan',
    //         ]);

    //         Log::create([
    //             'student_id' => $student->id,
    //             'action' => 'Completed document input',
    //             'description' => 'Dokumen sudah diinputkan oleh: ' . $student->name . ' Wawancara dijadwalkan pada ' . Carbon::now()->addWeek(),
    //         ]);

    //         $student->update([
    //             'status' => 'Tahap 3',
    //         ]);

    //         DB::commit();

    //         return redirect()
    //             ->route('information')
    //             ->with([
    //                 'success' => 'Data dokumen berhasil disimpan.',
    //             ]);
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         dd($e->getMessage());
    //         return redirect()
    //             ->back()
    //             ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    //     }
    // }

    public function storeDocument(Request $request)
    {
        \Log::info('Request Data:', $request->all());
        // Validasi input berdasarkan halaman
        if ($request->input('current_page') == 1) {
            $validatedData = $request->validate($this->validationRulesForDocuments());
        } elseif ($request->input('current_page') == 2) {
            $validatedData = $request->validate($this->validationRulesForStudentDetails());
        } elseif ($request->input('current_page') == 3) {
            $validatedData = $request->validate($this->validationRulesForHealthAndDistance());
            $validatedDataAchievements = $request->validate($this->validationRulesForAchievementsAndScholarships());
        } elseif ($request->input('current_page') == 4) {
            $validatedData = $request->validate($this->validationRulesForParents());
        }

        // Ambil data siswa berdasarkan user yang sedang login
        $student = Student::where('user_id', auth()->id())->first();

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Proses penyimpanan berdasarkan halaman
            if ($request->input('current_page') == 1) {
                // Upload dokumen
                $this->uploadDocuments($request, $student);
            } elseif ($request->input('current_page') == 2) {
                // Simpan detail siswa
                $this->saveStudentDetails($validatedData, $student);
            } elseif ($request->input('current_page') == 3) {
                // Simpan data kesehatan dan jarak
                $this->saveHealthAndDistanceData($validatedData, $student);
                // Simpan prestasi
                $this->saveAchievements($request, $student);
                // Simpan beasiswa
                $this->saveScholarships($request, $student);
            } elseif ($request->input('current_page') == 4) {
                // Simpan data orang tua
                $this->saveParentsData($validatedData, $student);
            }

            // Jika semua halaman telah disimpan, jadwalkan wawancara dan catat log
            if ($request->input('current_page') == 4) {
                $this->scheduleInterview($student);
                $this->logAction($student);
                $student->update(['status' => 'Tahap 3']);
            }

            // Commit transaksi
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan!']);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error saving document: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    protected function validationRulesForDocuments()
    {
        return [
            'rapot' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:2048',
            'kartu_keluarga' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:2048',
            'akte_kelahiran' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:2048',
            'surat_sehat' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:2048',
        ];
    }

    protected function validationRulesForStudentDetails()
    {
        return [
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
            'special_needs' => ' required|string|max:255',
            'address' => 'required|string|max:255',
            'transport' => 'required|string|max:255',
            'living_with' => 'required|string|max:255',
            'home_phone' => 'required|string|max:15',
            'kps_number' => 'nullable|string|max:255',
        ];
    }

    protected function validationRulesForHealthAndDistance()
    {
        return [
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'blood_type' => 'nullable|string|max:3',
            'distance_to_school' => 'nullable|numeric',
            'travel_time' => 'nullable|numeric',
        ];
    }

    protected function validationRulesForParents()
    {
        return [
            'father_name' => 'required|string|max:255',
            'father_birth_year' => 'required|numeric',
            'father_special_needs' => 'nullable|string|max:255',
            'father_job' => 'required|string|max:255',
            'father_education' => 'required|string|max:255',
            'father_monthly_income' => 'required|numeric',
            'mother_name' => 'required|string|max:255',
            'mother_birth_year' => 'required|numeric',
            'mother_special_needs' => 'nullable|string|max:255',
            'mother_job' => 'required|string|max:255',
            'mother_education' => 'required|string|max:255',
            'mother_monthly_income' => 'required|numeric',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_birth_year' => 'nullable|numeric',
            'guardian_special_needs' => 'nullable|string|max:255',
            'guardian_job' => 'nullable|string|max:255',
            'guardian_education' => 'nullable|string|max:255',
            'guardian_monthly_income' => 'nullable|numeric',
        ];
    }

    protected function validationRulesForAchievementsAndScholarships()
    {
        return [
            'achievements' => 'nullable|array',
            'achievements.*.name' => 'string|max:255',
            'achievements.*.type' => 'string|max:255',
            'achievements.*.level' => 'nullable|string|max:255',
            'achievements.*.year' => 'nullable|numeric',
            'achievements.*.organizer' => 'nullable|string|max:255',
            'scholarships' => 'nullable|array',
            'scholarships.*.type' => 'string|max:255',
            'scholarships.*.organizer' => 'nullable|string|max:255',
            'scholarships.*.start_year' => 'nullable|numeric',
            'scholarships.*.end_year' => 'nullable|numeric',
        ];
    }

    protected function uploadDocuments(Request $request, Student $student)
    {
        $documents = [
            'rapot' => $request->file('rapot'),
            'kartu_keluarga' => $request->file('kartu_keluarga'),
            'akte_kelahiran' => $request->file('akte_kelahiran'),
            'surat_sehat' => $request->file('surat_sehat'),
        ];

        foreach ($documents as $type => $file) {
            if ($file) {
                $uploadedFile = Cloudinary::upload($file->getRealPath(), [
                    'folder' => 'documents/' . $student->name,
                ]);

                $fileUrl = $uploadedFile->getSecurePath();

                Document::create([
                    'student_id' => $student->id,
                    'type' => $type,
                    'path' => $fileUrl,
                ]);
            }
        }
    }

    protected function saveStudentDetails(array $validatedData, Student $student)
    {
        DetailStudent::updateOrCreate(
            ['student_id' => $student->id],
            [
                'nickname' => $validatedData['nickname'],
                'nisn' => $validatedData['nisn'],
                'nis' => $validatedData['nis'],
                'ijazah_number' => $validatedData['ijazah_number'],
                'skhun_number' => $validatedData['skhun_number'],
                'exam_number' => $validatedData['exam_number'],
                'nik' => $validatedData['nik'],
                'birth_place' => $validatedData['birth_place'],
                'birth_date' => $validatedData['birth_date'],
                'religion' => $validatedData['religion'],
                'nationality' => $validatedData['nationality'],
                'siblings_count' => $validatedData['siblings_count'],
                'child_position' => $validatedData['child_position'],
                'language' => $validatedData['language'],
                'special_needs' => $validatedData['special_needs'],
                'address' => $validatedData['address'],
                'transport' => $validatedData['transport'],
                'living_with' => $validatedData['living_with'],
                'home_phone' => $validatedData['home_phone'],
                'kps_number' => $validatedData['kps_number'],
            ],
        );
    }

    protected function saveHealthAndDistanceData(array $validatedData, Student $student)
    {
        DetailStudent::updateOrCreate(
            ['student_id' => $student->id],
            [
                'height' => $validatedData['height'],
                'weight' => $validatedData['weight'],
                'blood_type' => $validatedData['blood_type'],
                'distance_to_school' => $validatedData['distance_to_school'],
                'travel_time' => $validatedData['travel_time'],
            ],
        );
    }

    protected function saveParentsData(array $validatedData, Student $student)
    {
        $parents = [
            'Ayah' => [
                'birth_year' => $validatedData['father_birth_year'],
                'special_needs' => $validatedData['father_special_needs'],
                'job' => $validatedData['father_job'],
                'education' => $validatedData['father_education'],
                'monthly_income' => $validatedData['father_monthly_income'],
                'name' => $validatedData['father_name'], // Menambahkan nama ayah
            ],
            'Ibu' => [
                'birth_year' => $validatedData['mother_birth_year'],
                'special_needs' => $validatedData['mother_special_needs'],
                'job' => $validatedData['mother_job'],
                'education' => $validatedData['mother_education'],
                'monthly_income' => $validatedData['mother_monthly_income'],
                'name' => $validatedData['mother_name'], // Menambahkan nama ibu
            ],
            'Wali Murid' => [
                'birth_year' => $validatedData['guardian_birth_year'] ?? null,
                'special_needs' => $validatedData['guardian_special_needs'] ?? null,
                'job' => $validatedData['guardian_job'] ?? null,
                'education' => $validatedData['guardian_education'] ?? null,
                'monthly_income' => $validatedData['guardian_monthly_income'] ?? null,
                'name' => $validatedData['guardian_name'] ?? null, // Menambahkan nama wali murid
            ],
        ];

        foreach ($parents as $type => $parentData) {
            // Pastikan untuk menyertakan nama
            if (empty($parentData['name'])) {
                continue; // Jika nama tidak ada, lewati penyimpanan
            }

            StudentParent::updateOrCreate(['student_id' => $student->id, 'type' => $type], array_merge($parentData, ['student_id' => $student->id, 'type' => $type]));
        }
    }

    protected function saveAchievements(Request $request, Student $student)
    {
        if ($request->has('achievement_name') && count($request->achievement_name) > 0) {
            foreach ($request->achievement_name as $key => $value) {
                if (!empty($value)) {
                    Achievement::updateOrCreate(
                        [
                            'student_id' => $student->id,
                            'name' => $value, // Gunakan nama sebagai kunci unik
                        ],
                        [
                            'type' => $request->achievement_type[$key] ?? 'default',
                            'level' => $request->achievement_level[$key] ?? null,
                            'year' => $request->achievement_year[$key] ?? null,
                            'organizer' => $request->achievement_organizer[$key] ?? null,
                        ],
                    );
                }
            }
        }
    }

    protected function saveScholarships(Request $request, Student $student)
    {
        if ($request->has('scholarship_type') && count($request->scholarship_type) > 0) {
            foreach ($request->scholarship_type as $key => $value) {
                if (!empty($value)) {
                    Scholarship::updateOrCreate(
                        [
                            'student_id' => $student->id,
                            'type' => $value, // Gunakan jenis sebagai kunci unik
                        ],
                        [
                            'organizer' => $request->scholarship_organizer[$key] ?? null,
                            'start_year' => $request->scholarship_start_year[$key] ?? null,
                            'end_year' => $request->scholarship_end_year[$key] ?? null,
                        ],
                    );
                }
            }
        }
    }

    protected function scheduleInterview(Student $student)
    {
        Interview::create([
            'student_id' => $student->id,
            'scheduled_at' => Carbon::now()->addWeek(),
            'interviewer' => null,
            'status' => 'dijadwalkan',
        ]);
    }

    protected function logAction(Student $student)
    {
        Log::create([
            'student_id' => $student->id,
            'action' => 'Completed document input',
            'description' => 'Dokumen sudah diinputkan oleh: ' . $student->name . ' Wawancara dijadwalkan pada ' . Carbon::now()->addWeek(),
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
