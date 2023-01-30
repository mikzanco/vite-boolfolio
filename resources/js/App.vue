<script>

import Header from './partials/Header.vue';



export default{
    name:'App',
    components:{
        Header
    }

}

</script>

<template>

    <Header />
    <main>
        <div class="container">
            <router-view> </router-view>
        </div>
    </main>


</template>

<style>


</style>








