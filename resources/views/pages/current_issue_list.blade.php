<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $journal->title ?? 'Issue List' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @include('layout.header')
    <style>
        .correction-icon {
            color: #ffd700;
            font-size: 1.5rem;
            margin-right: 0.5rem;
        }

        .article-title-list {
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.4;
            position: relative;
        }

        .article-title-list a {
            color: black;
            text-decoration: none;
            display: inline-block;
            padding-bottom: 4px;
            border-bottom: 2px solid transparent;
            transition: all 0.3s ease;
            font-family: Georgia, serif;

        }

        .article-title-list a:hover {
            border-bottom: 2px solid black;

        }

        .authors {
            color: #505050;
            font-size: 0.95rem;
            font-family: 'Merriweather', "Times New Roman", Georgia, Garamond, serif;

        }

        .journal-info {
            font-style: italic;
            color: #505050;
            font-family: 'Merriweather', "Times New Roman", Georgia, Garamond, serif;

        }

        .btn-download1 {
            display: inline-block;
            min-width: 120px;
            text-align: center;
            padding: 0.5rem 1rem;
            /* Adjust padding for better size */
            font-size: 1rem;
            /* Adjust font size for consistency */
            line-height: 1.5;
            /* Set consistent line-height */
            vertical-align: middle;
            /* Align button with other inline elements */
            background: rgb(250, 244, 0);
            color: black;
            font-family: 'Merriweather', "Times New Roman", Georgia, Garamond, serif;
            text-decoration: none;

        }

        .btn-download1:hover {
            text-decoration: none;
            color: black;
        }

        .btn-download {
            background: rgb(0, 154, 203);
            display: inline-block;
            min-width: 120px;
            text-align: center;
            padding: 0.5rem 1rem;
            /* Adjust padding for better size */
            font-size: 1rem;
            /* Adjust font size for consistency */
            line-height: 1.5;
            /* Set consistent line-height */
            vertical-align: middle;
            /* Align button with other inline elements */
            color: white;
            font-family: 'Merriweather', "Times New Roman", Georgia, Garamond, serif;


        }


        .btn-download:hover {
            text-decoration: none;
            color: rgb(255, 255, 255);
        }


        .issue-container {
            background-color: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .issue-container:hover {
            background-color: #f8f9fa;
        }

        .issue-content {
            padding: 1.5rem;
            font-family: 'Merriweather', "Times New Roman", Georgia, Garamond, serif;

        }

        .doi-link {
            text-decoration: none;
            font-size: 0.95rem;
            font-family: 'Merriweather', "Times New Roman", Georgia, Garamond, serif;

        }

        .doi-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="bg-light">
    @include('pages.page_header_nav')

    <div class="container py-5">
        @if ($volume_list_issue->isNotEmpty())
            @foreach ($volume_list_issue as $issue)
                <div class="issue-container mb-4">
                    <div class="issue-content">
                        <!-- Header -->
                        <div class="d-flex align-items-start mb-3">
                            <div>
                                <h1 class="article-title-list">
                                    <a
                                        href="{{ route('single.issue', ['id' => $journal->id, 'volumeId' => $issue->id, 'issueId' => $issue->issu_no]) }}">
                                        {{ $issue->articles_title }}
                                    </a>
                                </h1>
                            </div>
                        </div>

                        <!-- Authors -->
                        <div class="authors mb-4">
                            Author Name: {{ $issue->author }}
                        </div>
                        <div class="d-flex justify-content-lg-between  flex-row flex-lg-col">
                            <!-- Publication Info -->
                            <div class=" d-flex justify-content-end align-items-end">
                                <div>
                                    <div class="">
                                        <p class="text-primary"> <strong> Article ID:</strong> {{ $issue->paper }}</p>
                                        <p>The article was first published Online on
                                            <span>{{ \Carbon\Carbon::parse($issue->online)->format('d F, Y') }}</span>
                                        </p>
                                    </div>
                                    <div class="journal-info">

                                        <strong>{{ $journal->title }}</strong>
                                    </div>
                                    <a href="#" class="doi-link">
                                        https://doi.org/10.103/xxx
                                    </a>
                                </div>
                            </div>
                            <!-- Download Buttons -->
                            <div class="d-flex gap-2 justify-content-end align-items-end">
                                <div>
                                    @if (!empty($issue->pdf_file))
                                        <a href="{{ route('download_pdf', ['file' => $issue->pdf_file]) }}"
                                            class="btn-download1 mr-2 cursor-pointer" target="_blank">
                                            Download PDF
                                        </a>
                                    @endif
                                </div>
                                <div>
                                    <a href="{{ route('article.issue', ['id' => $journal->id, 'volumeId' => $issue->id, 'issueId' => $issue->issu_no]) }}"
                                        target="_blank" class=" btn-download cursor-pointer">
                                        Article HTML
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-muted text-center">No issues found for this volume.</p>
        @endif
    </div>

    @include('layout.footer_nav')
    @include('layout.footer')
    @include('layout.js')
</body>

</html>
