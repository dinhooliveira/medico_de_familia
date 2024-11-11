<script setup>
  import {ref} from 'vue';
   const title = ref("Hello");

</script>

<template>
    <div class="m-container">
        <div class="left-side">
            <h1>Médico de família</h1>
            <p>Conectando médicos a pacientes</p>
        </div>
        <div class="right-side">
            <h2>Junte-se a nós na Médico de família e transforme vidas!</h2>
            <p>Com nosso cadastro rápido e fácil, você terá acesso a ferramentas inovadoras e uma comunidade de profissionais dedicados à saúde.
                <br>
                Faça parte dessa revolução no cuidado médico e comece a fazer a diferença hoje mesmo!</p>
            <div class="buttons-group">
                <a class="btn-register" href="/medico/register" >Faça seu cadastro</a>
                <a class="btn-register" href="/medico/login" >Acessar</a>
            </div>

        </div>
    </div>

</template>

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
    padding: 20px;
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

.left-side, .right-side {
    flex: 1;
    padding: 20px;
    color: #fff;
    text-align: center;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.left-side h1 {
    font-size: 5em;
    margin-bottom: 10px;
}

.left-side p {
    font-size: 3.0em;
}

.right-side h2 {
    font-size: 1.8em;
    margin-bottom: 20px;
}

.right-side p {
    font-size: 1.1em;
    margin-bottom: 20px;
}

.btn-register{
    background-color:#10b981;
    color: white;
    padding: 15px 30px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1.2em;
    transition: background-color 0.3s ease;
    box-shadow:  2px 2px 5px #0d5979;
    text-decoration: none;
    width:250px;
}

.btn-register:hover {
    background-color: #1443cd;
}

@media (max-width: 1024px) {
    .m-container {
        flex-direction: column;
        background-image: url("/images/background-mobile.webp");
        background-size: cover;
        background-attachment: scroll
    }

    .left-side, .right-side {
        padding: 40px;
    }

    .left-side h1 {
        font-size: 2em;
        margin: 0px;
    }

    .left-side p {
        font-size: 1em;
    }

    .right-side h2 {
        font-size: 1.5em;
    }

    .right-side p {
        font-size: 1em;
        text-align: justify;
    }

    button {
        font-size: 1em;
    }
}

.buttons-group{
    display: flex;
    flex-direction: column;
    gap: 5px;
    justify-content: center;
    align-items: center;
    width: 100%;
}
</style>
