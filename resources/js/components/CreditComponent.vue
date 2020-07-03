<template>
    <div class="container">

        <!-- Show info entity buyer -->
        <div v-if="this.showInfo == true">
            <div class="row">
                <div class="col-3">
                    <h4>Datos del cliente:</h4>
                </div>
                <div class="col-8">
                    <table>
                        <tr>
                            <th>Nombre:</th>
                            <td>{{fullname}}</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <th>Dirección:</th>
                            <td v-if="this.data != null"> {{ this.data.person.address }} </td>
                        </tr>    
                        <tr>
                            <th>Libreta:</th>
                            <td v-if="this.data != null"> {{ this.data.no_notebook }} </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <th>Registro:</th>
                            <td v-if="this.data != null"> {{ this.data.no_registry }} </td>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Show info entity buyer -->


        <!-- Message entity buyer not found -->
        <div v-if="this.not_found_person != ''">

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ this.not_found_person }}</strong>
            </div>
            
        </div>
        <!-- End Message entity buyer not found -->

        <br>
        <div class="row">
            <div class="col-3">
                <h4 class="text-center">Buscar Persona</h4>                

                <div class="row align-items-end">
                    <div class="col-8">
                        <label for="buyer_id">id del cliente</label> <br>
                        <input type="text" name="buyer_id" id="buyer_id" class="form-control form-control-sm" v-model="person_id"> 
                    </div>
                    <button class="btn btn-defaul col-4" @click="SearchPersonByID">buscar</button>
                </div>

                <div class="form-row">
                    <label for="buyer_name">Nombre</label>
                    <input type="text" name="buyer_name" id="buyer_name" class="form-control form-control-sm" v-model="fullname">
                    
                </div>
                
                <br>
                <div class="btn btn-secondary btn-block" id="selectUser">Seleccionar</div>

            </div>

            <div class="col-9">
                <h4 class="text-center">Selecciona productos</h4>
                <div class="row">
                    <div class="col-5">

                        <div class="row align-items-end">
                            <div class="col-8">
                                <label for="product_id">id del producto</label>
                                <input type="text" name="product_id" id="product_id" class="form-control form-control-sm">
                            </div>
                            <button class="btn btn-default col-4">Buscar</button>
                        </div>

                        <div class="form-row">
                            <label for="product_name">Nombre del producto</label>
                            <input type="text" name="product_name" id="product_name" class="form-control form-control-sm" 
                                    v-model="query" 
                                    v-on:keyup="autoComplete"
                                    >
                            
                            <ul class="autocomplete-results" v-if="results.length > 0" >
                                <li class="autocomplete-results" v-for="result in results" :key="result.id">
                                    {{ result.name }}
                                </li>
                            </ul>
                                
                            
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <label for="pz">Piezas</label>
                                <input type="text" name="pz" id="pz" class="form-control form-control-sm">
                            </div>
                            <div class="col-4">
                                <label for="in_stock">En existencia</label>
                                <input type="text" class="form-control form-control-sm" name="in_stock" id="in_stock" disabled>
                            </div>
                            <div class="col-4">
                                <label for="price">Precio</label>
                                <input type="text" class="form-control form-control-sm" name="price" id="price" disabled>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <span>¿Tomar del almacén?</span> &nbsp;                       
                            <div class="form-check mx-2">
                                <input class="form-check-input" type="radio" name="take_radio" id="take_radio" value="take" checked>
                                <label class="form-check-label" for="take_radio">
                                    SI, tomar
                                </label>
                            </div>
                            <div class="form-check mx-2">
                                <input class="form-check-input" type="radio" name="take_radio" id="take_radio" value="no_take">
                                <label class="form-check-label" for="take_radio">
                                    NO, no tomar
                                </label>
                            </div>
                        </div>

                    </div>
                    
                    <div class="col-7">
                        <label for="description">Nota</label>
                        <textarea class="form-control" name="description" id="description" placeholder=" Puede agregar una nota (Opcional) "></textarea>
                    </div>

                </div>

                <div class="row justify-content-center mt-3">
                    <div class="btn btn-primary">Agregar a la lista</div>
                </div>

            </div>

        </div>

    </div>
</template>

<script>
export default {
    data(){
        return{
            person_id : null,
            person : null,
            data : null,
            showInfo : false,
            fullname : null,
            product_id : null,
            query: null,
            results : [],
            product : null,
            Products : [],
            not_found_person : ''
        }
    },
    created(){

    },
    methods:{
        SearchPersonByID(){
            axios.get(`/api/buyer/${this.person_id}`).then(res=>{              
                this.data = res.data;
                this.fullname = this.data.person.name+' '+ this.data.person.ap_pat+' '+ this.data.person.ap_mat
                this.showInfo = true;
                this.not_found_person = ''
            })
            .catch(error=>{
                this.showInfo = false;
                this.fullname = null;
                this.not_found_person = 'No pude encontrar algún cliente con esa información';              
            })
        },
        SearchPersonByName(){

        },
        SearchProductByID(){

        },
        SearchProductByName(){

        },
        AddProduct(){

        },
        listProducts(){

        },
        removeItem(){

        },
        store(){

        },
        autoComplete(){
            this.results = [];
            
            if(this.query != null){
                axios.get('/api/product/'+this.query)
                .then(response => {
                    this.results = response.data;
                });
            }
            
        }
        
    }
}
</script>
