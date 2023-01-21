<template>
  <Navbar/>
    <div>
        <router-view/>
    </div>
 </template>
 <script>
    import Navbar from './NavbarMenu.vue'
     export default {
         components:{Navbar}
     }
 </script>
 
 <style>
     
 </style>