<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\DetailStudent;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $sekolah = DetailStudent::select('school_origin', DB::raw('count(*) as total'))->groupBy('school_origin')->get();

        // Mengambil data untuk chart berdasarkan jenis kelamin
        $gender = Student::select('students.gender', DB::raw('count(*) as total'))->groupBy('students.gender')->get();

        // Mengambil data untuk chart berdasarkan kebutuhan khusus
        $specialNeeds = DetailStudent::select('special_needs', DB::raw('count(*) as total'))->groupBy('special_needs')->get();

        // Menghitung jumlah total pendaftar (Student Created)
        $totalPendaftar = Log::where('action', 'Student created')->count();

        // Menghitung jumlah pembelian formulir (Form Purchase)
        $pembelianFormulir = Log::where('action', 'Form Purchase')->count();

        // Menghitung jumlah wawancara dijadwalkan (Completed document input)
        $wawancaraDijadwalkan = Log::where('action', 'Completed document input')->count();

        // Menghitung jumlah peserta diterima (Accepted interview status)
        $pesertaDiterima = Log::where('action', 'Accepted interview status')->count();

        // Menghitung sisa mahasiswa yang belum membayar
        $sisaPendaftar = $totalPendaftar - $pembelianFormulir;

        // Menghitung sisa mahasiswa yang belum dijadwalkan wawancara
        $sisaWawancara = $pembelianFormulir - $wawancaraDijadwalkan;

        // Menghitung sisa mahasiswa yang belum diterima
        $sisaPesertaDiterima = $wawancaraDijadwalkan - $pesertaDiterima;

        return view('admin.dashboard', compact('totalPendaftar', 'pembelianFormulir', 'wawancaraDijadwalkan', 'pesertaDiterima', 'sisaPendaftar', 'sisaWawancara', 'sisaPesertaDiterima', 'sekolah', 'gender', 'specialNeeds'));
    }

    // Menampilkan wawancara
    public function interviews()
    {
        return view('admin.interviews.index');
    }

    // Menampilkan pembayaran
    public function payments()
    {
        return view('admin.payments.index');
    }

    // Menampilkan laporan
    public function logs()
    {
        // Mengambil data log dengan pengurutan terbaru dan pagination 25
        $logs = Log::orderBy('created_at', 'desc')->paginate(25);

        // Mengirimkan data log ke view
        return view('admin.logs.index', compact('logs'));
    }

    // Menampilkan pengaturan
    public function settings()
    {
        return view('admin.settings.index');
    }
}
