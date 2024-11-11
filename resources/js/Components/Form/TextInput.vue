<template>
  <div class="form-group">
    <label :for="name">{{ label }}</label>
    <input
        type="text"
        class="form-control"
        :id="name"
        :value="modelValue"
        :required="required"
        @input="updateValue"
    />
  </div>
</template>

<script setup>
const props = defineProps({
  name: String,
  label: String,
  modelValue: String,
  required: Boolean,
});

const emit = defineEmits(['update:modelValue']);

const updateValue = (event) => {
  emit('update:modelValue', event.target.value);
};
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
</style>
