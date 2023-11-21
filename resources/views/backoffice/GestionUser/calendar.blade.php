
<div class="cardBox1 flex-fill">
    <div class="card-header">
        <div class="card-actions float-end">
            <div class="dropdown position-relative">
                <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                </a>
            </div>
        </div>
        <h5 class="card-title mb-0" id="calendarTitle">Calendier</h5>
    </div>
    <div class="card-body d-flex">
        <div class="align-self-center w-100">
            <div class="chart">
                <div id="fullcalendar"></div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var calendarEl = document.getElementById("fullcalendar");
        var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: "bootstrap",
            initialView: "dayGridMonth",
            initialDate: "2021-07-07",
            headerToolbar: {
                left: "prev,next today",
                center: "title",
                right: "dayGridMonth,timeGridWeek,timeGridDay"
            },
            events: [
                // ... (votre liste d'événements)
            ]
        });
        setTimeout(function() {
            calendar.render();
            updateCalendarTitle();
        }, 250);
    });

    function updateCalendarTitle() {
        var today = new Date();
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', timeZoneName: 'short' };
        var formattedDate = today.toLocaleDateString('fr-FR', options);
        document.getElementById('calendarTitle').textContent = "" + formattedDate;
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr("#datetimepicker-dashboard", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    });
</script>
