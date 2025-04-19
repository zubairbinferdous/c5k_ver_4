@extends('./layouts.master')
@section('userContent')
    @include('pages.page_header_nav')
    <div class="container ">
        <div class="row main-sect-issu py-2 mt-4 ">
            <div class="col-lg-8 single-issu-section h-auto  bg-white shadow">
                <section class="banner-section ">
                    <div class="row align-items-center justify-content-center bg-white  rounded">
                        <div class="col-lg-3 col-12 text-center logo-img">
                            <img src="{{ asset('public/front/images/newlogo2.jpg') }}" alt="Logo" class=>
                        </div>
                        <div class="col-lg-6 text-center">
                            <div class="journal-name">
                                <a href="{{ url('academic-journal') }}">
                                    {{ $journal->title }}
                                </a>
                            </div>
                            <h6 class="mt-3">
                                <span class="text-primary"> Volume 1, Issue 1</span>,
                                {{ \Carbon\Carbon::parse($issuDetails->online_first)->format('d F, Y') }}
                            </h6>
                        </div>
                        <div class="col-lg-3 text-center">
                            <a href="{{ route('journal.show', ['slug' => $journal->slug, 'id' => $journal->id]) }}">
                                <img src="{{ asset('public/backend/journal/' . $journal->journal_image) }}"
                                    class="image-img">
                            </a>

                        </div>
                </section>
                <div>

                </div>

                <div class="article-title">
                    {{ $issuDetails->title }}
                </div>

                <div class="container">
                    <div class="author-list text-primary py-3">
                        <!-- Authors Section -->
                        <h5 class="mb-3">Authors</h5>
                        <div class="d-flex flex-wrap authors-name align-items-center gap-2">
                            @foreach ($authorsWithAffiliation as $author)
                                <a href="#" class="text-decoration-none">
                                    {{ $author->author_name }}
                                    <sup>{{ $author->affiliation_number }}</sup>
                                    @if ($loop->first)
                                        <!-- User and Mail icons for the first author -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icon-tabler-user">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icon-tabler-mail" onclick="openSideDrawer()">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                            <path d="M3 7l9 6l9 -6" />
                                        </svg>
                                    @endif
                                </a>
                                @if (!$loop->last)
                                    ,&nbsp;
                                @endif
                            @endforeach
                        </div>

                        <!-- Affiliations Section -->
                        <div class="collapse mt-3" id="moreContent">
                            <h5 class="mt-3">Affiliations</h5>
                            @foreach ($affiliations as $index => $affiliation)
                                <p class="mb-2">
                                    <sup>{{ $index + 1 }}</sup>
                                    {{ collect([$affiliation->department, $affiliation->university, $affiliation->address])->filter(function ($value) {
                                            return !empty($value);
                                        })->join(', ') }}
                                </p>
                            @endforeach

                        </div>

                        <!-- Toggle Button -->
                        <button class="btn btn-link text-primary p-0 mt-2" data-toggle="collapse" data-target="#moreContent"
                            aria-expanded="false" aria-controls="moreContent">
                            <span class="show-more">Show more</span>
                            <span class="show-less d-none">Show less</span>
                        </button>
                    </div>
                </div>
                <div id="sideDrawer" class="side-drawer">
                    <div class="drawer-content">
                        <button class="close-btn" onclick="closeSideDrawer()">×</button>
                        <h5>Author's Details</h5>
                        <p><strong>Name:</strong> {{ $authorsWithAffiliation->first()->author_name }}</p>
                        <p><strong>Email:</strong>
                            <a href="mailto:{{ $authorsWithAffiliation->first()->email }}" class="text-primary">
                                {{ $authorsWithAffiliation->first()->email }}
                            </a>
                        </p>
                        <p><strong>Department:</strong> {{ $authorsWithAffiliation->first()->department }}</p>
                        <p><strong>Affiliation Number:</strong>
                            {{ $authorsWithAffiliation->first()->affiliation_number }}</p>
                        <p><strong>Address:</strong> {{ $authorsWithAffiliation->first()->address }}</p>
                    </div>
                </div>

                <div class="custom-link pl-3 mb-3">
                    <a href="#">
                        https://doi.org/10.103/xxx
                    </a>
                </div>




                <div class="abstract-section">
                    <h5>Abstract</h5>
                    <div>{{ Str::limit($issuDetails->description, 1500, '...') ?? 'No abstract available.' }}</div>
                </div>
                <div class="d-flex flex-column keyword">
                    <p class="mb-0">Keywords:&nbsp;</p>
                    <p class="text-black mt-2">
                        {{ $issuDetails->keyword ?? 'AI, Business, Artificial intelligence, Algorithms, Data privacy' }}
                    </p>
                </div>

            </div>

            <div class="col-lg-4 shadow ">
                <ul class="nav nav-tabs mt-4 w-100" id="issueTabs" role="tablist"
                    style=" background: rgb(0, 154, 203);color:white;">
                    <li class="nav-item flex-fill">
                        <a class="nav-link active text-white text-center" id="about-tab" data-toggle="tab" href="#about"
                            role="tab">About</a>
                    </li>
                    <li class="nav-item flex-fill">
                        <a class="nav-link text-white text-center" id="cited-tab" data-toggle="tab" href="#cited"
                            role="tab">Cited by</a>
                    </li>
                    <li class="nav-item flex-fill">
                        <a class="nav-link text-white text-center" id="related-tab" data-toggle="tab" href="#related"
                            role="tab">Related</a>
                    </li>
                </ul>
                <div class="tab-content mt-3" id="issueTabsContent">
                    <div class="tab-pane fade show active" id="about" role="tabpanel">
                        <div class="mb-4">
                            <a href="{{ route('download_pdf', ['file' => $issuDetails->file_path]) }}"
                                class="btn download1 w-100 text-left py-3 mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong class="d-block">Download This Article</strong>
                                        <small>PDF format</small>
                                    </div>
                                    <i class="bi bi-download fs-4"></i>
                                </div>

                            </a>
                            <div>
                                <a href="#" target="_blank"
                                    class="btn download2 w-100 text-left py-3 cursor-pointer">
                                    <i class="bi bi-file-text mr-2"></i>
                                    Article HTML
                                </a>
                            </div>


                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="container  py-4">
                                    <!-- Citation Section -->
                                    <div class="mb-4">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h2 class="h6 text-black mb-0">Citation</h2>
                                            <div class="d-flex align-items-center gap-2">
                                                <select class="form-select form-select-sm w-auto"
                                                    aria-label="Citation format">
                                                    <option value="bibtex" selected>BibTeX</option>
                                                    <option value="ris">RIS</option>
                                                    <option value="endnote">EndNote</option>
                                                </select>
                                                <button class="btn btn-sm ml-2 btn-primary">Go</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Share Section -->
                                    <div class="mb-4">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h2 class="h6 text-black mb-0">Share</h2>
                                            <div class="d-flex align-items-center gap-">
                                                <!-- Facebook Icon -->

                                                <!-- Email Icon -->
                                                <a href="mailto:example@example.com" class="text-danger  mr-2 ml-2"
                                                    aria-label="Share via Email">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-mail">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                                        <path d="M3 7l9 6l9 -6" />
                                                    </svg>
                                                </a>
                                                <a href="www.linkedin.com" class="text-danger  mr-2 ml-2"
                                                    aria-label="Share via Email">
                                                    <a href="#" class="text-primary mr-2 ml-2"
                                                        aria-label="Share on LinkedIn">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="#0A66C2" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-brand-linkedin">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <rect x="4" y="4" width="16" height="16"
                                                                rx="2" />
                                                            <line x1="8" y1="11" x2="8"
                                                                y2="16" />
                                                            <line x1="8" y1="8" x2="8"
                                                                y2="8.01" />
                                                            <line x1="12" y1="16" x2="12"
                                                                y2="11" />
                                                            <path d="M16 16v-3a2 2 0 0 0 -4 0" />
                                                        </svg>
                                                    </a>
                                                </a>
                                                <a href="#" class="text-primary mr-2 ml-2"
                                                    aria-label="Share on Facebook">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-brand-facebook">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div
                                class="d-flex align-items-center border p-3 gap-3 my-3 bg-white shadow-md rounded shadow-sm bg-light">
                                <!-- Open Access Icon -->
                                <div>
                                    <img style="{{ 'height:40px' }}"
                                        src={{ asset('public/frontend/img/openaccess.png') }} />
                                </div>
                                <span class="fw-bold me-2">This article is Open Access</span>
                                <!-- Creative Commons Badge -->
                                <a href="https://creativecommons.org/licenses/by-nc/4.0/" target="_blank"
                                    class="cc-badge ms-auto">
                                    <span class="ml-2">CC</span> BY-NC
                                </a>
                            </div>


                        </div>

                        <div class="card article-information">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Article Information</h5>
                                <dl style="display: flex; flex-wrap: wrap; gap: 10px;">
                                    <div style="flex-basis: 35%; font-weight: bold;">Article Type</div>
                                    <div style="flex-basis: 55%;" class="text-primary">Research Paper</div>

                                    <div style="flex-basis: 35%; font-weight: bold;">Submitted</div>
                                    <div style="flex-basis: 55%;" class="text-primary">
                                        {{ \Carbon\Carbon::parse($issuDetails->submited_date)->format('d F, Y') }}
                                    </div>

                                    <div style="flex-basis: 35%; font-weight: bold;">Revised</div>
                                    <div style="flex-basis: 55%;" class="text-primary">
                                        {{ \Carbon\Carbon::parse($issuDetails->revised_date)->format('d F, Y') }}
                                    </div>

                                    <div style="flex-basis: 35%; font-weight: bold;">Accepted</div>
                                    <div style="flex-basis: 50%;" class="text-primary">
                                        {{ \Carbon\Carbon::parse($issuDetails->accepted_date)->format('d F, Y') }}
                                    </div>

                                    <div style="flex-basis: 35%; font-weight: bold;">Online First</div>
                                    <div style="flex-basis: 55%;" class="text-primary">
                                        {{ \Carbon\Carbon::parse($issuDetails->online_first)->format('d F, Y') }}
                                    </div>
                                </dl>
                            </div>
                        </div>
                        <div class="py-4">
                            <div class="d-flex justify-content-center text-center align-items-center gap-5">
                                <!-- Total Views Card -->
                                <div class="stats-card">
                                    <img src="{{ asset('public/backend/logo/stats.jpg') }}" alt="Centered Image" />
                                    <span class="text-primary">{{ number_format($viewCount / 1000, 1) }}k</span>
                                    <p>Total Views</p>
                                </div>

                                <!-- Total Downloads Card -->
                                <div class="stats-card">
                                    <img src="{{ asset('public/backend/logo/stats.jpg') }}" alt="Centered Image" />
                                    <span class="text-primary">{{ number_format($downloadCount / 1000, 1) }}k</span>
                                    <p>Downloads</p>
                                </div>

                                <!-- Citations Card -->
                                <div class="stats-card">
                                    <img src="{{ asset('public/backend/logo/stats.jpg') }}" alt="Centered Image" />
                                    <span class="text-primary">0</span> <!-- Update this if citations are tracked -->
                                    <p>Citations</p>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="cited" role="tabpanel">
                        <p>This tab lists articles citing this work.</p>
                    </div>
                    <div class="tab-pane fade" id="related" role="tabpanel">
                        <div class="related-issues">
                            <h5>Related Issues</h5>
                            @forelse ($relatedIssues as $related)
                                <div class="issue mb-2">
                                    <a
                                        href="{{ route('single.issue', ['id' => $journal->id, 'volumeId' => $volumeId, 'issueId' => $related->id]) }}">
                                        {{ $related->title }}
                                    </a>
                                    <div>{{ $related->created_at }}</div>
                                </div>
                            @empty
                                <div>No related issues found.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            const toggleButton = $('[data-toggle="collapse"]');
            const moreText = toggleButton.find(".show-more");
            const lessText = toggleButton.find(".show-less");

            toggleButton.on("click", function() {
                const isExpanded = toggleButton.attr("aria-expanded") === "true";
                moreText.toggleClass("d-none", isExpanded);
                lessText.toggleClass("d-none", !isExpanded);
            });
        });
    </script>

    <script>
        function openSideDrawer() {
            document.getElementById('sideDrawer').classList.add('open');
        }

        function closeSideDrawer() {
            document.getElementById('sideDrawer').classList.remove('open');
        }
    </script>
@endpush
