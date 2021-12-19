
export default class Form
{
    constructor(data) {
        this.data = data;
        this.default = _.cloneDeep(data);
    }

    getValues() {
        let values = {};

        Object.entries(this.data).forEach((field) => {
            values[field[0]] = field[1].value;
        });

        return values;
    }

    clearAll() {
        this.data = _.cloneDeep(this.default);
    }

    fillValues(values) {
        Object.entries(this.data).forEach((field) => {
            if (values[field[0]]) {
                field[1].value = values[field[0]];
            }
        });
    }

    fillErrors(errors) {
        Object.entries(errors).forEach((error) => {
            this.data[error[0]].error = error[1][0];
        })
    }
}
