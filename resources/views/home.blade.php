@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('TOP 100 Movies') }}</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Release Year</th>
                                <th>Avg Rating</th>
                                <th>Votes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movies as $movie)
                                <tr>
                                    <td>{{ $loop->iteration }}. {{ $movie->title }}</td>
                                    <td>{{ $movie->category_name }}</td>
                                    <td>{{ $movie->release_year }}</td>
                                    <td>
                                        @if(isset($movie->ratings_avg_rating))
                                            {{ number_format($movie->ratings_avg_rating, 2) }}
                                        @else
                                            {{ number_format($movie->ratings_avg, 2) }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($movie->ratings_count))
                                            {{$movie->ratings_count}}
                                        @else
                                            {{ $movie->ratings_cnt }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
