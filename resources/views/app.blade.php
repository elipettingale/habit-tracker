<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/fb0de28221.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body id="app" class="antialiased">
        <div class="h-screen flex flex-col justify-center items-center bg-gray-50">
            <div class="absolute top-0 left-0 m-8">
                <day v-on:next="refreshHabits" />
            </div>
            <div class="absolute top-0 right-0 m-8">
                <add-habit v-on:saved="addHabit" />
            </div>
            <div class="absolute bottom-0 left-0 m-8">
                <div v-if="active_habit">
                    <p v-text="active_habit.name" class="text-xl"></p>
                    <p v-text="active_habit.target"></p>
                </div>
            </div>
            <div class="flex">
                <habit
                    v-for="(habit, index) in habits"
                    v-model="habits[index]"
                    @mouseover="active_habit = habit"
                    @mouseleave="active_habit = null"
                />
            </div>
        </div>
    </body>
</html>
