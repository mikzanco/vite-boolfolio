<script>

import {truncateText} from '../data/functions'

export default {
    name: 'ProjectItem',
    data(){
        return{
            truncateText,
            contentMaxLength: 150
        }
    },
    props:{
        project: Object
    },
}
</script>

<template>

    <div class="project-box">
        <h3>{{project.name}}</h3>
        <p v-html="truncateText(project.summary, contentMaxLength)"></p>
    </div>

</template>



<style>

</style>
