<template>
    <div>
        <nav class=" nav navbar navbar-expand-md navbar-dark fixed-top">
            <router-link to="/categorias" class="nav-link cab">Ferchito Store</router-link>
            <a class="nav-link cab" href="logout"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                <i class="material-icons nav__icon">exit_to_app</i>
            </a>

            <form id="logout-form" action="logout" method="POST" class="d-none">
                
            </form>
            
        </nav>


        <nav class="nav">
            <router-link to="/categorias" class="nav__link nav-link nav__link--active">
                <i class="material-icons nav__icon">home</i>
                <span class="nav__text">Categorias</span>
            </router-link>

            <router-link to="/catalogo" class="nav__link nav-link">
                <i class="material-icons nav__icon">receipt_long</i>
                <span class="nav__text">Catalogo</span>
            </router-link>

            <router-link to="/carrito" class="nav__link nav-link">
                <i class="material-icons nav__icon">add_shopping_cart</i>
                <span class="nav__text">Carrito</span>
            </router-link>
        </nav>

        <div class="container mt-5">
            <router-view></router-view>
        </div>   
    </div>
</template>

<script>
    export default {
    }
</script>

<style>
body {
    margin: 0 0 55px 0;
}

.nav {
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 55px;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
    background-color: #ffffff;
    display: flex;
    overflow-x: auto;
}

.nav__link {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex-grow: 1;
    min-width: 50px;
    overflow: hidden;
    white-space: nowrap;
    font-family: sans-serif;
    font-size: 15px;
    color: #444444;
    text-decoration: none;
    -webkit-tap-highlight-color: transparent;
    transition: background-color 0.1s ease-in-out;
}

.nav__link:hover {
    background-color: #eeeeee;
}

.nav__link--active {
    color: #dd7cb4;
}

.nav__icon {
    font-size: 18px;
}

.cab{
    color: #dd7cb4;
    font-size: 20px;
}
</style>