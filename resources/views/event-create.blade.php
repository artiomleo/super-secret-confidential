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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script>
        function showcategory() {
            var departmentSelect = document.getElementById('department');
            filter(departmentSelect.value)
        }

        function filter(departmentId) {
            var select = document.getElementById("service");
            var form = document.getElementById("formgroup");
            let selected = false;
            for (var i = 0; i < select.length; i++) {
                var txt = select.options[i].attributes.key.value;
                if (!txt.match(departmentId)) {
                    $(select.options[i]).attr('disabled', 'disabled').hide();
                } else {
                    if (!selected) {
                        $('#service').val(select.options[i].attributes.value.value);
                        selected = true;
                    }
                    $(select.options[i]).removeAttr('disabled').show();
                }
            }
            form.classList.remove('hidden')
        }
    </script>

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>

<body class="antialiased">
<div class="d-flex justify-content-center my-5 form-wrapper">
    <div class="inputs-wrapper w-75 d-flex justify-content-center">
        <form class="py-5 my-5 w-50 inputs-card" action="/event-create-submit" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nume</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Nume" name="name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email" name="email" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Numar de telefon</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="phone_number" placeholder="Numar de telefon" required>
            </div>

            <div class="form-group">
                <label for="Title">Departament:</label>
                <select class="custom-select custom-select-sm"
                        id="department"
                        style="height: 38px; font-size: 0.9rem; padding: 0.375rem 0.75rem;"
                        onchange="return showcategory();"
                        required>
                    <option disabled selected value> -- selectați o opțiune -- </option>
                @foreach(App\Models\Department::query()->get() as $department)
                        <option  value='{{ $department->id }}'>{{ $department->name }}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group hidden" id="formgroup">
                <label for="Title">Serviciu:</label>
                <select class="custom-select custom-select-sm"
                        style="height: 38px; font-size: 0.9rem; padding: 0.375rem 0.75rem;"
                        id="service"
                        name="service_id"
                        required>
                    @foreach(App\Models\Service::query()->get() as $service)
                        <option value='{{ $service->id }}' key='{{ $service->department_id }}'>{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <strong> Data și ora : </strong>
                <input class="date form-control" type="datetime-local" id="starttime" name="start_time" required>
            </div>
            <button type="submit" class="btn btn-primary" id="submitbutton" onclick="document.getElementById('submitbutton').disabled = true;">
                Submit
            </button>
        </form>
    </div>
</div>
<?php echo View::make('layouts.footer') ?>
</body>
</html>
