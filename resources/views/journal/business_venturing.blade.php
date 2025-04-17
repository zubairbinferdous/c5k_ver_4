{{-- <title>{{ $journal->title ?? 'Default Title' }}</title>
@include('layout.header')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet">

@include('pages.page_header_nav')

<section class="about">
  <div class="container pb-5" style="background-color: #E2F1FB;">
    <h1 class="pt-3" style="font-family: 'Georgia', serif; font-size: 24px; color: black; font-weight: 600;">About the journal</h1>
    <p class="mt-4 mb-3" style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; text-align: justify; font-size: 16px; color: black;">
      {!! str_limit(strip_tags($journal->aim_scope), 400, ' ...') !!}
    </p>
    <a href="#" class="mb-5" style="font-family: 'Georgia', serif; color: blue;" data-toggle="modal" data-target="#aimsModal">View full aims & scope</a>
  </div>
</section>

<section class="mb-2"></section>

<section class="about">
  <div class="container" id="journal-over-view">
    <div class="row mt-3 d-flex justify-content-between" style="border-bottom: 1px solid #E4E4E4;">
      <h1 class="pl-3" style="font-family: 'Georgia', serif; font-size: 24px; color: black; font-weight: 600;">Journal Insights</h1>
    </div>

    <div class="row pb-3" style="border-bottom: 1px solid #E4E4E4;">
      <div class="col-md-3 col-lg-3 col-sm-6">
        <h5 class="mt-4" style="font-family: 'Georgia', serif; font-size: 18px; color: black; font-weight: 600;">Aims & Scope</h5>
      </div>
      <div class="col-md-9 col-lg-9 col-sm-6">
        <p class="mt-4 mb-3" style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; text-align: justify; font-size: 16px; color: black;">
          {!! str_limit(strip_tags($journal->aim_scope), 200, ' ...') !!}
        </p>
        <a href="#" class="mb-5" style="font-family: 'Georgia', serif; color: blue;" data-toggle="modal" data-target="#aimsModal">View full aims & scope</a>
      </div>
    </div>

    <div class="row pb-3" style="border-bottom: 1px solid #E4E4E4;">
      <div class="col-md-3 col-lg-3 col-sm-6">
        <h5 class="mt-4" style="font-family: 'Georgia', serif; font-size: 18px; color: black; font-weight: 600;">ISSN</h5>
      </div>
      <div class="col-md-9 col-lg-9 col-sm-6">
        <h6 class="mt-4 mb-3" style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; font-size: 16px; color: black;">Online ISSN: XXX-YYY</h6>
      </div>
    </div>

    <div class="row pb-3" style="border-bottom: 1px solid #E4E4E4;">
      <div class="col-md-3 col-lg-3 col-sm-6">
        <h5 class="mt-4" style="font-family: 'Georgia', serif; font-size: 18px; color: black; font-weight: 600;">Subject Areas</h5>
      </div>
      <div class="col-md-9 col-lg-9 col-sm-6">
        <p class="mt-4 mb-3" style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; text-align: justify; font-size: 16px; color: black;">{!! strip_tags($journal->subject_area) !!}</p>
      </div>
    </div>

    <div class="row pb-3" style="border-bottom: 1px solid #E4E4E4;">
      <div class="col-md-3 col-lg-3 col-sm-6">
        <h5 class="mt-4" style="font-family: 'Georgia', serif; font-size: 18px; color: black; font-weight: 600;">Article publishing charge</h5>
      </div>

      <div class="col-md-9 col-lg-9 col-sm-6">
        <h4 class="mt-4" style="font-family: 'Georgia', serif; font-size: 24px; color: black;"><i><b>$500</b></i></h4>
        <h6 class="mb-2" style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; font-size: 16px; color: black;">Article publishing charge for open access</h6>
        <p class="mb-3" style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; text-align: justify; font-size: 16px; color: black;">{!! strip_tags($journal->article_charge) !!}</p>
      </div>
    </div>

    <div class="row pb-3">
      <div class="col-md-3 col-lg-3 col-sm-6">
        <h5 class="mt-4" style="font-family: 'Georgia', serif; font-size: 18px; color: black; font-weight: 600;">Publishing timeline</h5>
      </div>
      <div class="col-md-9 col-lg-9 col-sm-6">
        <div class="container">
          <div class="row">
            <div class="col border-end">
              <h4 class="mt-4" style="font-family: 'Georgia', serif; font-size: 24px; color: black;"><i><b>4 days</b></i></h4>
              <h6 style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; font-size: 16px; color: black;">Time to first decision</h6>
            </div>
            <div class="col border-end">
              <h4 class="mt-4" style="font-family: 'Georgia', serif; font-size: 24px; color: black;"><i><b>21 days</b></i></h4>
              <h6 style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; font-size: 16px; color: black;">Review time</h6>
            </div>
            <div class="col border-end">
              <h4 class="mt-4" style="font-family: 'Georgia', serif; font-size: 24px; color: black;"><i><b>15 days</b></i></h4>
              <h6 style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; font-size: 16px; color: black;">Revision time</h6>
            </div>
            <div class="col border-end">
              <h4 class="mt-4" style="font-family: 'Georgia', serif; font-size: 24px; color: black;"><i><b>40 days</b></i></h4>
              <h6 style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; font-size: 16px; color: black;">Submission to Acceptance</h6>
            </div>
            <div class="col">
              <h4 class="mt-4" style="font-family: 'Georgia', serif; font-size: 24px; color: black;"><i><b>7 days</b></i></h4>
              <h6 style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; font-size: 16px; color: black;">Acceptance to publication</h6>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row pb-3 about">
      <div class="col-md-3 col-lg-3 col-sm-6">
        <h5 class="mt-4" style="font-family: 'Georgia', serif; font-size: 18px; color: black; font-weight: 600;">Abstracting and indexing</h5>
      </div>
      <div class="d-flex align-items-center col-md-9 col-lg-9 col-sm-6">
        <ul class="mt-3" style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; font-size: 16px; color: black;">
          <li>Google Scholar</li>
          <li>Directory of Open Access Journals (DOAJ)</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade about" id="aimsModal" tabindex="-1" role="dialog" aria-labelledby="aimsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="aimsModalLabel">{{$journal->title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="aims-scope-section about">
          <h2><b>Aim and Scope</b></h2>
          <p class="about"> {!! $journal->aim_scope !!}</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@include('layout.footer_nav')
@include('layout.footer')
@include('layout.js')

</body>
</html> --}}



@extends('./layouts.master')
@section('userContent')

  @include('pages.page_header_nav')


  <section class="">
      <div class="containers">
          <div class="journal_sub_info">
              <h3>About the journal</h3>
              <p>{!! str_limit(strip_tags($journal->aim_scope), 400, ' ...') !!}</p>
              <button class="view_scope_btn" onclick="my_modal_3.showModal()">View full aims & scope</button>
          </div>
      </div>
  </section>


  <section class="about_desc">
      <div class="containers">
          <div class="mt-3" style="border-bottom: 1px solid #E4E4E4;">
            <h1 class="pl-3" style="font-family: 'Georgia', serif; font-size: 24px; color: black; font-weight: 600;">Journal Insights</h1>
          </div>

          <div class="row_content">
            <div class="md:w-3/12 lg:w-3/12 sm:w-6/12">
              <h5 class="mt-4" style="font-family: 'Georgia', serif; font-size: 18px; color: black; font-weight: 600;">Aims & Scope</h5>
            </div>

            <div class="md:w-9/12 lg:w-9/12 sm:w-6/12">
              <p class="mt-4 mb-3" style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; text-align: justify; font-size: 16px; color: black;">
                {!! str_limit(strip_tags($journal->aim_scope), 200, ' ...') !!}
              </p>
              <button style="font-family: 'Georgia', serif; color: blue;" onclick="my_modal_3.showModal()">View full aims & scope</button>
            </div>
          </div>

          <div class="row_content">
            <div class="md:w-3/12 lg:w-3/12 sm:w-6/12">
              <h5 class="mt-4" style="font-family: 'Georgia', serif; font-size: 18px; color: black; font-weight: 600;">ISSN</h5>
            </div>

            <div class="md:w-9/12 lg:w-9/12 sm:w-6/12">
              <p class="mt-4 mb-3" style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; text-align: justify; font-size: 16px; color: black;">
                  Online ISSN: XXX-YYY, Offline ISSN: XXX-YYY
              </p>
            </div>
          </div>

          <div class="row_content">
            <div class="md:w-3/12 lg:w-3/12 sm:w-6/12">
              <h5 class="mt-4" style="font-family: 'Georgia', serif; font-size: 18px; color: black; font-weight: 600;">Subject Areas</h5>
            </div>

            <div class="md:w-9/12 lg:w-9/12 sm:w-6/12">
              <p class="mt-4 mb-3" style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; text-align: justify; font-size: 16px; color: black;">
                  {!! strip_tags($journal->subject_area) !!}
              </p>
            </div>
          </div>

          <div class="row_content">
            <div class="md:w-3/12 lg:w-3/12 sm:w-6/12">
              <h5 class="mt-4" style="font-family: 'Georgia', serif; font-size: 18px; color: black; font-weight: 600;">Article publishing charge</h5>
            </div>

            <div class="md:w-9/12 lg:w-9/12 sm:w-6/12">
              <h4 class="mt-4" style="font-family: 'Georgia', serif; font-size: 24px; color: black;"><i><b>$500</b></i></h4>
              <h6 class="mb-2" style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; font-size: 16px; color: black;">Article publishing charge for open access</h6>
              <p class="mt-4 mb-3" style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; text-align: justify; font-size: 16px; color: black;">
                  {!! strip_tags($journal->article_charge) !!}
              </p>
            </div>
          </div>

          <div class="row_content">
            <div class="md:w-3/12 lg:w-3/12 sm:w-6/12">
              <h5 class="mt-4" style="font-family: 'Georgia', serif; font-size: 18px; color: black; font-weight: 600;">Publishing timeline</h5>
            </div>

            <div class="md:w-9/12 lg:w-9/12 sm:w-6/12">
              <div class="container_timeline">
                  <div class="col border-end">
                    <h4 class="mt-4" style="font-family: 'Georgia', serif; font-size: 24px; color: black;"><i><b>4 days</b></i></h4>
                    <h6 style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; font-size: 16px; color: black;">Time to first decision</h6>
                  </div>
                  
                  <div class="col border-end">
                    <h4 class="mt-4" style="font-family: 'Georgia', serif; font-size: 24px; color: black;"><i><b>21 days</b></i></h4>
                    <h6 style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; font-size: 16px; color: black;">Review time</h6>
                  </div>

                  <div class="col border-end">
                    <h4 class="mt-4" style="font-family: 'Georgia', serif; font-size: 24px; color: black;"><i><b>15 days</b></i></h4>
                    <h6 style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; font-size: 16px; color: black;">Revision time</h6>
                  </div>

                  <div class="col border-end">
                    <h4 class="mt-4" style="font-family: 'Georgia', serif; font-size: 24px; color: black;"><i><b>40 days</b></i></h4>
                    <h6 style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; font-size: 16px; color: black;">Submission to Acceptance</h6>
                  </div>

                  <div class="col">
                    <h4 class="mt-4" style="font-family: 'Georgia', serif; font-size: 24px; color: black;"><i><b>7 days</b></i></h4>
                    <h6 style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; font-size: 16px; color: black;">Acceptance to publication</h6>
                  </div>
              </div>
            </div>
          </div>

          <div class="row_content">
            <div class="md:w-3/12 lg:w-3/12 sm:w-6/12">
              <h5 class="mt-4" style="font-family: 'Georgia', serif; font-size: 18px; color: black; font-weight: 600;">Abstracting and indexing</h5>
            </div>

            <div class="md:w-9/12 lg:w-9/12 sm:w-6/12">
              <p class="mt-4 mb-3" style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; text-align: justify; font-size: 16px; color: black;">
                <ul class="mt-3" style="font-family: 'Merriweather', 'Times New Roman', Georgia, Garamond, serif; font-size: 16px; color: black; padding-left: 20px;">
                  <li style="list-style: disc;">Google Scholar</li>
                  <li style="list-style: disc;">Directory of Open Access Journals (DOAJ)</li>
                </ul>
              </p>
            </div>
          </div>
      </div>
  </section>

    {{-- Modal View --}}
    <dialog id="my_modal_3" class="modal">
      <div class="modal-box w-8/12 max-w-5xl modal_typo">

        {{-- Action Cross Btn --}}
        <form method="dialog">
          <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>

        <h3 class="">{{$journal->title}}</h3>
        <h2>Aim and Scope</h2>
        <div class="journal_modal_desc">
          {!! $journal->aim_scope !!}
        </div>

        {{-- Action Close Btn --}}
        <div class="modal-action">
          <form method="dialog">
            <!-- if there is a button in form, it will close the modal -->
            <button class="btn">Close</button>
          </form>
        </div>

      </div>

      {{-- Outside Close Modal --}}
      <form method="dialog" class="modal-backdrop">
        <button>close</button>
      </form>
    </dialog>

@endsection