<template>
    <div
        class="habit"
        :class="{'is-completed': modelValue.is_completed}"
        :style="`--color: ${modelValue.color}`"
        @click="complete"
    >
        <i v-if="!$root.alt" :class="modelValue.icon" />
        <span v-if="$root.alt" v-text="modelValue.streak"></span>
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
