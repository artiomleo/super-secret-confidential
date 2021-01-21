@include('layouts.navbar')

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script
        src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"
        data-auto-a11y="true"
    ></script>

    <style>
        .table-bordered {
            border: 1px solid black !important;
            margin: 30px 0;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid black !important;
        }
    </style>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function onDeleteClick(id) {
            const deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                // request ajax care sterge un review -> il gasesti in web.php linia: 56
                $.ajax({
                    url: 'reviews/delete',
                    data: {
                        id: id
                    },
                    type: "POST",
                    // functia asta se executa cand request-ul e cu succes
                    success: function (response) {
                        displayMessage("Deleted Successfully");
                    }
                });
                // reincarc pagina de frontend
                location.reload();
            }
        }
        // cand apas pe edit
        function onEditClick(review) {
            // caut elementele prin DOM
            const className = '.description-edit-form-' + review.id
            // concatenez id la elementul care il caut pentru ca is mai multe elemente -> sunt atatea cate review-uri sunt
            // si atunci eu am mai multe elemente de textarea care le pot afisa sau ascunde mai jos o sa explic cum le creez
            const classNameTextArea = '#description-textarea-' + review.id
            const classNameForm = '#save-form-' + review.id
            const classNameButton = '#edit-button-' + review.id
            // afisez form-ul de edit
            $(classNameForm).removeClass('hidden');
            // ascund butonul de edit
            $(classNameButton).addClass('hidden');
            // ascund textul din tabel ca sa afisez inputul
            $(className).addClass('hidden');
            // iau valoarea textului care vreau sa il modific si o pun in inputul de edit
            $(classNameTextArea).val(review.description);
        }

        function onShowClick(id) {
            // request care afiseaza review pe homepage
            $.ajax({
                url: 'reviews/' + id + '/edit',
                data: {
                    id: id,
                    active: true
                },
                type: "POST",
                success: function (response) {
                    displayMessage("This review was added to homepage");
                }
            });

            location.reload();
        }

        function onHideClick(id) {
            // request care ascunde review pe homepage
            $.ajax({
                url: 'reviews/' + id + '/edit',
                data: {
                    id: id,
                    active: false
                },
                type: "POST",
                success: function (response) {
                    displayMessage("This review was added to homepage");
                }
            });

            location.reload();
        }

        function displayMessage(message) {
            // mesaj de info pe frontend
            $(".response").html("<div class='success'>" + message + "</div>");
            setInterval(function () {
                $(".success").fadeOut();
            }, 5000);
        }
    </script>
</head>
<body class="antialiased">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nume</th>
                            <th>Descriere</th>
                            <th width="200px">Punctaj</th>
                            <th width="200px">Actiuni</th>
                        </tr>
{{--                        // verific daca este vreun review in database--}}
                        @if($reviews->count())
{{--                        // iterez prin reviewurile din database care le-am injectat aici in web.php cu ->with()--}}
{{--                        // o sa imi creeze atarea row-uri in tabel cate review-uri am in database pentru ca face iteratii si la
fiecare iteratie creeaza cate un bloc de cod care se afla intre @foreach si  @endforeach--}}
                            @foreach($reviews as $review)
                                <tr>
                                    <td>
                                        {{ $review->user->name }}
                                    </td>
                                    <td>
{{--                        // ceea ce am zis ca o sa explic mai jos aici creez clase cu nume variabile ca sa le pot cauta mai apoi in js--}}
                                        <div class="description-edit-form-{{$review->id}} description-edit">
                                            {{ $review->description }}
                                        </div>
{{--                        // acest form face request direct de aici cumva automat si atunci eu schimb doar id-ul pe requestul de edit
action inseamna unde se face requestul in action schimb id-ul action="/reviews/{{$review->id}}/edit"
--}}
                                        <form class="inputs-card hidden" id="save-form-{{$review->id}}" action="/reviews/{{$review->id}}/edit" method="POST">
                                            @csrf
                                            <textarea class="form-control form-control-review" rows="10" name="description" id="description-textarea-{{$review->id}}" aria-label="With textarea"></textarea>

                                            <button class="btn btn-success btn-sm" type="submit">Save</button>
                                        </form>
                                    </td>
                                    <td>
{{--                        // afisez stelute in dependinta de rating-ul reviewului din iteratia curenta, schimb css-ul in dependinta de rating de aia am
atata logica cu || -> 'sau'
--}}
                                        <i class="{{ $review->rating == 1 || $review->rating == 2 || $review->rating == 3 || $review->rating == 4 || $review->rating == 5 ? 'fa' : 'far' }} fa-star"></i>
                                        <i class="{{ $review->rating == 2 || $review->rating == 3 || $review->rating == 4 || $review->rating == 5 ? 'fa' : 'far' }} fa-star"></i>
                                        <i class="{{ $review->rating == 3 || $review->rating == 4 || $review->rating == 5 ? 'fa' : 'far' }} fa-star"></i>
                                        <i class="{{ $review->rating == 4 || $review->rating == 5 ? 'fa' : 'far' }} fa-star"></i>
                                        <i class="{{ $review->rating == 5 ? 'fa' : 'far' }} fa-star"></i>
                                    </td>
                                    <td>
{{--                        // onClick este un eveniment care se emite de puton si la on click eu apelez functia onEditClick in care pun reviewul din iteratia curenta ca sa fac operatii
cu el in js
--}}
                                        <button class="btn btn-primary btn-sm" id="edit-button-{{$review->id}}" type="button" onclick="onEditClick({{$review}})">Edit</button>
{{--                        // apelez onDeleteClick care e mai sus in <script>    --}}

                                        <button class="btn btn-danger btn-sm" type="button" onclick="onDeleteClick({{$review->id}})">Delete</button>
                                        <br />
                                        <button class="btn btn-success btn-sm mt-2 {{ $review->active ? 'hidden' : '' }}" onclick="onShowClick({{$review->id}})" type="button">Show</button>
                                        <button class="btn btn-secondary btn-sm mt-2 {{ !$review->active ? 'hidden' : '' }}" onclick="onHideClick({{$review->id}})" type="button">Hide</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
</body>
</html>
