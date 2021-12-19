<template>
    <div class="add-habit">
        <div class="add-habit__form flex items-center" :class="{'is-open' : is_open}">
            <input
                type="text"
                class="add-habit__input"
                v-model="form.data.name.value"
                :class="{ 'has-error': form.data.name.error }"
                v-on:input="form.data.name.error = null"
                placeholder="Name"
            />

            <input
                type="text"
                class="add-habit__input"
                v-model="form.data.icon.value"
                :class="{ 'has-error': form.data.icon.error }"
                v-on:input="form.data.icon.error = null"
                placeholder="Icon"
            />

            <input
                type="color"
                class="add-habit__input--color"
                v-model="form.data.color.value"
                :class="{ 'has-error': form.data.color.error }"
                v-on:input="form.data.color.error = null"
            />

            <input
                type="text"
                class="add-habit__input"
                v-model="form.data.target.value"
                :class="{ 'has-error': form.data.target.error }"
                v-on:input="form.data.target.error = null"
                placeholder="Target"
            />
        </div>
        <div class="add-habit__buttons">
            <button v-if="!is_open" class="add-habit__button" @click="is_open = true">
                <i class="fas fa-plus"></i>
            </button>

            <button v-if="is_open" class="add-habit__button" @click="save">
                <i class="fas fa-check"></i>
            </button>

            <button v-if="is_open" class="add-habit__button" @click="close">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
</template>

<script>
import Form from "../includes/Form";

export default {
    name: "AddHabit",

    data() {
        return {
            is_open: false,
            form: new Form({
                name: {
                    value: null, error: null
                },
                icon: {
                    value: null, error: null
                },
                color: {
                    value: null, error: null
                },
                target: {
                    value: null, error: null
                }
            })
        }
    },

    methods: {
        save() {
            axios.post('api/habits', this.form.getValues())
                .then(({data}) => {
                    this.$emit('saved', data);
                    this.form.clearAll();
                    this.is_open = false;
                })
                .catch(({response}) => {
                    if (response.status === 422) {
                        this.form.fillErrors(response.data.errors);
                    }
                });
        },

        close() {
            this.is_open = false;

            window.setTimeout(() => {
                this.form.clearAll();
            }, 300);
        }
    }
}
</script>
