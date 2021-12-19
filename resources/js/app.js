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
    },

    data() {
        return {
            habits: []
        }
    }
});

app.mount("#app");
