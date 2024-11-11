<template>
    <div class="layout">
        <div class="navbar">
            <div class="navbar-left">

            </div>
            <div class="navbar-right">
                <div class="profile-section">
                    <div class="profile-img-name" @click="toogleProfileMenu">
                        <img class="image-profile" src="/images/medicoprofile.avif" alt="" />
                        <b>{{user.name.split(" ")[0]}}</b>
                    </div>

                    <ul class="options-profile" v-show="activeProfileMenu">
                        <li>Perfil</li>
                        <li>
                            <a href="/medico/logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="content">
            <slot name="content"></slot>
        </div>

    </div>
</template>

<script setup>
import {computed, ref} from 'vue';

const activeProfileMenu = ref(true);
import { usePage } from '@inertiajs/vue3'
const page = usePage()
const user = computed(() => page.props.auth.user)

const toogleProfileMenu = () =>{
    activeProfileMenu.value =  !activeProfileMenu.value;
}

</script>

<style scoped>

.layout{
    display: flex;
    background: #fff;
    width: 100%;
    height: 100%;
    min-width: 100vw;
    min-height: 100vh;
    flex-direction: column;
}

.navbar{
    width: 100%;
    height: 95px;
    background: #0f34ec;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}
.navbar-left, .navbar-right{
    width: 50%;
    display: flex;
    padding: 5px;
}

.navbar-right{
  justify-content: end;
}

.profile-img-name{
    display: flex;
    justify-content: end;
    flex-direction: column;
}

.image-profile{
    width: 60px;
    height: 60px;
    background: #fff;
    display: flex;
    border-radius: 50%;
    border:5px solid #000000;
    cursor: pointer;
    justify-self: center;
}

.image-profile:hover{
    border:5px solid #286700;
}

.profile-section{
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 150px;
}

.options-profile{
    color:#0000;
    background: #fff;
    top: -15px;
    right: 15px;
    position: relative;
    border-radius: 3px 3px 3px  3px;
    box-shadow: 5px 3px 3px #ccc;
    list-style-type: none;
    padding-left: 0;
    width: 150px;
    z-index: 999;
}

.options-profile li {
    width: 100%;
    background: #fff;
    color:black;
    padding: 5px;
    text-align: left;
    margin-left: 0;
    font-size: large;
    cursor: pointer;
    z-index: 99999;
}

.options-profile li a {
    text-decoration: none;
    color:black;
}

.content{
    width: 100%;
    height: 100%;
    color:black;
}

</style>
