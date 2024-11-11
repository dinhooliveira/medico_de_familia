<script setup>

const props = defineProps({
    label:{
        type:String
    },
    bType:{
        type:String
    }
});

</script>

<template>
    <button class="button">
         {{label}}
    </button>
</template>

<style scoped>
  .button{
      background: #495057;
      padding: 5px;
      border-radius: 2px;
      color:white;
  }

  .primary{
      background: var(--primary);
      color:white;
  }

</style>
