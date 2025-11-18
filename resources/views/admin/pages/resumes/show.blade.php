@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>CV: {{ $resume->full_name }}</h1>
            <div>
                <a href="{{ route('admin.resumes.exportInAdmin', $resume->id) }}" class="btn btn-primary">Export to PDF</a>
                <a href="{{ route('admin.resumes.index') }}" class="btn btn-secondary">Back to list</a>
            </div>
        </div>

        <div class="card p-3">
            <div class="row">
                <div class="col-md-3 text-center">
                    @if ($resume->photo_path)
                        <img src="{{ asset($resume->photo_path) }}" alt="photo" class="img-fluid rounded">
                    @else
                        <div class="border rounded p-4">No photo</div>
                    @endif

                    @if ($resume->user)
                        <p class="mt-2"><strong>User:</strong> {{ $resume->user->name }}<br>
                            <small>{{ $resume->user->email }}</small>
                        </p>
                    @endif
                </div>

                <div class="col-md-9">
                    <h4>Contact</h4>
                    <p>{{ $resume->email }} | {{ $resume->phone }}</p>
                    <p>{{ $resume->address }}</p>
                    <p><strong>LinkedIn:</strong> {{ $resume->linkedin }}</p>

                    <h4>Tentang</h4>
                    <p>{{ $resume->about }}</p>

                    <h4>Pengalaman Kerja</h4>
                    @foreach ($resume->work_experiences ?? [] as $work)
                        <div class="mb-2">
                            <strong>{{ $work['title'] ?? '' }}</strong> — {{ $work['company'] ?? '' }}<br>
                            <small>{{ $work['start'] ?? '' }} - {{ $work['end'] ?? '' }} —
                                {{ $work['location'] ?? '' }}</small>
                        </div>
                    @endforeach

                    <h4>Pendidikan</h4>
                    @foreach ($resume->educations ?? [] as $edu)
                        <div class="mb-2">
                            <strong>{{ $edu['school'] ?? '' }}</strong> — {{ $edu['degree'] ?? '' }}<br>
                            <small>{{ $edu['start'] ?? '' }} - {{ $edu['end'] ?? '' }}</small>
                        </div>
                    @endforeach

                    <h4>Keahlian</h4>
                    <p>{{ implode(', ', $resume->skills ?? []) }}</p>

                    <h4>Referensi</h4>
                    @foreach ($resume->references ?? [] as $reference)
                        <div>{{ $reference['name'] ?? '' }} — {{ $reference['contact'] ?? '' }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
