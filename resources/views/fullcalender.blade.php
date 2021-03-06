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
        const userIsAdmin = {!! json_encode(auth()->user()->isAdmin()) !!};

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            events: "/fullcalendar",
            displayEventTime: true,
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

            eventDrop: function (event, delta, revertFunc) {
                const start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                const end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

                let data = {
                    title: event.title,
                    start: start,
                    end: end,
                    id: event.id
                };

                $.ajax({
                    url: 'fullcalendar/update',
                    data: data,
                    type: "POST",
                    success: function (response) {
                        displayMessage("Programare modificată cu succes!");
                    },
                    error: function (err) {
                        revertFunc()
                        displayMessage("Programarea se suprapune cu alta!");
                    },
                });
            },

            eventClick: function (event) {
                if (!userIsAdmin) {
                    return
                }

                const deleteMsg = confirm("Chiar îți dorești să ștergi programarea?");

                const objToEmit = {
                    id: event.id
                }

                if (deleteMsg) {
                    $.ajax({
                        type: "POST",
                        url: 'fullcalendar/delete',
                        data: objToEmit,
                        success: function (response) {
                            if (parseInt(response) > 0) {
                                $('#calendar').fullCalendar('removeEvents', event.id);
                                displayMessage("Programare ștearsă cu succes!");
                            }
                        }
                    });
                }
            }
        });
    });

    function displayMessage(message) {
        $(".response").html("<div class='success'>" + message + "</div>");
        setInterval(function () {
            $(".success").fadeOut();
        }, 5000);
    }
</script>
</html>
