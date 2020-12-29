<template>
    <div>

        <form @submit.prevent="update(size)" v-if="modoEditar">
            <h5 class="text-center">Editar talla</h5>
            <input type="text" class="form-control col-md-4 offset-md-4 mt-2" 
                placeholder="nombre talla" v-model="size.name">
            <button class="btn btn-warning col-md-2  offset-md-4 mt-2 mb-3" type="submit">Editar</button>
            <button class="btn btn-danger col-md-2  mt-2 mb-3" type="submit" 
                @click="cancelEdid">Cancelar</button>
        </form>

        <form @submit.prevent="add" v-else>
            <h5 class="text-center">Agregar talla</h5>
            <div class="text-center">
                <input type="text" class="form-control col-md-4 offset-md-4" 
                    placeholder="nombre talla" v-model="size.name" >
                <button class="btn btn-primary col-md-4 offset-md-4 btn-block my-2" type="submit">Agregar</button>
            </div>

        </form>
        <table class="table table-striped table-sm" >
            <thead>
                <tr >
                    <th width="5%">#</th>
                    <th width="10%">nombre</th>
                    <th width="15%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(size,index) in sizes" :key="index">
                    <td>{{index + 1 }}</td>
                    <td>{{size.name}}</td>
                    <td>
                        <div class="row">
                            <div class="col-md-4">
                                <button @click="edit(size)" class="btn btn-warning">Editar</button>
                                
                            </div>
                            <div class="col-md-2">
                                <button  @click="deleted(size.id,index)" class="btn btn-danger float-left">Eliminar</button>
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
            sizes:[],
            modoEditar: false,
            size:{name:''}
        }
    },

    methods: {
        getsizes(){
            axios.get(this.url+'sizes')
            .then(response => {
                this.sizes = response.data
            })
        },
        add(){
            if(this.size.name == ''){
                alert('Debes completar todos los campos antes de guardar');
                return;
            }
            const newsize = this.size;
            this.size = {name : ''}

            axios.post(this.url+'sizes',newsize)
            .then(response => {
                this.sizes = [];
                this.getsizes()
            })

        },
        edit(item){
            this.size.name = item.name
            this.size.id   = item.id
            this.modoEditar = true;
        },

        deleted(id,index){
            if(confirm('¿ Està Seguro de eliminar esta talla ?')){
                axios.delete(this.url+'sizes/'+id)
                .then(data => {
                    this.sizes.splice(index,1)
                })
            }
        },

        update(size){
            axios.put(this.url+'sizes/'+size.id,size)
            .then(response => {
                this.sizes = [];
                this.getsizes()
                this.cancelEdid()
            })
        },

        cancelEdid(){
            this.modoEditar = false;
            this.size = {name: ''}
        }
    },

    created() {
        this.getsizes()
    },
}
</script>