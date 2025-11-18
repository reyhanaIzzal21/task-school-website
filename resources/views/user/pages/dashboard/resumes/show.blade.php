<div id="cv" class="content-section mt-4 d-none">
    <h1>{{ $resume->full_name }}</h1>
    <h4>NIK: {{ $resume->nik }}</h4>
    <h4>Domicile: {{ $resume->domicile }}</h4>
    @if ($resume->photo_path)
        <img src="{{ asset($resume->photo_path) }}" alt="photo" style="width:150px">
    @endif
    <p>{{ $resume->email }} | {{ $resume->phone }}</p>
    <p>{{ $resume->address }}</p>
    <p>{{ $resume->about }}</p>

    <h3>Work Experiences</h3>
    @foreach ($resume->work_experiences ?? [] as $work)
        <div>
            <strong>{{ $work['title'] ?? '' }}</strong> - {{ $work['company'] ?? '' }} ({{ $work['start'] ?? '' }} -
            {{ $work['end'] ?? '' }})
            <div>{{ $work['location'] ?? '' }}</div>
        </div>
    @endforeach

    <h3>Education</h3>
    @foreach ($resume->educations ?? [] as $edu)
        <div>
            <strong>{{ $edu['school'] ?? '' }}</strong> - {{ $edu['degree'] ?? '' }} ({{ $edu['start'] ?? '' }} -
            {{ $edu['end'] ?? '' }})
        </div>
    @endforeach

    <h3>Skills</h3>
    <ul>
        @foreach ($resume->skills ?? [] as $skill)
            <li>{{ $skill }}</li>
        @endforeach
    </ul>

    <a href="{{ route('resumes.export', $resume->id) }}" class="btn btn-primary">Export to PDF</a>
    <a href="{{ route('resumes.edit', $resume->id) }}" class="btn btn-secondary">Edit</a>
</div>

