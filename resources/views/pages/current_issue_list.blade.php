@extends('./layouts.master')
@section('userContent')
    @include('pages.page_header_nav')

    <div class="containers mx-auto py-10 px-4">
        @if ($volume_list_issue->isNotEmpty())
            @foreach ($volume_list_issue as $issue)
                <div class="mb-8 border-b pb-6">
                    <div class="space-y-4">
                        <!-- Header -->
                        <div class="flex items-start mb-3">
                            <div>
                                <h1 class="text-2xl font-semibold text-blue-700 hover:underline">
                                    <a
                                        href="{{ route('single.issue', ['id' => $journal->id, 'volumeId' => $issue->id, 'issueId' => $issue->issu_no, 'Article_ID' => $issue->paper]) }}">
                                        {{ $issue->articles_title }}
                                    </a>
                                </h1>
                            </div>
                        </div>

                        <!-- Authors -->
                        <div class="text-gray-600 text-sm mb-4">
                            Author Name: <span class="font-medium text-gray-800">{{ $issue->author }}</span>
                        </div>

                        <div class="flex flex-col lg:flex-row lg:justify-between gap-4">
                            <!-- Publication Info -->
                            <div class="text-sm text-gray-700 space-y-2">
                                <p class="text-blue-600 font-semibold">Article ID: {{ $issue->paper }}</p>
                                <p>
                                    The article was first published Online on
                                    <span
                                        class="font-medium text-gray-900">{{ \Carbon\Carbon::parse($issue->online)->format('d F, Y') }}</span>
                                </p>
                                <div class="font-semibold text-gray-800">
                                    {{ $journal->title }}
                                </div>
                                <a href="#" class="text-blue-500 hover:underline text-sm">
                                    https://doi.org/10.103/xxx
                                </a>
                            </div>

                            <!-- Download Buttons -->
                            <div class="flex flex-col sm:flex-row gap-3 items-start sm:items-end">
                                @if (!empty($issue->pdf_file))
                                    <a href="{{ route('download_pdf', ['file' => $issue->pdf_file]) }}"
                                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 text-sm"
                                        target="_blank">
                                        Download PDF
                                    </a>
                                @endif



                                <a href="{{ route('article.issue', ['id' => $journal->id, 'volumeId' => $issue->id, 'issueId' => $issue->issu_no]) }}"
                                    target="_blank"
                                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
                                    Article HTML
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-gray-500 text-center text-lg">No issues found for this volume.</p>
        @endif
    </div>



@endsection
