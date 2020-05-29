document.addEventListener('DOMContentLoaded', function() {
    var calendar_inicio = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendar_inicio, {
        plugins: ['dayGrid', 'timeGrid', 'list', 'bootstrap'],
        timeZone: 'CET',
        themeSystem: 'bootstrap',
        header: {
            left: 'prev,next ',
            center: 'title',
            right: 'today'
        },
        weekNumbers: false,
        firstDay: 1,
        fixedWeekCount: true,
        eventLimit: true,
        views: {
            dayGridMonth: { // name of view
                titleFormat: { year: 'numeric', month: 'short', },
                eventLimit: 3
                    // other view-specific options here
            }
        },
        eventTimeFormat: { // like '14:30'
            hour: '2-digit',
            minute: '2-digit',
            meridiem: false
        },
        // allow "more" link when too many events
        eventClick: function(info) {
            info.jsEvent.preventDefault();
        },
        locale: 'es',
        height: 'auto',
        eventTextColor: 'white'
    });

    const xhr = new XMLHttpRequest();

    xhr.onload = function() {
        const jsonRespuesta = this.responseText;

        // console.log(jsonRespuesta);
        calendar.addEventSource(JSON.parse(jsonRespuesta));

        calendar.addEvent({
            "title": "Procesión Sto. Cristo de los Milagros",
            "start": "2020-09-14T18:00:00",
            "end": "2020-09-14T21:00:00"
        });
    }

    xhr.open("GET", "eventsPublic.php?event=public");
    xhr.send();


    const xhrp = new XMLHttpRequest();
    xhrp.onload = function() {
        const jsonRespuestaPrivate = this.responseText;

        // console.log(jsonRespuesta);
        calendar.addEventSource(JSON.parse(jsonRespuestaPrivate));


    }

    xhrp.open("GET", "eventsPrivate.php?event=private");
    xhrp.send();


    calendar.updateSize();
    calendar.setOption('height', 600);
    //   calendar.setOption('height', 'auto');
    calendar.render();

});

document.addEventListener('DOMContentLoaded', function() {

    var calendar_events = document.getElementById('calendar-events');

    var full_calendar = new FullCalendar.Calendar(calendar_events, {
        plugins: ['dayGrid', 'timeGrid', 'list', 'bootstrap'],
        timeZone: 'CET',
        themeSystem: 'bootstrap',
        header: {
            left: 'prev,next ',
            center: 'title',
            right: 'today'
        },
        weekNumbers: false,
        firstDay: 1,
        fixedWeekCount: true,
        eventLimit: true,
        views: {
            dayGridMonth: { // name of view
                titleFormat: {
                    year: 'numeric',
                    month: 'short',
                },
                eventLimit: 3
                    // other view-specific options here
            }
        },
        eventTimeFormat: { // like '14:30'
            hour: '2-digit',
            minute: '2-digit',
            meridiem: false
        },
        eventClick: function(info) {
            info.jsEvent.preventDefault();
        },
        locale: 'es',
        height: 'auto',
        eventTextColor: 'white'
    });




    full_calendar.addEvent({
        "title": "XXII Encuentro Regional de Bandas de Música [El Bonillo]",
        "start": "2020-05-12T20:30:00",
        "end": "2020-05-12T23:00:00"
    });






    const xhr = new XMLHttpRequest();

    xhr.onload = function() {
        const jsonRespuesta = this.responseText;

        // console.log(jsonRespuesta);
        full_calendar.addEventSource(JSON.parse(jsonRespuesta));

        full_calendar.addEvent({
            "title": "Procesión Sto. Cristo de los Milagros",
            "start": "2020-09-14T18:00:00",
            "end": "2020-09-14T21:00:00"
        });
    }

    xhr.open("GET", "eventsPublic.php?event=public");
    xhr.send();



    full_calendar.updateSize();
    full_calendar.setOption('height', 600);
    full_calendar.render();
});



/**
 * Spanish translation for bootstrap-datepicker
 * Bruno Bonamin <bruno.bonamin@gmail.com>
 */
;
(function($) {
    $.fn.datepicker.dates['es'] = {
        days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
        daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
        daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
        months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        today: "Hoy",
        monthsTitle: "Meses",
        clear: "Borrar",
        weekStart: 1,
        format: "dd/mm/yyyy"
    };
}(jQuery));