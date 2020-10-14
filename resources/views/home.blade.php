@extends('layout.master')
@section('content')
<div class="album py-5 bg-light">
    <div class="container">
        @for ($i = 0; $i < count($event); $i++)
            <h3>{{$event[$i]['user']['first_name'].' '.$event[$i]['user']['last_name']}}</h3>
            <div class="row">
                @foreach ($event[$i]['event'] as $item)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">{{$item['name']}}</text></svg>
                        <div class="card-body">
                            <p class="card-text">Company Name - {{$event[$i]['company']['name']}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary"><a href="/data/update/{{ $item['id'] }}">Edit</a></button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endfor
    </div>
</div>
@endsection