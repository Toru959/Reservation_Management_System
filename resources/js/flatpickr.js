import flatpickr from "flatpickr"

flatpickr("#event_date", {
    minDate: "today",
    maxDate: new Date().fp_incr(30)
});

const setting = {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true,
    minTime: "10:00",
    maxTime: "20:00",
}

flatpickr("#start_time", setting);
flatpickr("#end_time", setting);