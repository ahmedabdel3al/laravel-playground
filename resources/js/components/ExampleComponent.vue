<template>
    <div class="container">
        <div class="row justify-content-center">
           <message></message>
           <user></user>
        </div>
    </div>
</template>

<script>
 import message from './message'
 import user from './user'
    export default {
        components:{
            message, 
            user
        }
    }
</script>
