<!DOCTYPE html>
<html>
<head>
    <title>Fullcalender</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"
        integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<style>
    .fc th, .fc td {
        border-color: black;
    }

    .fc-content {
        white-space: normal !important;
        display: flex;
        flex-direction: column;
        word-break: break-word;
    }
</style>
<body>

<div class="container my-5">
    <div class="response"></div>
    <div id='calendar'></div>
</div>
</body>
<script>
    $(document).ready(function () {
        // verific daca userul este admin
        const userIsAdmin = {!! json_encode(auth()->user()->isAdmin()) !!};

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let calendar = $('#calendar').fullCalendar({
            // butoanele care apar deasupra calendarului
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            // ruta unde se fac requesturile
            events: "/fullcalendar",
            // ceva setare de fullcalendar
            displayEventTime: true,
            // editable este o setare a fullcalendarulu care face ca programarile sa le poti edita in fullcalendar
            // si aici am pus variabila de mai sus -> userAdmin care este true daca userul logat e admin
            // sau e false daca nu e admin
            editable: userIsAdmin,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            // cand se face drag and drop pe o programare
            eventDrop: function (event, delta) {
                const start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                const end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

                let data = {
                    title: event.title,
                    start: start,
                    end: end,
                    id: event.id
                };
                // se face un request ajax de update -> ruta in web.php
                $.ajax({
                    url: 'fullcalendar/update',
                    data: data,
                    type: "POST",
                    success: function (response) {
                        displayMessage("Updated Successfully");
                    }
                });
            },
            // cand se face click pe o programare in calendar
            eventClick: function (event) {
                // daca userul nu e admin nu fa nimic
                if (!userIsAdmin) {
                    return
                }
                // afiseaza modalul de chrome care te intreaba si tre sa dai okay
                const deleteMsg = confirm("Do you really want to delete?");
                // data care o trimit la backend intrun format bun
                const objToEmit = {
                    id: event.id
                }
                // daca a dat okay
                if (deleteMsg) {
                    // request care sterge programarea din calendar
                    $.ajax({
                        type: "POST",
                        // request url
                        url: 'fullcalendar/delete',
                        // data trimisa
                        data: objToEmit,
                        // se executa la succes
                        success: function (response) {
                            // verifica daca raspunsul este bun
                            if (parseInt(response) > 0) {
                                // sterge cardul cu acest eveniment din fullcalendar din frontend
                                $('#calendar').fullCalendar('removeEvents', event.id);
                                // afiseaza mesaj
                                displayMessage("Deleted Successfully");
                            }
                        }
                    });
                }
            }
        });
    });
    // afiseaza mesaje pe forntend
    function displayMessage(message) {
        $(".response").html("<div class='success'>" + message + "</div>");
        setInterval(function () {
            $(".success").fadeOut();
        }, 5000);
    }
</script>
</html>
