<template>
    <div class="habit" :style="`--color: ${habit.color}`">
        <i :class="habit.icon" />
    </div>
</template>

<script>
export default {
    name: "Habit",
    props: ['habit']
}
</script>
