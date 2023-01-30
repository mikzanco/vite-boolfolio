<script>

import axios from 'axios';
import { baseUrl } from '../data/data';

export default {
    name: 'ProjectDetails',
    data(){

        baseUrl;
        return {
            projects: {},
        }
    },
    methods:{
        getApi(){
            axios.get(baseUrl + 'projects/' + this.$route.params.slug)
            .then(res => {
                this.projects = res.data;
                console.log(res.data);
            })
        }
    },
    mounted(){
        this.getApi();
    }
}

</script>

<template>
    <h1>Dettaglio Progetto: {{ projects.name }} </h1>
    <div class="type" v-if="projects.typology">Tipologia: {{ projects.typology.name }}</div>
    <div>{{ projects.summary }}</div>
    <div>
        <img :src="projects.cover_image" :alt="projects.name">
    </div>
    <div class="date">{{ projects.created_at }}</div>
</template>

<style lang="scss" scoped>
.date{
    margin-left: 80%;
}
</style>
