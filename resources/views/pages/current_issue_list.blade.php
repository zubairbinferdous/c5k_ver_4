{{-- <!DOCTYPE html>
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

</html> --}}




@extends('./layouts.master')
@section('userContent')
    @include('pages.page_header_nav')

    <div class="container mx-auto py-10 px-4">
        @if ($volume_list_issue->isNotEmpty())
            @foreach ($volume_list_issue as $issue)
                <div class="bg-white border border-gray-200 rounded-lg hover:bg-gray-100 transition mb-6">
                    <div class="p-6">
                        <!-- Header -->
                        <div class="flex items-start mb-4">
                            <h1 class="text-2xl font-bold leading-snug relative font-serif">
                                <a href="{{ route('single.issue', ['id' => $journal->id, 'volumeId' => $issue->id, 'issueId' => $issue->issu_no]) }}"
                                   class="text-black no-underline border-b-2 border-transparent hover:border-black transition-all duration-300 inline-block pb-1">
                                    {{ $issue->articles_title }}
                                </a>
                            </h1>
                        </div>
    
                        <!-- Authors -->
                        <div class="text-gray-600 text-sm font-serif mb-4">
                            Author Name: {{ $issue->author }}
                        </div>
    
                        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-end gap-4">
                            <!-- Publication Info -->
                            <div>
                                <p class="text-blue-600 font-medium"><strong>Article ID:</strong> {{ $issue->paper }}</p>
                                <p class="text-sm text-gray-700">
                                    The article was first published Online on
                                    <span>{{ \Carbon\Carbon::parse($issue->online)->format('d F, Y') }}</span>
                                </p>
                                <div class="italic text-gray-600 font-serif mt-2">
                                    <strong>{{ $journal->title }}</strong>
                                </div>
                                <a href="#" class="text-blue-700 text-sm font-serif hover:underline">
                                    https://doi.org/10.103/xxx
                                </a>
                            </div>
    
                            <!-- Download Buttons -->
                            <div class="flex flex-col sm:flex-row gap-3">
                                @if (!empty($issue->pdf_file))
                                    <a href="{{ route('download_pdf', ['file' => $issue->pdf_file]) }}"
                                       class="min-w-[120px] px-4 py-2 text-center bg-yellow-300 text-black text-base font-serif hover:brightness-110 rounded"
                                       target="_blank">
                                        Download PDF
                                    </a>
                                @endif
                                <a href="{{ route('article.issue', ['id' => $journal->id, 'volumeId' => $issue->id, 'issueId' => $issue->issu_no]) }}"
                                   target="_blank"
                                   class="min-w-[120px] px-4 py-2 text-center bg-sky-600 text-white text-base font-serif hover:bg-sky-700 rounded">
                                    Article HTML
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center text-gray-500">No issues found for this volume.</p>
        @endif
    </div>

@endsection