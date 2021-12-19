require('./bootstrap');

import { createApp } from "vue";
import Habit from "./Components/Habit";

const app = createApp({
    components: {
        Habit
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
    }
});

app.mount("#app");
