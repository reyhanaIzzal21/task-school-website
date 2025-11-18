<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Resume;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resumesUser = Resume::with('user')->orderBy('created_at', 'desc')->get();

        return view('admin.pages.resumes.index', compact('resumesUser'));
    }

    /**
     * user section start
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $existingResume = Resume::where('user_id', Auth::id())->first();
        if ($existingResume) {
            return redirect()->route('resumes.edit', $existingResume->id)
                ->with('info', 'You already have a resume. You can edit it here.');
        }
        return view('user.pages.dashboard.resumes.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'nullable|string|max:16|unique:resumes,nik',
            'domicile' => 'nullable|string',
            'full_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'linkedin' => 'nullable|url',
            'about' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            // arrays from form
            'work_title' => 'nullable|array',
            'work_title.*' => 'nullable|string',
            'work_company' => 'nullable|array',
            'work_company.*' => 'nullable|string',
            'work_location' => 'nullable|array',
            'work_location.*' => 'nullable|string',
            'work_start' => 'nullable|array',
            'work_start.*' => 'nullable|string',
            'work_end' => 'nullable|array',
            'work_end.*' => 'nullable|string',

            'edu_school' => 'nullable|array',
            'edu_school.*' => 'nullable|string',
            'edu_degree' => 'nullable|array',
            'edu_degree.*' => 'nullable|string',
            'edu_start' => 'nullable|array',
            'edu_start.*' => 'nullable|string',
            'edu_end' => 'nullable|array',
            'edu_end.*' => 'nullable|string',

            'skills' => 'nullable|array',
            'certifications' => 'nullable|array',
            'reference_name' => 'nullable|array',
            'reference_contact' => 'nullable|array',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $storedPath = $request->file('photo')->store('public/resume_photos');
            // convert to public path
            $photoPath = Storage::url(basename($storedPath));
            // alternatively store Storage::url($storedPath) returns '/storage/filename' if using storage:link
            $photoPath = str_replace('public/', 'storage/', $storedPath);
        }

        // assemble work experiences
        $workExperiences = [];
        if ($request->filled('work_title')) {
            foreach ($request->input('work_title') as $index => $title) {
                if (empty($title)) continue;
                $workExperiences[] = [
                    'title' => $title,
                    'company' => $request->input('work_company')[$index] ?? null,
                    'location' => $request->input('work_location')[$index] ?? null,
                    'start' => $request->input('work_start')[$index] ?? null,
                    'end' => $request->input('work_end')[$index] ?? null,
                ];
            }
        }

        // assemble educations
        $educations = [];
        if ($request->filled('edu_school')) {
            foreach ($request->input('edu_school') as $index => $school) {
                if (empty($school)) continue;
                $educations[] = [
                    'school' => $school,
                    'degree' => $request->input('edu_degree')[$index] ?? null,
                    'start' => $request->input('edu_start')[$index] ?? null,
                    'end' => $request->input('edu_end')[$index] ?? null,
                ];
            }
        }

        // skills and certifications arrays
        $skills = $request->input('skills', []);
        $certifications = $request->input('certifications', []);

        // references
        $references = [];
        if ($request->filled('reference_name')) {
            foreach ($request->input('reference_name') as $index => $referenceName) {
                if (empty($referenceName)) continue;
                $references[] = [
                    'name' => $referenceName,
                    'contact' => $request->input('reference_contact')[$index] ?? null,
                ];
            }
        }

        $resume = Resume::create([
            'user_id' => Auth::id(),
            'nik' => $request->input('nik'),
            'domicile' => $request->input('domicile'),
            'full_name' => $request->input('full_name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'linkedin' => $request->input('linkedin'),
            'about' => $request->input('about'),
            'photo_path' => $photoPath,
            'work_experiences' => $workExperiences,
            'educations' => $educations,
            'skills' => $skills,
            'certifications' => $certifications,
            'references' => $references,
        ]);

        // setelah berhasil store/update, redirect ke dashboard dan buka tab CV
        return redirect()->route('dashboard.user', ['tab' => 'cv'])
            ->with('success', 'Resume saved. You can export to PDF from your dashboard CV tab.');
    }


    public function edit(Resume $resume)
    {
        if ($resume->user_id !== Auth::id()) {
            abort(403);
        }

        return view('user.pages.dashboard.resumes.edit', compact('resume'));
    }

    public function update(Request $request, Resume $resume)
    {
        // manual owner check (ganti authorize)
        if ($resume->user_id !== Auth::id()) {
            abort(403);
        }

        $validatedData = $request->validate([
            'nik' => 'nullable|string|max:16|unique:resumes,nik',
            'domicile' => 'nullable|string',
            'full_name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            // same validation arrays as store...

            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'linkedin' => 'nullable|url',
            'about' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            // arrays from form
            'work_title' => 'nullable|array',
            'work_title.*' => 'nullable|string',
            'work_company' => 'nullable|array',
            'work_company.*' => 'nullable|string',
            'work_location' => 'nullable|array',
            'work_location.*' => 'nullable|string',
            'work_start' => 'nullable|array',
            'work_start.*' => 'nullable|string',
            'work_end' => 'nullable|array',
            'work_end.*' => 'nullable|string',

            'edu_school' => 'nullable|array',
            'edu_school.*' => 'nullable|string',
            'edu_degree' => 'nullable|array',
            'edu_degree.*' => 'nullable|string',
            'edu_start' => 'nullable|array',
            'edu_start.*' => 'nullable|string',
            'edu_end' => 'nullable|array',
            'edu_end.*' => 'nullable|string',

            'skills' => 'nullable|array',
            'certifications' => 'nullable|array',
            'reference_name' => 'nullable|array',
            'reference_contact' => 'nullable|array',
        ]);

        if ($request->hasFile('photo')) {
            // delete old file if exists
            if ($resume->photo_path) {
                // photo_path stored like 'public/resume_photos/filename.jpg'
                try {
                    // jika kamu menyimpan path 'storage/...', Storage::delete butuh path 'public/...'
                    // saya biarkan seperti semula supaya tidak merubah struktur file kamu
                    Storage::delete($resume->photo_path);
                } catch (\Exception $e) {
                    // ignore
                }
            }
            $storedPath = $request->file('photo')->store('public/resume_photos');
            $photoPath = str_replace('public/', 'storage/', $storedPath);
            $resume->photo_path = $photoPath;
        }

        // build arrays similar to store...
        $workExperiences = [];
        if ($request->filled('work_title')) {
            foreach ($request->input('work_title') as $index => $title) {
                if (empty($title)) continue;
                $workExperiences[] = [
                    'title' => $title,
                    'company' => $request->input('work_company')[$index] ?? null,
                    'location' => $request->input('work_location')[$index] ?? null,
                    'start' => $request->input('work_start')[$index] ?? null,
                    'end' => $request->input('work_end')[$index] ?? null,
                ];
            }
        }

        $educations = [];
        if ($request->filled('edu_school')) {
            foreach ($request->input('edu_school') as $index => $school) {
                if (empty($school)) continue;
                $educations[] = [
                    'school' => $school,
                    'degree' => $request->input('edu_degree')[$index] ?? null,
                    'start' => $request->input('edu_start')[$index] ?? null,
                    'end' => $request->input('edu_end')[$index] ?? null,
                ];
            }
        }

        $resume->full_name = $request->input('full_name');
        $resume->phone = $request->input('phone');
        $resume->email = $request->input('email');
        $resume->address = $request->input('address');
        $resume->linkedin = $request->input('linkedin');
        $resume->about = $request->input('about');
        $resume->work_experiences = $workExperiences;
        $resume->educations = $educations;
        $resume->skills = $request->input('skills', []);
        $resume->certifications = $request->input('certifications', []);
        $resume->nik = $request->input('nik');
        $resume->domicile = $request->input('domicile');
        // references
        $references = [];
        if ($request->filled('reference_name')) {
            foreach ($request->input('reference_name') as $index => $referenceName) {
                if (empty($referenceName)) continue;
                $references[] = [
                    'name' => $referenceName,
                    'contact' => $request->input('reference_contact')[$index] ?? null,
                ];
            }
        }
        $resume->references = $references;

        $resume->save();

        // setelah berhasil store/update, redirect ke dashboard dan buka tab CV
        return redirect()->route('dashboard.user', ['tab' => 'cv'])
            ->with('success', 'Resume saved. You can export to PDF from your dashboard CV tab.');
    }

    public function show(Resume $resume)
    {
        // manual owner check (ganti authorize)
        if ($resume->user_id !== Auth::id()) {
            abort(403);
        }

        // sesuaikan path view dengan lokasi blade kamu
        return view('user.pages.dashboard.resumes.show', compact('resume'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resume $resume)
    {
        if ($resume->user_id !== Auth::id()) {
            abort(403);
        }

        // delete photo if exists
        if ($resume->photo_path) {
            try {
                Storage::delete($resume->photo_path);
            } catch (\Exception $e) {
                // ignore
            }
        }

        $resume->delete();

        return redirect()->route('dashboard.user', ['tab' => 'cv'])
            ->with('success', 'Resume deleted.');
    }

    public function exportPdf(Resume $resume)
    {
        if ($resume->user_id !== Auth::id()) {
            abort(403);
        }

        // pastikan view pdf berada di resources/views/user/pages/dashboard/resumes/pdf.blade.php
        $pdf = Pdf::loadView('user.pages.dashboard.resumes.pdf', compact('resume'))
            ->setPaper('a4', 'portrait');

        $filename = 'resume-' . preg_replace('/\s+/', '_', strtolower($resume->full_name)) . '.pdf';
        return $pdf->download($filename);
    }
    // user section end


    // admin section start
    public function showAdmin(Resume $resume)
    {
        $resume->load('user'); // pastikan relasi user tersedia

        return view('admin.pages.resumes.show', compact('resume'));
    }


    public function exportPdfInAdmin(Resume $resume)
    {
        $resume->load('user');

        $pdf = Pdf::loadView('user.pages.dashboard.resumes.pdf', compact('resume'))
            ->setPaper('a4', 'portrait');

        $filename = 'resume-' . preg_replace('/\s+/', '_', strtolower($resume->full_name)) . '.pdf';
        return $pdf->download($filename);
    }
    // admin section end
}
