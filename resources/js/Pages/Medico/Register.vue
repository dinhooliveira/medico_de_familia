<template>
    <div class="m-container">
        <div class="form" @submit.prevent="send">
            <h1 style="padding: 0;margin: 0;">Faça parte</h1>
            <hr style="width: 100%">
            <InputGroup>
                <InputGroupAddon>
                    <i class="pi pi-user"></i>
                </InputGroupAddon>
                <InputText v-model="form.name" placeholder="Nome" />
            </InputGroup>
            <b  class="error-message" v-if="errors.name">{{errors.name}}</b>

            <InputGroup>
                <InputGroupAddon>
                    <i class="pi pi-envelope"></i>
                </InputGroupAddon>
                <InputText v-model="form.email" placeholder="E-mail" />
            </InputGroup>
            <b  class="error-message" v-if="errors.email">{{errors.email}}</b>
            <InputGroup>
                <InputGroupAddon>
                    <i class="pi pi-key"></i>
                </InputGroupAddon>
                <Password v-model="form.password" :feedback="false" placeholder="Senha" />
            </InputGroup>
            <b  class="error-message" v-if="errors.password">{{errors.password}}</b>
            <InputGroup>
                <InputGroupAddon>
                    <i class="pi pi-key"></i>
                </InputGroupAddon>
                <Password v-model="form.password_confirmation" :feedback="false" placeholder="Confirmar Senha" />
            </InputGroup>
            <b  class="error-message" v-if="errors.password_confirmation">{{form.password_confirmation}}</b>
            <Button label="Efetuar cadastro" @click="send" type="submit"></Button>
        </div>
    </div>
</template>

<script setup>

import {reactive} from "vue";
import { router } from '@inertiajs/vue3'

const props = defineProps({
    errors:Object
})

const form  = reactive({
    name:'',
    email:'',
    password:'',
    password_confirmation:''
})

const send = () =>{
    router.post('/medico/register', form)
}

</script>

<style scoped>

.m-container {
    position: relative;
    display: flex;
    justify-content: space-around;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
    min-width: 100vw;
    width: 100%;
    height: 100%;
    box-sizing: border-box;
    z-index: 1;
    background-image: url("/images/background.webp");
    flex-wrap: wrap;
}

.m-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 255, 0.5);
    z-index: -1;
}

.form{
    background: #fff;
    padding: 15px;
    width: 350px;
    display: flex;
    flex-direction: column;
    gap:5px;
    border-radius: 5px;
    justify-content: center;
    align-items: center;

}

.error-message{
    color:red;
    display: flex;
    align-self: flex-start;
}


@media (max-width: 1024px) {
    .m-container {
        flex-direction: column;
        background-image: url("/images/background-mobile.webp");
        background-size: cover;
        background-attachment: scroll
    }

}
</style>
