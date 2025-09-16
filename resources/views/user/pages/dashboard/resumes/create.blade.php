@extends('user.layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Create Resume</h1>
        <form action="{{ route('resumes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label>Full Name</label>
                <input type="text" name="full_name" value="{{ old('full_name') }}" required>
            </div>
            <div>
                <label>Photo</label>
                <input type="file" name="photo" accept="image/*">
            </div>
            <div>
                <label>Phone</label>
                <input type="text" name="phone" value="{{ old('phone') }}">
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}">
            </div>
            <div>
                <label>Address</label>
                <textarea name="address">{{ old('address') }}</textarea>
            </div>
            <div>
                <label>LinkedIn URL</label>
                <input type="url" name="linkedin" value="{{ old('linkedin') }}">
            </div>
            <div>
                <label>About</label>
                <textarea name="about">{{ old('about') }}</textarea>
            </div>

            <hr>
            <h3>Work Experiences</h3>
            <div id="work-experiences">
                <div class="work-item">
                    <input type="text" name="work_title[]" placeholder="Job title">
                    <input type="text" name="work_company[]" placeholder="Company">
                    <input type="text" name="work_location[]" placeholder="Location">
                    <input type="text" name="work_start[]" placeholder="Start (e.g. Sep 2019)">
                    <input type="text" name="work_end[]" placeholder="End (e.g. Mar 2020)">
                </div>
            </div>
            <button type="button" id="add-work">Add Work</button>

            <hr>
            <h3>Education</h3>
            <div id="educations">
                <div class="edu-item">
                    <input type="text" name="edu_school[]" placeholder="School">
                    <input type="text" name="edu_degree[]" placeholder="Degree">
                    <input type="text" name="edu_start[]" placeholder="Start">
                    <input type="text" name="edu_end[]" placeholder="End">
                </div>
            </div>
            <button type="button" id="add-edu">Add Education</button>

            <hr>
            <h3>Skills</h3>
            <div id="skills">
                <input type="text" name="skills[]" placeholder="Skill 1">
            </div>
            <button type="button" id="add-skill">Add Skill</button>

            <hr>
            <h3>Certifications</h3>
            <div id="certifications">
                <input type="text" name="certifications[]" placeholder="Certification 1">
            </div>
            <button type="button" id="add-cert">Add Certification</button>

            <hr>
            <h3>References</h3>
            <div id="references">
                <div class="ref-item">
                    <input type="text" name="reference_name[]" placeholder="Reference name">
                    <input type="text" name="reference_contact[]" placeholder="Reference contact">
                </div>
            </div>
            <button type="button" id="add-ref">Add Reference</button>

            <hr>
            <button type="submit">Save Resume</button>
        </form>
    </div>

    <script>
        document.getElementById('add-work').addEventListener('click', function() {
            const container = document.getElementById('work-experiences');
            const div = document.createElement('div');
            div.classList.add('work-item');
            div.innerHTML = `<input type="text" name="work_title[]" placeholder="Job title">
                     <input type="text" name="work_company[]" placeholder="Company">
                     <input type="text" name="work_location[]" placeholder="Location">
                     <input type="text" name="work_start[]" placeholder="Start">
                     <input type="text" name="work_end[]" placeholder="End">`;
            container.appendChild(div);
        });

        document.getElementById('add-edu').addEventListener('click', function() {
            const container = document.getElementById('educations');
            const div = document.createElement('div');
            div.classList.add('edu-item');
            div.innerHTML = `<input type="text" name="edu_school[]" placeholder="School">
                     <input type="text" name="edu_degree[]" placeholder="Degree">
                     <input type="text" name="edu_start[]" placeholder="Start">
                     <input type="text" name="edu_end[]" placeholder="End">`;
            container.appendChild(div);
        });

        document.getElementById('add-skill').addEventListener('click', function() {
            const container = document.getElementById('skills');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'skills[]';
            input.placeholder = 'Skill';
            container.appendChild(input);
        });

        document.getElementById('add-cert').addEventListener('click', function() {
            const container = document.getElementById('certifications');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'certifications[]';
            input.placeholder = 'Certification';
            container.appendChild(input);
        });

        document.getElementById('add-ref').addEventListener('click', function() {
            const container = document.getElementById('references');
            const div = document.createElement('div');
            div.classList.add('ref-item');
            div.innerHTML = `<input type="text" name="reference_name[]" placeholder="Reference name">
                     <input type="text" name="reference_contact[]" placeholder="Reference contact">`;
            container.appendChild(div);
        });
    </script>
@endsection
