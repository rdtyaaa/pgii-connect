<x-admin-layout>
    @slot('title')
        Detail Interview : {{ $interview->student->name }}
    @endslot

    <div class="rounded-lg bg-white p-4">
        <div class="flex items-center">
            <img class="h-56 w-56 rounded-lg border bg-black object-cover shadow"
                src="{{ Str::replaceFirst('=s96-c', '', $interview->student->user->avatar) }}" alt="Avatar"
                referrerpolicy="no-referrer">
            <div class="ms-4 w-full overflow-x-auto rounded-lg border shadow">
                <table class="w-full text-left text-sm text-gray-500 -:text-gray-400 rtl:text-right">
                    <caption
                        class="bg-gray-100 p-5 text-left text-lg font-semibold text-gray-900 -:bg-gray-800 -:text-white rtl:text-right">
                        Student Information
                    </caption>
                    <tbody>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Name</td>
                            <td class="px-6 py-4">{{ $interview->student->name }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Email</td>
                            <td class="px-6 py-4">{{ $interview->student->email }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Scheduled At</td>
                            <td class="px-6 py-4">{{ $interview->scheduled_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @if ($interview->student->detailStudent)
            <div class="relative mt-8 overflow-x-auto rounded-lg border shadow">
                <table class="w-full text-left text-sm text-gray-500 -:text-gray-400 rtl:text-right">
                    <caption
                        class="bg-gray-100 p-5 text-left text-lg font-semibold text-gray-900 -:bg-gray-800 -:text-white rtl:text-right">
                        Student Details
                    </caption>
                    <thead class="bg-gray-50 text-xs uppercase text-gray-700 -:bg-gray-700 -:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Field</th>
                            <th scope="col" class="px-6 py-3">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Nickname:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->nickname }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Birthplace and Date:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->birth_place }},
                                {{ $interview->student->detailStudent->birth_date }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Religion:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->religion }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Nationality:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->nationality }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">School Origin:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->school_origin }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">NISN:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->nisn }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">NIS:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->nis }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Ijazah Number:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->ijazah_number }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">SKHUN Number:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->skhun_number }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Exam Number:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->exam_number }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">NIK:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->nik }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Siblings Count:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->siblings_count }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Child Position:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->child_position }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Language:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->language }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Special Needs:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->special_needs }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Address:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->address }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Transport:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->transport }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Living With:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->living_with }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Home Phone:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->home_phone }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">KPS Number:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->kps_number }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Height:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->height }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Weight:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->weight }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Blood Type:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->blood_type }}</td>
                        </tr>
                        <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Distance to School:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->distance_to_school }}</td>
                        </tr>
                        <tr class="bg-white -:bg-gray-800">
                            <td class="px-6 py-4 font-medium text-gray-900 -:text-white">Travel Time:</td>
                            <td class="px-6 py-4">{{ $interview->student->detailStudent->travel_time }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <p>No details available for this student.</p>
        @endif

        @if ($interview->student->documents->isNotEmpty())
            <div class="relative mt-8 overflow-x-auto rounded-lg border shadow">
                <table class="w-full text-left text-sm text-gray-500 -:text-gray-400 rtl:text-right">
                    <caption
                        class="bg-gray-100 p-5 text-left text-lg font-semibold text-gray-900 -:bg-gray-800 -:text-white rtl:text-right">
                        Documents
                    </caption>
                    <thead class="bg-gray-50 text-xs uppercase text-gray-700 -:bg-gray-700 -:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Document Type</th>
                            <th scope="col" class="px-6 py-3">Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($interview->student->documents as $document)
                            <tr class="border-b bg-white -:border-gray-700 -:bg-gray-800">
                                <td class="px-6 py-4 font-medium text-gray-900 -:text-white">{{ $document->type }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ asset('storage/' . $document->path) }}"
                                        class="text-blue-600 -:text-blue-400" target="_blank">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>No documents available for this student.</p>
        @endif

        <div class="mt-8">
            <!-- Accept or Reject Buttons -->
            <form class="flex justify-between" action="{{ route('interviews.updateStatus', $interview->id) }}"
                method="POST">
                @csrf
                @method('PUT')
                <a href="{{ route('interviews.index') }}"
                    class="me-4 rounded-lg bg-gray-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-300 -:bg-gray-600 -:hover:bg-gray-700 -:focus:ring-gray-800">
                    Back to Interviews
                </a>
                <div>
                    <button type="submit" name="status" value="ditolak"
                        class="rounded-lg bg-red-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-red-700">Reject</button>
                    <button type="submit" name="status" value="diterima"
                        class="mr-2 rounded-lg bg-green-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-green-700">Accept</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
