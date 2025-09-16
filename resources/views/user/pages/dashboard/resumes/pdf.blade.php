<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $resume->full_name }} - Resume</title>
    <style>
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 12px;
            color: #111;
        }

        .container {
            padding: 20px;
            max-width: 800px;
            margin: auto;
            background: #ffffff;
        }

        .header {
            text-align: center;
        }

        .photo {
            width: 150px;
            border: 6px solid #fff;
            box-shadow: 0 0 0 1px #ccc;
            margin: 0 auto;
        }

        h1 {
            font-size: 18px;
            margin-top: 12px;
        }

        .section {
            margin-top: 18px;
            border-top: 1px solid #ddd;
            padding-top: 12px;
        }

        .two-col {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            @if ($resume->photo_path)
                <img class="photo" src="{{ public_path($resume->photo_path) }}" alt="photo" />
            @endif
            <h1>{{ strtoupper($resume->full_name) }}</h1>
            <div>{{ $resume->phone }} | {{ $resume->email }} | {{ $resume->address }}</div>
            <div>{{ $resume->linkedin }}</div>
        </div>

        <div class="section">
            <h3>Tentang Saya</h3>
            <p>{{ $resume->about }}</p>
        </div>

        <div class="section">
            <h3>Pengalaman Kerja</h3>
            @foreach ($resume->work_experiences ?? [] as $work)
                <div>
                    <strong>{{ $work['title'] ?? '' }}</strong> — {{ $work['company'] ?? '' }}
                    ({{ $work['start'] ?? '' }} - {{ $work['end'] ?? '' }})<br>
                    <em>{{ $work['location'] ?? '' }}</em>
                </div>
                <br>
            @endforeach
        </div>

        <div class="section">
            <h3>Pendidikan</h3>
            @foreach ($resume->educations ?? [] as $edu)
                <div>
                    <strong>{{ $edu['school'] ?? '' }}</strong> — {{ $edu['degree'] ?? '' }}
                    ({{ $edu['start'] ?? '' }} - {{ $edu['end'] ?? '' }})
                </div>
            @endforeach
        </div>

        <div class="section">
            <h3>Keahlian & Sertifikat</h3>
            <div>
                <strong>Skills:</strong>
                {{ implode(', ', $resume->skills ?? []) }}
            </div>
            <div>
                <strong>Certifications:</strong>
                {{ implode(', ', $resume->certifications ?? []) }}
            </div>
        </div>

        <div class="section">
            <h3>Referensi</h3>
            @foreach ($resume->references ?? [] as $reference)
                <div>{{ $reference['name'] ?? '' }} — {{ $reference['contact'] ?? '' }}</div>
            @endforeach
        </div>
    </div>
</body>

</html>
