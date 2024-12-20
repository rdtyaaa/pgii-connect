<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::whereIn('key', ['school_email', 'school_phone'])
            ->get()
            ->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'school_email' => 'required|email',
            'school_phone' => 'required|numeric',
        ]);

        Setting::updateOrCreate(['key' => 'school_email'], ['value' => $request->school_email]);
        Setting::updateOrCreate(['key' => 'school_phone'], ['value' => $request->school_phone]);

        // Menggunakan flash untuk menyimpan pesan sementara
        return redirect()->back()->with('status', 'success')->with('message', 'Settings updated successfully.');
    }
}
