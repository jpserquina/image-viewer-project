@extends('layouts.main')

@section('content')

    <div class="album text-muted">

        <div class="container">
            @if (count($images) === 1)
                @foreach($images as $image)
                <div class="col-md-4 card box-shadow">
                    <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text={{ $image->name }}" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{ $image->thumbnail_url }}" data-holder-rendered="true">
                    <div class="card-body">
                        <p class="card-text">{{ $image->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                @if ($grayscale)
                                <a class="btn btn-sm btn-outline-primary" href="/{{ $image->id }}" role="button">Disable grayscale</a>
                                @else
                                <a class="btn btn-sm btn-secondary" href="/{{ $image->id }}?grayscale" role="button">Enable grayscale</a>
                                @endif
                            </div>
                            <small class="text-muted">{{ $image->width }}px x {{ $image->height }}px<br/>uploaded {{ \Carbon\Carbon::createFromTimeStamp(strtotime($image->created_at))->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <div class="infinite-scroll">

            @foreach($images->chunk(3) as $image_row)
                <div class="row form-group card-columns custom-columns">
            @foreach($image_row as $image)
                <div class="col-md-4">
                <div class="card box-shadow" style="min-width: 350px !important; max-width: 350px !important;">
                    <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text={{ $image->name }}" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{ $image->thumbnail_url }}" data-holder-rendered="true">
                    <div class="card-body">
                        <p class="card-text">{{ $image->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a class="btn btn-sm btn-outline-secondary" href="/{{ $image->id }}" role="button">View</a>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <small class="text-muted">{{ $image->width }}px x {{ $image->height }}px<br/>uploaded {{ \Carbon\Carbon::createFromTimeStamp(strtotime($image->created_at))->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
                </div>
            @endforeach
                </div>
            @endforeach

            {{ $images->links() }}
            </div>
            @endif
        </div>
    </div>

@endsection
