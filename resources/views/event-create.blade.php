@include('layouts.navbar')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
{{--    css calendar--}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet">

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    {{--import scriptul--}}
    <script src="/js/scripts/eventCreate.js"></script>

    <script>
        {{--injectez evenimentele de start si end in js, in web.php fac asta cu with()--}}
        {{--acestea is folosite in eventCreate.js si scriptul e importat in blade mai sus--}}
        const dbEvents = {!! $events !!};
        const dbServices = {!! $services !!};
    </script>
</head>

<body class="antialiased">
<div class="d-flex justify-content-center my-5 form-wrapper">
    <div class="inputs-wrapper w-75 d-flex justify-content-center">
        <form class="py-5 my-5 w-50 inputs-card" action="/event-create-submit" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nume:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Nume" name="name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email:</label>
                <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email" name="email"
                       required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Număr de telefon:</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="phone_number"
                       placeholder="Numar de telefon" required>
            </div>

            <div class="form-group">
                <label for="Title">Departament:</label>
                <select class="custom-select custom-select-sm"
                        id="department"
                        style="height: 38px; font-size: 1.3rem; padding: 0.375rem 0.9rem;"
                        onchange="return onChangeCategory();"
                        required>
                    <option disabled selected value> -- selectați un departament --</option>
                    {{--fac un forEach pe departamentele din database si creez valori de select in select input--}}
                    @foreach(App\Models\Department::query()->get() as $department)
                        {{--dau valoarea la select id ca sa o folosesc apoi in js pentru a verifica chestii--}}
                        {{--si ca continut pun numele departamentului--}}
                        <option value='{{ $department->id }}'>{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group hidden" id="service-wrapper">
                <label for="Title">Serviciu:</label>
                <select class="custom-select custom-select-sm"
                        style="height: 38px; font-size: 1.3rem; padding: 0.375rem 0.9rem;"
                        id="service"
                        onchange="return onChangeService();"
                        name="service_id"
                        required>
                    {{--fac aceeasi chestie ca mai sus doar ca pentru selectul de servicii--}}
                    @foreach(App\Models\Service::query()->get() as $service)
                        <option value='{{ $service->id }}'
                                key='{{ $service->department_id }}'>{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group hidden" id="calendar-group">
                <strong> Data: </strong>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" id="datetimepicker1_input" name="start" required/>
                    <span class="input-group-addon">
                   <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="date-error__wrapper hidden" id="date-error__wrapper">
                <p id="dateErrorMessage" class="hidden">Această dată este ocupată</p>
            </div>
            <button type="submit" class="btn btn-primary" id="submitbutton">
                Trimite programarea!
            </button>
        </form>
    </div>
</div>
@include('layouts.footer')
</body>
</html>
