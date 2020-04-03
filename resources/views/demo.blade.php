@extends('layouts.main')

@section('content')

    <div class="album text-muted">

        <div class="container">
            @if (count($images) === 1)
                @foreach($images as $image)
                <div class="col-md-4 card box-shadow">
                    @if ($grayscale)
                    <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text={{ $image->name }}" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="/id/{{ $image->id }}/{{ $image->width }}/{{ $image->height }}?grayscale" data-holder-rendered="true">
                    @else
                    <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text={{ $image->name }}" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="/id/{{ $image->id }}/{{ $image->width }}/{{ $image->height }}" data-holder-rendered="true">
                    @endif
                    <div class="card-body">
                        <p class="card-text">{{ $image->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                @if ($grayscale)
                                <a class="btn btn-sm btn-outline-primary" href="/view/{{ $image->id }}/{{ $image->width }}/{{ $image->height }}" role="button">Color</a>
                                <a class="btn btn-sm btn-outline-primary" href="/id/{{ $image->id }}/{{ $image->width }}/{{ $image->height }}?grayscale" role="button">View raw</a>
                                @else
                                <a class="btn btn-sm btn-secondary" href="/view/{{ $image->id }}/{{ $image->width }}/{{ $image->height }}?grayscale" role="button">Grayscale</a>
                                <a class="btn btn-sm btn-outline-primary" href="/id/{{ $image->id }}/{{ $image->width }}/{{ $image->height }}" role="button">View raw</a>
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
                    <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text={{ $image->name }}" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="/id/{{ $image->id }}/{{ $image->width }}/{{ $image->height }}" data-holder-rendered="true">
                    <div class="card-body">
                        <p class="card-text">{{ $image->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a class="btn btn-sm btn-outline-secondary" href="/view/{{ $image->id }}/{{ $image->width }}/{{ $image->height }}" role="button">View</a>
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
