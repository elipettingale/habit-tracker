<template>
    <div
        class="habit"
        :class="{'is-completed': modelValue.is_completed}"
        :style="`--color: ${modelValue.color}`"
        @click="complete"
    >
        <i :class="modelValue.icon" />
    </div>
</template>

<script>
export default {
    name: "Habit",
    props: ['modelValue'],

    methods: {
        complete() {
            if (this.modelValue.is_completed) {
                return;
            }

            axios.post(`api/habits/${this.modelValue.id}/complete`)
                .then(({data}) => {
                    this.$emit('update:modelValue', data);
                });
        }
    }
}
</script>
