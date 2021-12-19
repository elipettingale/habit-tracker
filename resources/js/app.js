require('./bootstrap');

import { createApp } from "vue";
import Habit from "./Components/Habit";
import AddHabit from "./Components/AddHabit";
import Day from "./Components/Day";

const app = createApp({
    components: {
        Habit,
        AddHabit,
        Day
    },

    created() {
        this.refreshHabits();

        window.onkeydown = (e) => {
            if (e.key === 'Alt') {
                this.alt = true;
            }
        }

        window.onkeyup = (e) => {
            if (e.key === 'Alt') {
                this.alt = false;
            }
        }
    },

    data() {
        return {
            habits: [],
            alt: false,
        }
    },

    methods: {
        addHabit(habit) {
            this.habits.push(habit);
        },

        refreshHabits() {
            axios.get('api/habits')
                .then(({data}) => {
                    this.habits = data;
                });
        }
    }
});

app.mount("#app");
