{{-- resources/views/resumes/edit.blade.php --}}
@extends('user.layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Edit CV</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('info'))
            <div class="alert alert-info">{{ session('info') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>There are some errors:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('resumes.update', $resume->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Basic --}}
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="full_name" class="form-control" required
                    value="{{ old('full_name', $resume->full_name) }}">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $resume->phone) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $resume->email) }}">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control" rows="2">{{ old('address', $resume->address) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">LinkedIn (URL)</label>
                <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin', $resume->linkedin) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">About / Tentang Saya</label>
                <textarea name="about" class="form-control" rows="4">{{ old('about', $resume->about) }}</textarea>
            </div>

            {{-- Photo --}}
            <div class="mb-3">
                <label class="form-label">Photo (replace)</label>
                @if ($resume->photo_path)
                    <div class="mb-2">
                        <img src="{{ asset($resume->photo_path) }}" alt="photo"
                            style="max-width:160px; display:block; border-radius:4px;">
                    </div>
                @endif
                <input type="file" name="photo" accept="image/*" class="form-control">
                <small class="text-muted">Max 2MB</small>
            </div>

            <hr>

            {{-- Work Experiences --}}
            <h5>Work Experiences</h5>
            <div id="work-experiences-container">
                @php
                    $oldWorkTitles = old('work_title', null);
                    $workExperiences = $oldWorkTitles ? $oldWorkTitles : $resume->work_experiences ?? [];
                @endphp

                @if (!empty($workExperiences))
                    @foreach ($workExperiences as $index => $work)
                        @php
                            // when old() returns simple array of titles, $work may be string, so handle both
                            $title = is_array($work)
                                ? $work['title'] ?? ''
                                : (is_string($work)
                                    ? $work
                                    : $resume->work_experiences[$index]['title'] ?? '');
                            $company = old(
                                'work_company.' . $index,
                                is_array($work)
                                    ? $work['company'] ?? ''
                                    : $resume->work_experiences[$index]['company'] ?? '',
                            );
                            $location = old(
                                'work_location.' . $index,
                                is_array($work)
                                    ? $work['location'] ?? ''
                                    : $resume->work_experiences[$index]['location'] ?? '',
                            );
                            $start = old(
                                'work_start.' . $index,
                                is_array($work)
                                    ? $work['start'] ?? ''
                                    : $resume->work_experiences[$index]['start'] ?? '',
                            );
                            $end = old(
                                'work_end.' . $index,
                                is_array($work) ? $work['end'] ?? '' : $resume->work_experiences[$index]['end'] ?? '',
                            );
                        @endphp

                        <div class="work-item border p-3 mb-3 position-relative">
                            <button type="button"
                                class="btn btn-sm btn-danger position-absolute top-0 end-0 remove-work">Remove</button>
                            <div class="mb-2">
                                <input type="text" name="work_title[]" class="form-control" placeholder="Job title"
                                    value="{{ $title }}">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <input type="text" name="work_company[]" class="form-control" placeholder="Company"
                                        value="{{ $company }}">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <input type="text" name="work_location[]" class="form-control" placeholder="Location"
                                        value="{{ $location }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <input type="text" name="work_start[]" class="form-control"
                                        placeholder="Start (e.g. Sep 2019)" value="{{ $start }}">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <input type="text" name="work_end[]" class="form-control"
                                        placeholder="End (e.g. Mar 2020)" value="{{ $end }}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    {{-- default one empty --}}
                    <div class="work-item border p-3 mb-3 position-relative">
                        <button type="button"
                            class="btn btn-sm btn-danger position-absolute top-0 end-0 remove-work">Remove</button>
                        <div class="mb-2">
                            <input type="text" name="work_title[]" class="form-control" placeholder="Job title"
                                value="">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <input type="text" name="work_company[]" class="form-control" placeholder="Company"
                                    value="">
                            </div>
                            <div class="col-md-6 mb-2">
                                <input type="text" name="work_location[]" class="form-control" placeholder="Location"
                                    value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <input type="text" name="work_start[]" class="form-control"
                                    placeholder="Start (e.g. Sep 2019)" value="">
                            </div>
                            <div class="col-md-6 mb-2">
                                <input type="text" name="work_end[]" class="form-control"
                                    placeholder="End (e.g. Mar 2020)" value="">
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <button type="button" id="add-work" class="btn btn-sm btn-outline-primary">Add Work Experience</button>
            </div>

            <hr>

            {{-- Education --}}
            <h5>Education</h5>
            <div id="educations-container">
                @php
                    $oldEduSchools = old('edu_school', null);
                    $educations = $oldEduSchools ? $oldEduSchools : $resume->educations ?? [];
                @endphp

                @if (!empty($educations))
                    @foreach ($educations as $index => $eduItem)
                        @php
                            $school = is_array($eduItem)
                                ? $eduItem['school'] ?? ''
                                : (is_string($eduItem)
                                    ? $eduItem
                                    : $resume->educations[$index]['school'] ?? '');
                            $degree = old(
                                'edu_degree.' . $index,
                                is_array($eduItem)
                                    ? $eduItem['degree'] ?? ''
                                    : $resume->educations[$index]['degree'] ?? '',
                            );
                            $eduStart = old(
                                'edu_start.' . $index,
                                is_array($eduItem)
                                    ? $eduItem['start'] ?? ''
                                    : $resume->educations[$index]['start'] ?? '',
                            );
                            $eduEnd = old(
                                'edu_end.' . $index,
                                is_array($eduItem) ? $eduItem['end'] ?? '' : $resume->educations[$index]['end'] ?? '',
                            );
                        @endphp

                        <div class="edu-item border p-3 mb-3 position-relative">
                            <button type="button"
                                class="btn btn-sm btn-danger position-absolute top-0 end-0 remove-edu">Remove</button>
                            <div class="mb-2">
                                <input type="text" name="edu_school[]" class="form-control" placeholder="School"
                                    value="{{ $school }}">
                            </div>
                            <div class="mb-2">
                                <input type="text" name="edu_degree[]" class="form-control" placeholder="Degree"
                                    value="{{ $degree }}">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <input type="text" name="edu_start[]" class="form-control" placeholder="Start"
                                        value="{{ $eduStart }}">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <input type="text" name="edu_end[]" class="form-control" placeholder="End"
                                        value="{{ $eduEnd }}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="edu-item border p-3 mb-3 position-relative">
                        <button type="button"
                            class="btn btn-sm btn-danger position-absolute top-0 end-0 remove-edu">Remove</button>
                        <div class="mb-2">
                            <input type="text" name="edu_school[]" class="form-control" placeholder="School"
                                value="">
                        </div>
                        <div class="mb-2">
                            <input type="text" name="edu_degree[]" class="form-control" placeholder="Degree"
                                value="">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <input type="text" name="edu_start[]" class="form-control" placeholder="Start"
                                    value="">
                            </div>
                            <div class="col-md-6 mb-2">
                                <input type="text" name="edu_end[]" class="form-control" placeholder="End"
                                    value="">
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <button type="button" id="add-edu" class="btn btn-sm btn-outline-primary">Add Education</button>
            </div>

            <hr>

            {{-- Skills --}}
            <h5>Skills</h5>
            <div id="skills-container" class="mb-2">
                @php
                    $oldSkills = old('skills', null);
                    $skills = $oldSkills ? $oldSkills : $resume->skills ?? [];
                @endphp
                @if (!empty($skills))
                    @foreach ($skills as $skill)
                        <div class="input-group mb-2 skill-item">
                            <input type="text" name="skills[]" class="form-control" placeholder="Skill"
                                value="{{ $skill }}">
                            <button type="button" class="btn btn-danger remove-skill">Remove</button>
                        </div>
                    @endforeach
                @else
                    <div class="input-group mb-2 skill-item">
                        <input type="text" name="skills[]" class="form-control" placeholder="Skill" value="">
                        <button type="button" class="btn btn-danger remove-skill">Remove</button>
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <button type="button" id="add-skill" class="btn btn-sm btn-outline-primary">Add Skill</button>
            </div>

            <hr>

            {{-- Certifications --}}
            <h5>Certifications</h5>
            <div id="certifications-container" class="mb-2">
                @php
                    $oldCerts = old('certifications', null);
                    $certifications = $oldCerts ? $oldCerts : $resume->certifications ?? [];
                @endphp
                @if (!empty($certifications))
                    @foreach ($certifications as $cert)
                        <div class="input-group mb-2 cert-item">
                            <input type="text" name="certifications[]" class="form-control"
                                placeholder="Certification" value="{{ $cert }}">
                            <button type="button" class="btn btn-danger remove-cert">Remove</button>
                        </div>
                    @endforeach
                @else
                    <div class="input-group mb-2 cert-item">
                        <input type="text" name="certifications[]" class="form-control" placeholder="Certification"
                            value="">
                        <button type="button" class="btn btn-danger remove-cert">Remove</button>
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <button type="button" id="add-cert" class="btn btn-sm btn-outline-primary">Add Certification</button>
            </div>

            <hr>

            {{-- References --}}
            <h5>References</h5>
            <div id="references-container">
                @php
                    $oldRefNames = old('reference_name', null);
                    $references = $oldRefNames ? $oldRefNames : $resume->references ?? [];
                @endphp

                @if (!empty($references))
                    @foreach ($references as $index => $referenceItem)
                        @php
                            $refName = is_array($referenceItem)
                                ? $referenceItem['name'] ?? ''
                                : (is_string($referenceItem)
                                    ? $referenceItem
                                    : $resume->references[$index]['name'] ?? '');
                            $refContact = old(
                                'reference_contact.' . $index,
                                is_array($referenceItem)
                                    ? $referenceItem['contact'] ?? ''
                                    : $resume->references[$index]['contact'] ?? '',
                            );
                        @endphp

                        <div class="ref-item border p-3 mb-3 position-relative">
                            <button type="button"
                                class="btn btn-sm btn-danger position-absolute top-0 end-0 remove-ref">Remove</button>
                            <div class="mb-2">
                                <input type="text" name="reference_name[]" class="form-control"
                                    placeholder="Reference name" value="{{ $refName }}">
                            </div>
                            <div>
                                <input type="text" name="reference_contact[]" class="form-control"
                                    placeholder="Reference contact" value="{{ $refContact }}">
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="ref-item border p-3 mb-3 position-relative">
                        <button type="button"
                            class="btn btn-sm btn-danger position-absolute top-0 end-0 remove-ref">Remove</button>
                        <div class="mb-2">
                            <input type="text" name="reference_name[]" class="form-control"
                                placeholder="Reference name" value="">
                        </div>
                        <div>
                            <input type="text" name="reference_contact[]" class="form-control"
                                placeholder="Reference contact" value="">
                        </div>
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <button type="button" id="add-ref" class="btn btn-sm btn-outline-primary">Add Reference</button>
            </div>

            <hr>

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Save Changes</button>
                <a href="{{ route('resumes.show', $resume->id) }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    {{-- Templates for JS cloning --}}
    <div id="templates" style="display:none;">
        <div id="work-template">
            <div class="work-item border p-3 mb-3 position-relative">
                <button type="button"
                    class="btn btn-sm btn-danger position-absolute top-0 end-0 remove-work">Remove</button>
                <div class="mb-2">
                    <input type="text" name="work_title[]" class="form-control" placeholder="Job title"
                        value="">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <input type="text" name="work_company[]" class="form-control" placeholder="Company"
                            value="">
                    </div>
                    <div class="col-md-6 mb-2">
                        <input type="text" name="work_location[]" class="form-control" placeholder="Location"
                            value="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <input type="text" name="work_start[]" class="form-control"
                            placeholder="Start (e.g. Sep 2019)" value="">
                    </div>
                    <div class="col-md-6 mb-2">
                        <input type="text" name="work_end[]" class="form-control" placeholder="End (e.g. Mar 2020)"
                            value="">
                    </div>
                </div>
            </div>
        </div>

        <div id="edu-template">
            <div class="edu-item border p-3 mb-3 position-relative">
                <button type="button"
                    class="btn btn-sm btn-danger position-absolute top-0 end-0 remove-edu">Remove</button>
                <div class="mb-2">
                    <input type="text" name="edu_school[]" class="form-control" placeholder="School" value="">
                </div>
                <div class="mb-2">
                    <input type="text" name="edu_degree[]" class="form-control" placeholder="Degree" value="">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <input type="text" name="edu_start[]" class="form-control" placeholder="Start"
                            value="">
                    </div>
                    <div class="col-md-6 mb-2">
                        <input type="text" name="edu_end[]" class="form-control" placeholder="End" value="">
                    </div>
                </div>
            </div>
        </div>

        <div id="skill-template">
            <div class="input-group mb-2 skill-item">
                <input type="text" name="skills[]" class="form-control" placeholder="Skill" value="">
                <button type="button" class="btn btn-danger remove-skill">Remove</button>
            </div>
        </div>

        <div id="cert-template">
            <div class="input-group mb-2 cert-item">
                <input type="text" name="certifications[]" class="form-control" placeholder="Certification"
                    value="">
                <button type="button" class="btn btn-danger remove-cert">Remove</button>
            </div>
        </div>

        <div id="ref-template">
            <div class="ref-item border p-3 mb-3 position-relative">
                <button type="button"
                    class="btn btn-sm btn-danger position-absolute top-0 end-0 remove-ref">Remove</button>
                <div class="mb-2">
                    <input type="text" name="reference_name[]" class="form-control" placeholder="Reference name"
                        value="">
                </div>
                <div>
                    <input type="text" name="reference_contact[]" class="form-control"
                        placeholder="Reference contact" value="">
                </div>
            </div>
        </div>
    </div>

    {{-- JS: add/remove dynamic items --}}
    @push('scripts')
        <script>
            document.addEventListener('click', function(e) {
                // Add work
                if (e.target && e.target.id === 'add-work') {
                    const tpl = document.querySelector('#work-template').innerHTML;
                    document.getElementById('work-experiences-container').insertAdjacentHTML('beforeend', tpl);
                }

                // Remove work
                if (e.target && e.target.classList.contains('remove-work')) {
                    const el = e.target.closest('.work-item');
                    if (el) el.remove();
                }

                // Add edu
                if (e.target && e.target.id === 'add-edu') {
                    const tpl = document.querySelector('#edu-template').innerHTML;
                    document.getElementById('educations-container').insertAdjacentHTML('beforeend', tpl);
                }

                // Remove edu
                if (e.target && e.target.classList.contains('remove-edu')) {
                    const el = e.target.closest('.edu-item');
                    if (el) el.remove();
                }

                // Add skill
                if (e.target && e.target.id === 'add-skill') {
                    const tpl = document.querySelector('#skill-template').innerHTML;
                    document.getElementById('skills-container').insertAdjacentHTML('beforeend', tpl);
                }

                // Remove skill
                if (e.target && e.target.classList.contains('remove-skill')) {
                    const el = e.target.closest('.skill-item');
                    if (el) el.remove();
                }

                // Add cert
                if (e.target && e.target.id === 'add-cert') {
                    const tpl = document.querySelector('#cert-template').innerHTML;
                    document.getElementById('certifications-container').insertAdjacentHTML('beforeend', tpl);
                }

                // Remove cert
                if (e.target && e.target.classList.contains('remove-cert')) {
                    const el = e.target.closest('.cert-item');
                    if (el) el.remove();
                }

                // Add ref
                if (e.target && e.target.id === 'add-ref') {
                    const tpl = document.querySelector('#ref-template').innerHTML;
                    document.getElementById('references-container').insertAdjacentHTML('beforeend', tpl);
                }

                // Remove ref
                if (e.target && e.target.classList.contains('remove-ref')) {
                    const el = e.target.closest('.ref-item');
                    if (el) el.remove();
                }
            });
        </script>
    @endpush

@endsection
