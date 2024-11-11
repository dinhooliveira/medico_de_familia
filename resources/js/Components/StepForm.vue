<template>
    <div class="step-form-container">
        <div class="progress-bar">
            <div v-for="(step, index) in steps" :key="index" :class="{ 'step-item': true, 'active': currentStep >= index }">
                <span>{{ step.title }}</span>
            </div>
        </div>
        <form @submit.prevent="submitForm" id="stepForm">
            <div v-for="(step, index) in steps" :key="index" :class="{ 'step': true, 'active': currentStep === index }">
                <div v-for="field in step.fields" :key="field.name" class="form-group">
                    <text-input
                        v-if="field.type === 'text'"
                        :name="field.name"
                        :label="field.label"
                        v-model="formData[field.name]"
                        :required="field.required"
                    />
                    <email-input
                        v-else-if="field.type === 'email'"
                        :name="field.name"
                        :label="field.label"
                        v-model="formData[field.name]"
                        :required="field.required"
                    />
                    <number-input
                        v-else-if="field.type === 'number'"
                        :name="field.name"
                        :label="field.label"
                        v-model="formData[field.name]"
                        :required="field.required"
                    />
                    <date-input
                        v-else-if="field.type === 'date'"
                        :name="field.name"
                        :label="field.label"
                        v-model="formData[field.name]"
                        :required="field.required"
                    />
                    <select-input
                        v-else-if="field.type === 'select'"
                        :name="field.name"
                        :label="field.label"
                        v-model="formData[field.name]"
                        :required="field.required"
                        :options="field.options"
                        :optionLabel="field.optionLabel"
                        :optionValue="field.optionValue"
                    />
                    <multi-select-input
                        v-else-if="field.type === 'multiSelect'"
                        :name="field.name"
                        :label="field.label"
                        :modelValue="formData[field.name]"
                        :required="field.required"
                        :options="field.options"
                        @update:modelValue="value => formData[field.name] = value"
                    />
                </div>
                <!-- Nova seção para adicionar itens à tabela -->
                <div v-if="step.section === 'tableform'" class="table-section">
                    <h3>Adicionar Itens</h3>
                    <table>
                        <thead>
                        <tr>
                            <th v-for="field in step.fields" :key="field.name">{{ field.label }}</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(item, itemIndex) in formData.items" :key="itemIndex">
                            <td v-for="field in step.fields" :key="field.name">
                                <text-input
                                    v-if="field.type === 'text'"
                                    :name="`items[${itemIndex}].${field.name}`"
                                    v-model="item[field.name]"
                                    :required="field.required"
                                />
                                <number-input
                                    v-else-if="field.type === 'number'"
                                    :name="`items[${itemIndex}].${field.name}`"
                                    v-model="item[field.name]"
                                    :required="field.required"
                                />
                                <!-- Adicione outros tipos de input conforme necessário -->
                            </td>
                            <td>
                                <button type="button" @click="removeItem(itemIndex)">Remover</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <button type="button" @click="addItem">Adicionar Item</button>
                </div>
                <div class="button-group">
                    <Button v-if="index > 0"
                            label="Anterior"
                            type="button"
                            class="btn btn-secondary"
                            @click="prevStep"
                    />
                    <Button
                        label="Próximo"
                        v-if="index < steps.length - 1"
                        b-type="primary"
                        @click="nextStep"
                    />

                    <Button
                        v-if="index === steps.length - 1"
                        type="submit"
                        label="Salvar"/>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { ref, reactive } from 'vue';
import Button from "./Button.vue";
import TextInput from   './Form/TextInput.vue';
import EmailInput from  './Form/EmailInput.vue';
import NumberInput from './Form/NumberInput.vue';
import DateInput from   './Form/DateInput.vue';
import SelectInput from './Form/SelectInput.vue';
import MultiSelectInput from "./Form/MultiSelectInput.vue";

const props = defineProps({
    steps: Array,
});

const currentStep = ref(0);
const formData = reactive({
    items: []
});

const nextStep = () => {
    if (currentStep.value < props.steps.length - 1) {
        currentStep.value++;
    }
};

const prevStep = () => {
    if (currentStep.value > 0) {
        currentStep.value--;
    }
};

const submitForm = () => {
    console.log(formData);
};

const addItem = () => {
    const newItem = {};
    props.steps[currentStep.value].fields.forEach(field => {
        newItem[field.name] = '';
    });
    formData.items.push(newItem);
};

const removeItem = (index) => {
    formData.items.splice(index, 1);
};
</script>

<style scoped>
.step-form-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 2px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.progress-bar {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.step-item {
    flex: 1;
    text-align: center;
    padding: 10px 0;
    border-bottom: 2px solid #ddd;
    cursor: pointer;
    transition: border-color 0.3s;
}

.step-item.active {
    border-color: #007bff;
    color: #007bff;
}

.step-item span {
    font-size: 14px;
    font-weight: bold;
}

.step {
    display: none;
}

.step.active {
    display: block;
}

.form-group {
    margin-bottom: 1rem;
    display: flex;
    flex-direction: column;
}

.button-group {
    display: flex;
    justify-content: space-between;
    margin-top: 1rem;
}

.button-group button {
    margin-right: 0.5rem;
}

.button-group button:last-child {
    margin-right: 0;
}

form{
    padding: 5px;
}

.table-section {
    margin-top: 20px;
}

.table-section table {
    width: 100%;
    border-collapse: collapse;
}

.table-section th, .table-section td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.table-section th {
    background-color: #f2f2f2;
}

.table-section button {
    background-color: #ff4d4d;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}

.table-section button:hover {
    background-color: #ff1a1a;
}

@media only screen and (max-width: 600px) {

    .step-form-container{
        display: flex;
    }

    .progress-bar{
        flex-direction: column;
        width: 90px;
    }
    .step-item{
        border: none;
        border-right: 2px solid #ddd;
    }
}
</style>


