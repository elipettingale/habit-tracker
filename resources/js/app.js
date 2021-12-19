require('./bootstrap');

import { createApp } from "vue";
import Habit from "./Components/Habit";
import AddHabit from "./Components/AddHabit";

const app = createApp({
    components: {
        Habit,
        AddHabit
    },

    created() {
        axios.get('api/habits')
            .then(({data}) => {
                this.habits = data;
            });

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

        nextDay() {

        }
    }
});

app.mount("#app");
