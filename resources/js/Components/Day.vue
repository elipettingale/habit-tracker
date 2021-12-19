<template>
    <div v-if="day">
        <p class="text-2xl" v-text="day"></p>
        <button class="text-xl" @click="next">Next</button>
    </div>
</template>

<script>
export default {
    name: "Day",

    created() {
        axios.get('api/day')
            .then(({data}) => {
                this.day = data;
            });
    },

    data() {
        return {
            day: null
        }
    },

    methods: {
        next() {
            axios.post('api/day')
                .then(({data}) => {
                    this.day = data;
                    this.$emit('next');
                });
        }
    }
}
</script>
