// salvez formatul de data intr-o variabila pentru ca il folosesc de mai multe ori
const dateFormat = 'YYYY-MM-DD HH:mm:ss';

function onChangeCategory() {
    // caut elementul din DOM cu getElementById ca sa il pot afisa ascunde apoi -> review.blade linia 67
    var serviceWrapper = document.getElementById("service-wrapper");
    // selectul de departament
    var departmentSelect = document.getElementById('department');
    // scot clasa hidden de pe elementul serviceWrapper ca sa il afises fac asta cand userul alege un departament si apare al doilea select de serviciu
    serviceWrapper.classList.remove('hidden')
    filter(departmentSelect.value)
}

function onChangeService() {
    // valoarea datetimepicker
    const pickerDefaultValue = $('#datetimepicker1_input').val();
    var serviceSelect = document.getElementById('service');
    // verific daca data si ora aleasa de user in datetimepicker e valida, adica daca nu e ocupata de altcineva
    if (checkAvailableDate(moment(pickerDefaultValue).format('YYYY-MM-DD HH:mm:ss'), dbServices[serviceSelect.value - 1].duration)) {
        // daca nu e valida afisez eroarea si deactivez butonul trimite programarea
        showError()
    } else {
        // daca e valida ascund eroarea
        hideError()
    }
}
// filtrez serviciile din select
function filter(departmentId) {
    var select = document.getElementById("service"); // elementele astea poti sa le cauti in blade dupa id -> are nume sugestive -> asta e selectul de serviciu
    var calendar = document.getElementById("calendar-group"); // asta e calendarul
    var error = document.getElementById("date-error__wrapper"); // asta e mesajul de eroare

    let selected = false;
    // iterez prin valorile elementului select de servicii
    for (var i = 0; i < select.length; i++) {
        // aici am valoarea fiecarui serviciu din selectul de servicii -> initial sunt toate si eu le filtrez
        var txt = select.options[i].attributes.key.value;
        // aici verific daca departamentul ales are serviciul din iteratia curenta
        if (!txt.match(departmentId)) {
            // daca nu coincide ascund valoarea din iteratia curenta
            $(select.options[i]).attr('disabled', 'disabled').hide();
        } else {
            // daca coincide afisez inapoi. prima data verific daca valoarea din iteratia curenta nu e deja afisata
            if (!selected) {
                // daca nu e afisata o afisez cu jquery si ii dau valoare
                $('#service').val(select.options[i].attributes.value.value);
                // ii dau valoarea true
                selected = true;
            }
            // iarasi afisez din jquery
            $(select.options[i]).removeAttr('disabled').show();
        }
    }
    // afisez  calendarul si eroarea
    calendar.classList.remove('hidden')
    error.classList.remove('hidden')
    // verific intr-o logica aparte daca primul serviciu care vine deja selectat e valid sau nu
    checkFirstServiceValid()
}

$(function () {
    // aici am evenimentele de start din database
    let startEvents = []
    Object.values(dbEvents).forEach(function (key) {
        // aici le pun intr-o forma comoda pentru frontend
        startEvents.push(key.start)
    })
    // initializez datetimepicker
    $('#datetimepicker1').datetimepicker({
        // ca sa nu poata alege data din trecut
        minDate: 'now',
        // duminica si luni nu lucreaza
        daysOfWeekDisabled: [0, 1],
        // orele disponibile
        enabledHours: [9, 10, 11, 12, 13, 14, 15, 16, 17, 18],
        // ora merge din 30 in 30 min
        stepping: 30,
        // cand schimb ora
    }).on('dp.change', function (e) {
        // format de data comod
        const date = moment(e.date._d).format(dateFormat)

// verifica disbonibilitatea datii si daca nu exista o alta programare care coincide cu aceasta data si verifica daca data din calendar nu este mai mica decat azi
        if (checkAvailableDate(date) || startEvents.indexOf(date) !== -1  || date < moment().format(dateFormat)) {
            // afisez eroarea si deactivez butonul
            $('#submitbutton').attr('disabled', 'disabled');
            $('#dateErrorMessage').removeClass('hidden');
        } else {
            // ascund eroarea
            hideError()
        }
    });
});

function checkFirstServiceValid() {
    // elementul de select
    const select = document.getElementById("service");
    // data default din datetimepicker
    const pickerDefaultValue = $('#datetimepicker1_input').val();

    let startEvents = []

    Object.values(dbEvents).forEach(function (key) {
        // evenimente de start din database in forma comoda
        startEvents.push(key.start)
    })
    // daca data din picker exista in variabila de evenimente din database atunci true
    if ((startEvents.indexOf(moment(pickerDefaultValue).format('YYYY-MM-DD HH:mm:ss')) !== -1)) {
        // arata eroarea
        showError()
    // daca programarea asta care vreai sa o faci e mai lunga decat timpul ramas pana la urmatoarea programare
    } else if (checkAvailableDate(pickerDefaultValue, dbServices[select.value - 1].duration)) {
        // arata eroarea
        showError()
    } else {
        // ascunde eroarea
        hideError()
    }
}
// functia care verifica daca data alease e disponibila
function checkAvailableDate(date, duration = null) {
    // durata serviciului in milisec
    const milisecDuration = duration * 60 * 1000
    let occupied = false;
    // iterez prin array-ul de evenimente din database
    dbEvents.forEach(function (item) {
        // data din iteratia curenta care tre sa o compar
        const compareDate = moment(date, dateFormat);
        // data de start
        const startDate = moment(item.start, dateFormat);
        // data de end
        const endDate = moment(item.end, dateFormat);
        // compareDate o functie din moment.js care verifica daca o data se afla intre alte doua dati care i le dai
        // + mai verific -> endDate - startDate < milisecDuration -> daca durata nu e mai mare decat timp disponibil
        if (compareDate.isBetween(startDate, endDate) || endDate - startDate < milisecDuration) {
            // daca da atunci setez variabila care o returnez la true
            occupied = true
        }
    })
    // variabila care o returnez
    return occupied
}
// afiseaza eroare pe frontent
function showError() {
    $('#submitbutton').attr('disabled', 'disabled');
    $('#dateErrorMessage').removeClass('hidden');
}
// ascunde eroare pe frontent
function hideError() {
    $('#submitbutton').removeAttr('disabled');
    $('#dateErrorMessage').addClass('hidden');
}
