<script>

import axios from 'axios';

import ProjectItem from '../components/ProjectItem.vue';

export default {
    name: 'ListProjects',
    components:{
        ProjectItem
    },
    data(){
        return {
            baseUrl: 'http://127.0.0.1:8000/api/',
            projects : [],
            contentMaxLength: 150,
            // pagination:{
            //     current:1,
            //     last:null,
            // }
        }
    },
    methods:{
        getApi(){
            axios.get(this.baseUrl + 'projects')
            .then(result => {
                this.projects = result.data.projects;
                // console.log(this.projects);
            })
        },

    },
    mounted(){
        this.getApi();
    }
}

</script>

<template>

    <div class="container">

        <h1>Elenco Progetti</h1>

        <ProjectItem v-for="project in projects" :key="project.id" :project="project" />

    </div>

</template>

<style>
</style>
