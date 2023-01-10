import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

const MONTH_NAMES = [
    "Januar",
    "Februar",
    "Marec",
    "April",
    "Maj",
    "Junij",
    "Julij",
    "Avgust",
    "September",
    "Oktober",
    "November",
    "December",
];
const DAYS = ["PO", "TO", "SR", "ČE", "PE", "SO", "NE"];

function app() {
    return {
        month: "",
        year: "",
        no_of_days: [],
        blankdays: [],
        days: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],

        events: [
            {
                event_date: new Date(2020, 12, 1),
                event_title: "April Fool's Day",
                event_theme: "blue",
            },

            {
                event_date: new Date(2020, 12, 10),
                event_title: "Birthday",
                event_theme: "red",
            },

            {
                event_date: new Date(2020, 12, 16),
                event_title: "Upcoming Event",
                event_theme: "green",
            },
        ],
        event_start: "07:00",
        event_end: "15:00",
        event_date: "",
        event_theme: "work",
        event_desc: "",

        themes: [
            {
                value: "work",
                label: "Enigma",
            },
            {
                value: "vacation",
                label: "Dopust",
            },
            {
                value: "sickday",
                label: "Bolniška",
            },
            {
                value: "montage",
                label: "Montaža",
            },
            {
                value: "demontage",
                label: "Demontaža",
            },
        ],

        openEventModal: false,

        initDate() {
            let today = new Date();
            this.month = today.getMonth();
            this.year = today.getFullYear();
            this.datepickerValue = new Date(
                this.year,
                this.month,
                today.getDate()
            ).toDateString();
        },

        isToday(date) {
            const today = new Date();
            const d = new Date(this.year, this.month, date);

            return today.toDateString() === d.toDateString() ? true : false;
        },

        showEventModal(date) {
            // open the modal
            this.openEventModal = true;
            this.event_date = new Date(
                this.year,
                this.month,
                date
            ).toDateString();
        },

        addEvent() {
            if (this.event_date == "") {
                return;
            }

            this.events.push({
                event_start: this.event_start,
                event_end: this.event_end,
                event_date: this.event_date,
                event_theme: this.event_theme,
                event_desc: this.event_desc,
            });

            console.log(this.events);

            // clear the form data
            this.event_start = "07:00";
            this.event_end = "15:00";
            this.event_date = "";
            this.event_theme = "work";
            this.event_desc = "";

            //close the modal
            this.openEventModal = false;
        },

        getNoOfDays() {
            let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

            // find where to start calendar day of week
            let dayOfWeek = new Date(this.year, this.month).getDay();
            let blankdaysArray = [];
            for (var i = 2; i <= dayOfWeek; i++) {
                blankdaysArray.push(i);
            }

            let daysArray = [];
            for (var i = 1; i <= daysInMonth; i++) {
                daysArray.push(i);
            }

            this.blankdays = blankdaysArray;
            this.no_of_days = daysArray;
        },
    };
}
