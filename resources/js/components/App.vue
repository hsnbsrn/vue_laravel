<template>
    <nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Laravel-Vue</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <RouterLink to="/" class="nav-link">Ana Sayfa</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink to="/companies" class="nav-link">Şirketler</RouterLink>
          </li>
        </ul>>
      </div>
    </div>
  </nav>
    <div>
        <router-view></router-view>
    </div>
 </template>
 <script>
     export default {
         
     }
 </script>
 
 <style>
     
 </style>