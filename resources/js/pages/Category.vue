<template>
    <div>
      <div class="card text-left">
        <img class="card-img-top" src="https://mitienda.moda/img/productos-de-entrega-inmediata.e07d1e57.png" alt="">
      </div>
        <br>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100 rounded" src="https://io.tissini.app/img/categories/tapabocas-prominent.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100 rounded" src="https://io.tissini.app/img/categories/seamless-prominent.jpg" alt="Second slide">
            </div>
            <div class="carousel-item rounded" >
            <img class="d-block w-100" src="https://io.tissini.app/img/categories/ropa-interior-prominent.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br>
    <img src="https://io.tissini.app/img/categories/new-products.png" class="img-fluid" alt="" srcset="">
    <br><br>
    <div class="row">
        <div class="card col-md-6" style="width: 11rem;"  v-for="(product,index) in products" :key="index">
            <img class="card-img-top" :src="product.img" alt="Card image cap">
            <div class="card-body">
                <p class="card-text"><b>{{product.name}}</b></p>
                <p class="card-text">{{product.category.name}}</p>
                <p class="card-text" style="color:#dd7cb4">{{product.price | currency}}</p>
            </div>
        </div>
    </div>
    <br>
    <img src="https://io.tissini.app/img/categories/product-lines.png" class="img-fluid" alt="" srcset="">
    <br><br>
    <div class="row">
        <div class="card col-md-12"  v-for="(category,index) in categories.slice(4)" :key="index">
            <img class="card-img-top" :src="category.img" alt="Card image cap">
        </div>
    </div>

    </div>
</template>


<script>
export default {

     data() {
        return {
            categories:[],
            products:[]
        }
    },
    methods:{
            getCategories(){
                axios.get(this.url+'categorias')
                .then(response => {
                    this.categories = response.data
                })
           },

           getproducts(){
                axios.get(this.url+'catalogos')
                .then(response => {
                    this.products = response.data
                })
             },
    },
    created() {
        this.getproducts()
        this.getCategories();
    },
}
</script>