<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C5k | All Articles</title>
    <title>{{ $journal->title ?? 'Issue List' }}</title>
    @include('layout.header')
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
            <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet">

        body {
            font-family: 'Merriweather', "Times New Roman", Georgia, Garamond, serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            background: white;
            color: #007BFF;

            ;
            padding: 1rem;
            height: 100vh;
            overflow-y:scroll;
            border-radius: 10px;
            padding-bottom: 20px;
            font-family: 'Merriweather', "Times New Roman", Georgia, Garamond, serif;

        }

        .sidebar h2 {
            font-family: "Georgia", serif;

            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            font-family: 'Merriweather', "Times New Roman", Georgia, Garamond, serif;

        }

        .sidebar ul li {
            margin-bottom: 0.5rem;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #007BFF

            ;
            font-family: Georgia, serif;

            display: block;
            padding: 0.5rem;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .sidebar ul li a:hover {
            background: #2e343a;
            color:white;
        }

        .content {
            padding: 2rem;
            font-family: 'Merriweather', "Times New Roman", Georgia, Garamond, serif;

        }

        .issue-container {
            background-color: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            transition: background-color 0.3s ease;
        }

        .issue-container  a {
            color: black !important;
            font-family: Georgia, serif;

           
        }
        .issue-container:hover {
            background-color: #f8f9fa;
        }
.content p{
    font-family: 'Merriweather', "Times New Roman", Georgia, Garamond, serif;

}
        .btn-download1 {
            background: rgb(250, 244, 0);
            color: black;
            border-radius: 5px;
        }

        .btn-download {
            background: rgb(0, 154, 203);
            color: white;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3 sidebar">
            <h2 class="text-center">Journals</h2>
            <ul>
                @foreach($articles as $journalTitle => $journalArticles)
                    <li><a href="#" class="journal-link" data-journal="{{ $journalTitle }}">{{ $journalTitle }}</a></li>
                @endforeach
            </ul>
        </div>
        
        <div class="col-md-9 content">
            <h1 class="text-center my-4">All Articles</h1>
            <div class="row">
                @foreach($articles as $journalTitle => $journalArticles)
                    <div class="col-12 journal-section" data-journal="{{ $journalTitle }}">
                        <div class="mb-4 p-3 border rounded">
                            <h4>{{ $journalTitle }}</h4>
                            @foreach($journalArticles as $issue)
                                <div class="issue-container">
                                    <h5>
                                        <a href="{{ route('single.issue', ['id' => $issue->journal_idd, 'volumeId' => $issue->volume_id, 'issueId' => $issue->id]) }}" class="text-primary">
                                            {{ $issue->article_title }}
                                        </a>
                                    </h5>
                                    <p><strong>Author Name:</strong> {{ $issue->author_name }}</p>
                                    <p class="text-primary"><strong>Article ID:</strong> {{ $issue->paper_id }}</p>
                                    <p>First published Online: <span>{{ \Carbon\Carbon::parse($issue->online_first)->format('d F, Y') }}</span></p>
                                    <p  class="text-primary">https://doi.org/10.103/xxx</p>
                                    <div class="d-flex gap-4 mr-2 justify-content-end">
                                        @if (!empty($issue->file_path))
                                            <a href="{{ route('download_pdf', ['file' => $issue->file_path]) }}" class="btn mr-2 btn-download1">
                                                Download PDF
                                            </a>
                                        @endif
                                        <a target="_blank" class="btn btn-download">Article HTML</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('layout.footer_nav')
@include('layout.footer')
@include('layout.js')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const journalLinks = document.querySelectorAll('.journal-link');
        const journalSections = document.querySelectorAll('.journal-section');
        
        journalLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                let selectedJournal = this.getAttribute('data-journal');
                
                journalSections.forEach(section => {
                    section.style.display = section.getAttribute('data-journal') === selectedJournal ? 'block' : 'none';
                });
            });
        });
    });
</script>
</body>
</html>
