const dateFormat = 'YYYY-MM-DD HH:mm:ss';

function onChangeCategory() {
    var serviceWrapper = document.getElementById("service-wrapper");
    var departmentSelect = document.getElementById('department');

    serviceWrapper.classList.remove('hidden')
    filter(departmentSelect.value)
}

function onChangeService() {
    const pickerDefaultValue = $('#datetimepicker1_input').val();
    var serviceSelect = document.getElementById('service');

    if (checkAvailableDate(moment(pickerDefaultValue).format('YYYY-MM-DD HH:mm:ss'), dbServices[serviceSelect.value - 1].duration)) {
        showError()
    } else {
        hideError()
    }
}

function filter(departmentId) {
    var select = document.getElementById("service");
    var calendar = document.getElementById("calendar-group");
    var error = document.getElementById("date-error__wrapper");

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
    calendar.classList.remove('hidden')
    error.classList.remove('hidden')
    checkFirstServiceValid()
}

$(function () {
    let startEvents = []
    Object.values(dbEvents).forEach(function (key) {
        startEvents.push(key.start)
    })

    $('#datetimepicker1').datetimepicker({
        minDate: new Date(),
        daysOfWeekDisabled: [0, 1],
        enabledHours: [9, 10, 11, 12, 13, 14, 15, 16, 17, 18],
        stepping: 30,
    }).on('dp.change', function (e) {
        const date = moment(e.date._d).format(dateFormat)

        if (checkAvailableDate(date) || startEvents.indexOf(date) !== -1) {
            $('#submitbutton').attr('disabled', 'disabled');
            $('#dateErrorMessage').removeClass('hidden');
        } else {
            hideError()
        }
    });
});

function checkFirstServiceValid() {
    const select = document.getElementById("service");
    const pickerDefaultValue = $('#datetimepicker1_input').val();

    let startEvents = []

    Object.values(dbEvents).forEach(function (key) {
        startEvents.push(key.start)
    })

    if ((startEvents.indexOf(moment(pickerDefaultValue).format('YYYY-MM-DD HH:mm:ss')) !== -1)) {
        showError()
    } else if (checkAvailableDate(pickerDefaultValue, dbServices[select.value - 1].duration)) {
        showError()
    } else {
        hideError()
    }
}

function checkAvailableDate(date, duration = null) {
    const milisecDuration = duration * 60 * 1000
    let occupied = false;

    dbEvents.forEach(function (item) {
        const compareDate = moment(date, dateFormat);
        const startDate = moment(item.start, dateFormat);
        const endDate = moment(item.end, dateFormat);

        if (compareDate.isBetween(startDate, endDate) || endDate - startDate < milisecDuration) {
            occupied = true
        }
    })

    return occupied
}

function showError() {
    $('#submitbutton').attr('disabled', 'disabled');
    $('#dateErrorMessage').removeClass('hidden');
}

function hideError() {
    $('#submitbutton').removeAttr('disabled');
    $('#dateErrorMessage').addClass('hidden');
}
