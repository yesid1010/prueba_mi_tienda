<template>
    <div class="container-fluid">

        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <router-link to="/admin/categories" class="nav-link">Categorias</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <router-link to="/admin/products" class="nav-link">Productos</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/admin/sizes" class="nav-link">Tallas</router-link>
                </li>
                </ul>
            </div>
        </nav>

        <div class="container mt-5 pt-4">
            <router-view></router-view>
        </div>   
 
    </div>
</template>

<script>
    export default {
    }
</script>

