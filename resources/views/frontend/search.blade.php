@extends('frontend.layout.master')
@section('title', '')
@section('content')

    <section class="space-ptb course-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        @forelse ($datum as $data)
                            <tr>
                                <td><a href="{{ route('courseDetails', $data->id) }}">{{ $data->name }}</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td>No Data Found</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </section>
    @push('custom_scripts')
    @endpush
@endsection
