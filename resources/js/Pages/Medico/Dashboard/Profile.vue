<script setup>

import MedicoDashboardLayout from "../../Layout/MedicoDashboardLayout.vue";

import StepForm from "../../../Components/StepForm.vue";
import {ref} from "vue";
const steps = ref([
    {
        title:"Dados Pessoais",
        fields:[
            {
                name:"nome_completo",
                label:"Nome Completo",
                type:"text",
                required:true
            },
            {
                name:"data_nascimento",
                label:"Data Nascimento",
                type:"date",
                required:true
            },
            {
                name:"nacionalidade_id",
                label:"Nacionalidade",
                type:"select",
                required:true,
                options:[

                ]
            },
            {
                name:"estado_civil_id",
                label:"Estado Civil",
                type:"select",
                required:true,
                options:[

                ]
            },

        ]
    },
    {
        title:"Documentos",
        fields:[
            {
                name:"rg",
                label:"RG",
                type:"text",
                required:true,
            },
            {
                name:"cpf",
                label:"CPF",
                type:"text",
                required:true,
            },
            {
                name:"crm",
                label:"CRM",
                type:"text",
                required:true,
            },
        ]
    },
    {
        title:"Contatos",
        fields:[
            {
                name:"telefone",
                label:"Telefone",
                type:"text",
                required:true,
            },
            {
                name:"email",
                label:"E-mail",
                type:"email",
                required:true,
            },
        ]
    },
    {
        title: 'Graduação',
        section: 'tableform',
        fields: [
            { name: 'instituicao', label: 'Instituição', type: 'text', required: true },
            { name: 'ano', label: 'Ano', type: 'number', required: true }
        ]
    },
    {
        title: 'Especialidades',
        section: 'tableform',
        fields: [
            { name: 'especialidade_id',
                label: 'Especilidades',
                type: 'select',
                required: true,
                optionLabel:"nome",
                optionValue:"id",
                options: [
                    {
                        id:1,
                        nome:"Teste"
                    },
                    {
                        id:2,
                        nome:"Teste 2"
                    },

                ]
            },
        ]
    }
])

</script>

<template>

    <medico-dashboard-layout>
        <template v-slot:content>
            <StepForm :steps="steps" style="margin-top:20px"></StepForm>
        </template>
    </medico-dashboard-layout>

</template>

<style scoped>
</style>
