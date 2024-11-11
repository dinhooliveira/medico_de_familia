<template>
    <div class="form-group">
        <label :for="name">{{ label }}</label>
        <input
            type="text"
            class="form-control mb-2"
            :placeholder="`Filtrar ${label}`"
            v-model="filter"
        />
        <div class="selected-items">
            <span v-for="selected in selectedOptions" :key="selected" class="badge badge-primary mr-1">
                {{ getOptionName(selected) }}
                <button type="button" class="close" @click="removeSelected(selected)">
                    &times;
                </button>
            </span>
        </div>
        <div class="checkbox-list">
            <div v-for="option in filteredOptions" :key="option.id" class="checkbox-item">
                <input
                    type="checkbox"
                    :id="`${name}-${option.id}`"
                    :value="option.id"
                    v-model="selectedOptions"
                />
                <label :for="`${name}-${option.id}`">{{ option.nome }}</label>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, watch } from 'vue';

const props = defineProps({
    name: String,
    label: String,
    modelValue: {
        type: Array,
        default: () => [],
    },
    required: Boolean,
    options: Array,
});

const emit = defineEmits(['update:modelValue']);

const filter = ref('');
const selectedOptions = ref([...props.modelValue]);

const filteredOptions = computed(() => {
    return props.options.filter(option =>
        option.nome.toLowerCase().includes(filter.value.toLowerCase())
    );
});

const getOptionName = (id) => {
    const option = props.options.find(opt => opt.id === id);
    return option ? option.nome : '';
};

const removeSelected = (id) => {
    selectedOptions.value = selectedOptions.value.filter(selected => selected !== id);
};

watch(selectedOptions, (newVal) => {
    emit('update:modelValue', newVal);
});
</script>

<style scoped>
.form-group {
    margin-bottom: 1rem;
}

.form-control {
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    padding: 0.5rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.form-control:focus {
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.mb-2 {
    margin-bottom: 0.5rem;
}

.checkbox-list {
    max-height: 200px;
    overflow-y: auto;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    padding: 0.5rem;
    background-color: #fff;
}

.checkbox-item {
    display: flex;
    align-items: center;
    margin-bottom: 0.5rem;
}

.checkbox-item input {
    margin-right: 0.5rem;
}

.selected-items {
    margin-bottom: 1rem;
}

.badge {
    display: inline-block;
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.25rem;
    background-color: #007bff;
    color: #fff;
}

.badge .close {
    margin-left: 0.5rem;
    font-size: 1rem;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-shadow: 0 1px 0 #fff;
    opacity: 0.5;
}

.badge .close:hover {
    opacity: 0.75;
}

.mr-1 {
    margin-right: 0.25rem;
}
</style>
