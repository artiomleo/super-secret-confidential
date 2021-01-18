@include('layouts.navbar')

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tangerine:bold,bolditalic|Inconsolata:italic|Droid+Sans"
          rel="stylesheet">
    <script
        src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"
        data-auto-a11y="true"
    ></script>

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>
<body class="antialiased">
@if(request()->query('event') === 'success')
    <div class="event-notification">
        Te-ai programat cu succes!
    </div>
@endif

@if(request()->query('event') === 'successReview')
    <div class="event-notification">
        Review-ul tau a fost inregistrat!
    </div>
@endif

@if(Illuminate\Support\Facades\Auth::check())
    <div class="d-flex flex-row justify-content-center">
        <div class="review-form">
            <form action="/review-create-submit" method="POST">
                @csrf
                <p class="text-center font-weight-bolder review-form-header">Scrie-ne o recenzie</p>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ce rating ne-ai acorda ?</label>
                    <div class="rating">
                        <input type="radio" name="rating" value="5" id="rating-5">
                        <label for="rating-5"></label>
                        <input type="radio" name="rating" value="4" id="rating-4">
                        <label for="rating-4"></label>
                        <input type="radio" name="rating" value="3" id="rating-3">
                        <label for="rating-3"></label>
                        <input type="radio" name="rating" value="2" id="rating-2">
                        <label for="rating-2"></label>
                        <input type="radio" name="rating" value="1" id="rating-1">
                        <label for="rating-1"></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Descriere</label>
                    <textarea class="form-control" name="description" id="description1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endif

<div class="slider">
    <input type="radio" name="slider" title="slide1" checked="checked" class="slider__nav"/>
    <input type="radio" name="slider" title="slide2" class="slider__nav"/>
    <input type="radio" name="slider" title="slide3" class="slider__nav"/>
    <input type="radio" name="slider" title="slide4" class="slider__nav"/>
    <div class="slider__inner">
        @foreach(App\Models\Review::query()->where('active', true)->get() as $review)
            <div class="slider__contents">
                <h2 class="slider__caption">
                    {{$review->user->name}}
                    <p style="margin-bottom: 0px; margin-top: 10px;">
                        <i class="{{ $review->rating == 1 || $review->rating == 2 || $review->rating == 3 || $review->rating == 4 || $review->rating == 5 ? 'fa' : 'far' }} fa-star"></i>
                        <i class="{{ $review->rating == 2 || $review->rating == 3 || $review->rating == 4 || $review->rating == 5 ? 'fa' : 'far' }} fa-star"></i>
                        <i class="{{ $review->rating == 3 || $review->rating == 4 || $review->rating == 5 ? 'fa' : 'far' }} fa-star"></i>
                        <i class="{{ $review->rating == 4 || $review->rating == 5 ? 'fa' : 'far' }} fa-star"></i>
                        <i class="{{ $review->rating == 5 ? 'fa' : 'far' }} fa-star"></i>
                    </p>
                </h2>
                <p class="slider__txt">
                    {{ strlen($review->description) > 200 ? strip_tags(substr($review->description, 0, 200)) . " ..." : strip_tags(substr($review->description, 0, 200)) }}
                </p>
            </div>
        @endforeach
    </div>
</div>

<?php echo View::make('layouts.footer') ?>
</body>
</html>
