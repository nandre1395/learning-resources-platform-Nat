<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

    let categories = ref([]);
    let title = ref("");
    let description = ref("");
    let link = ref("");

    onMounted(() => {
        axios.get("/api/categories").then((response) =>{
            categories.value = response.data;
        });
    });

    function createResource(){
       axios
        .post("/api/resources",{
             title: title.value,
             description: description.value,
             link: link.value,
       })
       .then((response) => {
        console.log(response);
       });
    }

</script>

<template>
<div class="m-8">
    <input type="text" v-model="title">
    <input type="text" v-model="description">
    <input type="text" v-model="link">
    <button @click="createResource">Crear Recurso</button>
</div>
</template>