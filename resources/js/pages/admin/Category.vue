<template>
    <div>

        <form @submit.prevent="update(category)" v-if="modoEditar">
            <h5 class="text-center">Editar Categoria</h5>
            <input type="text" class="form-control col-md-4 offset-md-4 mt-2" 
                placeholder="nombre categoria" v-model="category.name"  >
            <input type="text" class="form-control col-md-4 offset-md-4 mt-2" 
                placeholder="url imagen" v-model="category.img">
            <button class="btn btn-warning col-md-2  offset-md-4 mt-2 mb-3" type="submit">Editar</button>
            <button class="btn btn-danger col-md-2  mt-2 mb-3" type="submit" 
                @click="cancelEdid">Cancelar</button>
        </form>

        <form @submit.prevent="add" v-else>
            <h5 class="text-center">Agregar Categoria</h5>
            <div class="text-center">
                <input type="text" class="form-control col-md-4 offset-md-4" 
                    placeholder="nombre categoria" v-model="category.name" >
                <input type="text" class="form-control col-md-4 offset-md-4 mt-2" 
                    placeholder="url imagen" v-model="category.img">
                <button class="btn btn-primary col-md-4 offset-md-4 btn-block my-2" type="submit">Agregar</button>
            </div>

        </form>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">nombre</th>
                    <th width="20%">imagen</th>
                    <th width="15%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(category,index) in categories" :key="index">
                    <td>{{index + 1 }}</td>
                    <td>{{category.name}}</td>
                    <td><img :src="category.img" width="150px" class="img-thumbnail"></td>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <button @click="edit(category)" class="btn btn-warning">Editar</button>
                                
                            </div>
                            <div class="col-md-2">
                                <button  @click="deleted(category.id,index)" class="btn btn-danger float-left">Eliminar</button>
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
            categories:[],
            modoEditar: false,
            category:{name:'',img:''}
        }
    },

    methods: {
        getCategories(){
            axios.get(this.url+'categorias')
            .then(response => {
                this.categories = response.data
            })
        },
        add(){
            if(this.category.name == '' || this.category.img == ''){
                alert('Debes completar todos los campos antes de guardar');
                return;
            }
            const newCategory = this.category;
            this.category = {name : '', img : ''}

            axios.post(this.url+'categorias',newCategory)
            .then(response => {
                this.categories = [];
                this.getCategories()
            })

        },
        edit(item){
            this.category.name = item.name
            this.category.img  = item.img
            this.category.id   = item.id
            this.modoEditar = true;
        },

        deleted(id,index){
            if(confirm('¿ Està Seguro de eliminar esta categoria ?')){
                axios.delete(this.url+'categorias/'+id)
                .then(data => {
                    this.categories.splice(index,1)
                })
            }
        },

        update(category){
            axios.put(this.url+'categorias/'+category.id,category)
            .then(response => {
                this.categories = [];
                this.getCategories()
                this.cancelEdid()
            })
        },

        cancelEdid(){
            this.modoEditar = false;
            this.category = {name: '', img: ''}
        }
    },

    created() {
        this.getCategories()
    },
}
</script>