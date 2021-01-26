@include('layouts.navbar')

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Salon Vasilica</title>

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
            const deleteMsg = confirm("Chiar vrei să ștergi recenzia?");

            if (deleteMsg) {
                $.ajax({
                    url: 'reviews/delete',
                    data: {
                        id: id
                    },
                    type: "POST",
                    success: function (response) {
                        displayMessage("Recenzie ștearsă cu succes!");
                    }
                });

                location.reload();
            }
        }

        function onEditClick(review) {
            const className = '.description-edit-form-' + review.id
            const classNameTextArea = '#description-textarea-' + review.id
            const classNameForm = '#save-form-' + review.id
            const classNameButton = '#edit-button-' + review.id

            $(classNameForm).removeClass('hidden');
            $(classNameButton).addClass('hidden');
            $(className).addClass('hidden');
            $(classNameTextArea).val(review.description);
        }

        function onShowClick(id) {
            $.ajax({
                url: 'reviews/' + id + '/edit',
                data: {
                    id: id,
                    active: true
                },
                type: "POST",
                success: function (response) {
                    displayMessage("Recenzia aceasta a fost adăugată pe pagina de Home!");
                }
            });

            location.reload();
        }

        function onHideClick(id) {
            $.ajax({
                url: 'reviews/' + id + '/edit',
                data: {
                    id: id,
                    active: false
                },
                type: "POST",
                success: function (response) {
                    displayMessage("Recenzia aceasta a fost adăgată pe pagina de Home!");
                }
            });

            location.reload();
        }

        function displayMessage(message) {
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

                        @if($reviews->count())
                            @foreach($reviews as $review)
                                <tr>
                                    <td>
                                        {{ $review->user->name }}
                                    </td>
                                    <td>
                                        <div class="description-edit-form-{{$review->id}} description-edit">
                                            {{ $review->description }}
                                        </div>
                                        <form class="inputs-card hidden" id="save-form-{{$review->id}}" action="/reviews/{{$review->id}}/edit" method="POST">
                                            @csrf
                                            <textarea class="form-control form-control-review" rows="10" name="description" id="description-textarea-{{$review->id}}" aria-label="With textarea"></textarea>

                                            <button class="btn btn-success btn-sm" type="submit">Salvează</button>
                                        </form>
                                    </td>
                                    <td>
                                        <i class="{{ $review->rating == 1 || $review->rating == 2 || $review->rating == 3 || $review->rating == 4 || $review->rating == 5 ? 'fa' : 'far' }} fa-star"></i>
                                        <i class="{{ $review->rating == 2 || $review->rating == 3 || $review->rating == 4 || $review->rating == 5 ? 'fa' : 'far' }} fa-star"></i>
                                        <i class="{{ $review->rating == 3 || $review->rating == 4 || $review->rating == 5 ? 'fa' : 'far' }} fa-star"></i>
                                        <i class="{{ $review->rating == 4 || $review->rating == 5 ? 'fa' : 'far' }} fa-star"></i>
                                        <i class="{{ $review->rating == 5 ? 'fa' : 'far' }} fa-star"></i>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" id="edit-button-{{$review->id}}" type="button" onclick="onEditClick({{$review}})">Editează</button>
                                        <button class="btn btn-danger btn-sm" type="button" onclick="onDeleteClick({{$review->id}})">Șterge</button>
                                        <br />
                                        <button class="btn btn-success btn-sm mt-2 {{ $review->active ? 'hidden' : '' }}" onclick="onShowClick({{$review->id}})" type="button">Arată</button>
                                        <button class="btn btn-secondary btn-sm mt-2 {{ !$review->active ? 'hidden' : '' }}" onclick="onHideClick({{$review->id}})" type="button">Ascunde</button>
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
