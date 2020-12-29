<template>
    <div>

        <form @submit.prevent="update(product)" v-if="modoEditar">
            <h5 class="text-center">Editar producto</h5>
            <input type="text" class="form-control col-md-4 offset-md-4 mt-2" 
                placeholder="nombre producto" v-model="product.name"  >
            <input type="text" class="form-control col-md-4 offset-md-4 mt-2" 
                placeholder="url imagen" v-model="product.img">
            <input type="number" class="form-control col-md-4 offset-md-4 mt-2" 
                placeholder="precio" v-model="product.price">
            
            <select v-model="product.category_id" class="form-control col-md-4 offset-md-4 mt-2">
                <option  :value="product.category_id">{{product.category_name}}</option>
                <option v-for="(category,index) in categories" :key="index" :value="category.id"> {{category.name}}</option>
            </select><br>

            

            <button class="btn btn-warning col-md-2  offset-md-4 mt-2 mb-3" type="submit">Editar</button>
            <button class="btn btn-danger col-md-2  mt-2 mb-3" type="submit" 
                @click="cancelEdid">Cancelar</button>
        </form>

        <form @submit.prevent="add" v-else>
            <h5 class="text-center">Agregar producto</h5>
            <div class="text-center">
                <input type="text" class="form-control col-md-4 offset-md-4" 
                    placeholder="nombre producto" v-model="product.name" >
                <input type="text" class="form-control col-md-4 offset-md-4 mt-2" 
                    placeholder="url imagen" v-model="product.img">
                <input type="number" class="form-control col-md-4 offset-md-4 mt-2" 
                placeholder="precio" v-model="product.price">

                <select v-model="product.category_id" class="form-control col-md-4 offset-md-4 mt-2">
                    <option disabled value="">Selecciona una categoria</option>
                    <option v-for="(category,index) in categories" :key="index" :value="category.id"> {{category.name}}</option>
                </select><br>
                <label for="">Tallas : </label>&nbsp;
                <template v-for="size in sizes" >
                     <input  type="checkbox" :id="size.id" :value="size.id" v-model="product.sizes">
                     <label :for="size.name">{{size.name}}</label>  &nbsp; &nbsp;
                </template>
                <button class="btn btn-primary col-md-4 offset-md-4 btn-block my-2" type="submit">Agregar</button>
            </div>

        </form>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="15%">nombre</th>
                    <th width="15%">imagen</th>
                    <th width="10%">precio</th>
                    <th width="20%">tallas</th>
                    <th width="15%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product,index) in products" :key="index">
                    <td>{{index + 1 }}</td>
                    <td>{{product.name}}</td>
                    <td><img :src="product.img" width="100px" class="img-thumbnail"></td>
                    <td>{{product.price | currency}}</td> 
                    
                    <td>
                        <template v-for="size in product.sizes">
                        <b>{{size.name}}</b> &nbsp;
                        </template>
                    </td>
                    
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <button @click="edit(product)" class="btn btn-warning">Editar</button>
                                
                            </div>
                            <div class="col-md-2">
                                <button  @click="deleted(product.id,index)" class="btn btn-danger float-left">Eliminar</button>
                            </div>
                        </div>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            products:[],
            categories:[],
            sizes:[],
            modoEditar: false,
            product:{
                name:'',
                img:'',
                price:'',
                category_id:'',
                sizes:[]
                }
        }
    },

    methods: {
        getproducts(){
            axios.get(this.url+'catalogos')
            .then(response => {
                this.products = response.data
            })
        },
        add(){
            if(this.product.name == '' || this.product.img == '',this.product.price == '',this.product.category_id == ''){
                alert('Debes completar todos los campos antes de guardar');
                return;
            }
            const newproduct = this.product;
            this.product = {name : '', img : '',price:'',category_id:'',sizes:[]}

            axios.post(this.url+'catalogos',newproduct)
            .then(response => {
                console.log(response.data);
                this.products = [];
                this.getproducts()
            })

        },
        edit(item){
            this.product.name          = item.name
            this.product.img           = item.img
            this.product.price         = item.price
            this.product.id            = item.id
            this.product.category_id   = item.category_id
            this.product.category_name = item.category.name
            this.modoEditar = true;
        },

        deleted(id,index){
            if(confirm('¿ Està Seguro de eliminar esta producto ?')){
                axios.delete(this.url+'catalogos/'+id)
                .then(data => {
                    this.products.splice(index,1)
                })
            }
        },

        update(product){
            axios.put(this.url+'catalogos/'+product.id,product)
            .then(response => {
                this.products = [];
                this.getproducts()
                this.cancelEdid()
            })
        },

        cancelEdid(){
            this.modoEditar = false;
            this.product = {name: '', img: ''}
        },

        getCategories(){
            axios.get(this.url+'categorias')
            .then(response => {
                this.categories = response.data
            })
        },

        getSizes(){
            axios.get(this.url+'sizes')
            .then(response => {
                this.sizes = response.data
            })
        }
    },

    created() {
        this.getproducts()
        this.getCategories();
        this.getSizes();
    },
}
</script>