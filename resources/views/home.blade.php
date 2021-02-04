@include('layouts.navbar')

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Acasă</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tangerine:bold,bolditalic|Inconsolata:italic|Droid+Sans"
          rel="stylesheet">
    <script
        src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"
        data-auto-a11y="true"
    ></script>

    <script src="/js/scripts/slideshow.js"></script>

    <script>
        function onSubmitReviewClick() {
            const descriptionError = document.getElementById("descriptionErrorMessage");
            const ratingError = document.getElementById("ratingErrorMessage");
            let descriptionValue = false
            let ratingValue = false
            const formData = new FormData(document.querySelector('#submit-form'))

            for (var pair of formData.entries()) {
                if (pair[0] === 'rating') {
                    ratingValue = true
                }

                if (pair[0] === 'description' && pair[1]) {
                    descriptionValue = true
                }
            }

            if (ratingValue === true && descriptionValue === true) {
                document.getElementById("review-form").submit();
            } else {
                if (!descriptionValue) {
                    descriptionError.classList.remove('hidden');
                } else {
                    descriptionError.classList.add('hidden');
                }
                if (!ratingValue) {
                    ratingError.classList.remove('hidden');
                } else {
                    ratingError.classList.add('hidden');
                }
            }
        }
    </script>

    <style>
        #slideshow, #slides img {
            max-width: 100%;
        }

        #slide-caption {
            display: none;
        }

        #date-error__wrapper {
            margin-top: 15px;
        }

        #descriptionErrorMessage {
            font-size: 18px;
            color: #f73131;
        }
        #ratingErrorMessage {
            font-size: 18px;
            color: #f73131;
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


<div class="container-services">
    <div class="container my-5">
        <div class="row">
            <div class="col-sm d-flex flex-column align-items-center justify-content-center">
                <a href="coafor">
                    <img width="60px" src="/img/iconfoarfeca.png"/>
                </a>
                <p class="icon-text">Coafor</p>
            </div>
            <div class="col-sm d-flex flex-column align-items-center justify-content-center">
                <a href="cosmetica">
                    <img width="60px" src="/img/cosmeticaicon.png"/>
                </a>
                <p class="icon-text">Cosmetica</p>
            </div>
            <div class="col-sm d-flex flex-column align-items-center justify-content-center">
                <a href="manichiura">
                    <img width="60px" src="/img/manipediicon.png"/>
                </a>
                <p class="icon-text">Manichiura-Pedichiura</p>
            </div>
        </div>
    </div>

    <div class="flex-container">
        <div class="flex-item">
            <a href="coafor"><img src="/img/Coafor2.jpg" alt="Coafor" style="width:100%"></a>
        </div>
        <div class="flex-item">
            <a href="cosmetica"><img src="/img/facial_treatment.jpg" alt="Cosmetica" style="width:100%"></a>
        </div>
        <div class="flex-item">
            <a href="manichiura"><img src="/img/manipediii.jpg" alt="Manichiura" style="width:100%"></a>
        </div>
    </div>
</div>

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


@if(Illuminate\Support\Facades\Auth::check())
    <div class="d-flex flex-row justify-content-center">
        <div class="review-form">
            <form action="/review-create-submit" method="POST" id="submit-form">
                @csrf
                <p class="text-center font-weight-bolder review-form-header">Acordă-ne o recenzie</p>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ce notă ne-ai acorda ?</label>
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
                    <div class="date-error__wrapper" id="date-error__wrapper">
                        <p id="ratingErrorMessage" class="hidden">Adauga te rog o un rating</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Descriere</label>
                    <textarea class="form-control" name="description" id="description1" rows="3"></textarea>
                    <div class="date-error__wrapper" id="date-error__wrapper">
                        <p id="descriptionErrorMessage" class="hidden">Adauga te rog o descriere</p>
                    </div>
                </div>
                <button type="submit" id="review-form" class="btn btn-primary" onclick="onSubmitReviewClick(); return false;">Trimite recenzia</button>
            </form>
        </div>
    </div>
@endif

<div id="slideshow">
    <div id="slides">
        <img src="/img/Manichiurafrench.jpg" data-caption="Cele mai bune cosmetice"/>
        <img src="/img/home.jpg" data-caption="Produse profesionale de stilizare"/>
        <img src="/img/slide3.jpg" data-caption="Produse pentru toate tipurile de păr"/>
        <img src="/img/1salon.jpg" data-caption="Cele mai bune ustensile"/>
    </div>

    <div id="slide-left">&lt;</div>
    <div id="slide-right">&gt;</div>
    <div id="slide-caption"></div>
</div>

@include('layouts.footer')
</body>
</html>
