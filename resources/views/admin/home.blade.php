@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('site.home')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item">@lang('site.home')</li>
    </ul>



    <div class="row my-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    @foreach($projects as $project)
                      <h2>{{$project->name}}</h2>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection







{{--@push('scripts')--}}

{{--    <script>--}}

{{--        $(function () {--}}

{{--            topStatistics();--}}
{{--            moviesChart("{{now()->year}}");--}}


{{--            // on change year of chart--}}

{{--            $("#movies-chart-year").on('change', function () {--}}

{{--                let year = $(this).find(':selected').val();--}}

{{--                moviesChart(year);--}}

{{--            });--}}


{{--        });--}}

{{--        function topStatistics() {--}}
{{--            $.ajax({--}}
{{--                url: "{{ route('admin.home.top_statistics') }}",--}}
{{--                cache: false,--}}
{{--                success: function (data) {--}}

{{--                    $('#top-statistics .loader-sm').hide();--}}

{{--                    $(' #genres_count').show().text(data.genres_count);--}}
{{--                    $(' #movies_count').show().text(data.movies_count);--}}
{{--                    $(' #actors_count').show().text(data.actors_count);--}}

{{--                },--}}

{{--            });//end of ajax call--}}
{{--        }--}}


{{--        //  to get chart--}}
{{--        function moviesChart(year) {--}}

{{--            let loader = `--}}

{{--                    <div class="d-flex justify-content-center">--}}
{{--                          <div class=" loader loader-md "></div>--}}
{{--                    </div>--}}


{{--                         `;--}}

{{--            $('#movies-chart-wrapper').empty().append(loader);--}}

{{--            $.ajax({--}}

{{--                url: "{{route('admin.home.movies_chart')}}",--}}


{{--                data: {--}}
{{--                    'year': year,--}}
{{--                },--}}

{{--                cache: false,--}}

{{--                success: function (html) {--}}
{{--                    $('#movies-chart-wrapper').empty().append(html);--}}
{{--                },--}}


{{--            })--}}
{{--        }--}}


{{--    </script>--}}
{{--@endpush--}}
