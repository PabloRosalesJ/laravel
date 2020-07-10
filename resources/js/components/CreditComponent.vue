<template>
    <div class="container mt-0">

        <!-- Show info entity buyer -->
        <div v-if="this.showInfo == true">
            <div :class="['card', person_card, 'mt-0']">
                <div class="card-body my-0">
                    <h4 class="text-center">Datos del cliente:</h4>
                    <div class="row justify-content-around  mt-0">
                        <div class="col-8 mt-0">
                            <strong> Dirección: </strong> {{ this.person.person.address }} 
                        </div>
                        <div class="col-3 mt-0">
                            <strong> Telefono: </strong> {{ this.person.person.phone}}
                        </div>
                        <div class="col-3 mt-0">
                            <strong> Libreta: </strong> {{ this.person.no_notebook }}
                        </div> 
                        <div class="col-4 mt-0">
                            <strong> Registro: </strong> {{ this.person.no_registry }}
                        </div>                      
                    </div>
                </div>
            </div>
        </div>
        <!-- END Show info entity buyer -->


        <!-- Message entity buyer not found -->
        <div v-if="this.not_found_message != ''">
            
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ this.not_found_message }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                  @click="not_found_message = ''"
                  >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
        </div>
        <!-- End Message entity buyer not found -->

        <br>
        <div class="row">

            <!-- Person Section -->
            <div class="col-3">
                <h3 class="text-center">Buscar Persona</h3>                

                <div class="row align-items-end">
                    <div class="col-8">
                        <label for="buyer_id">id del cliente</label> <br>
                        <input type="text" name="buyer_id" id="buyer_id" class="form-control form-control-sm" 
                        v-model="person.id"
                        :disabled="this.person_selected == true"
                        > 
                    </div>
                    <button class="btn btn-defaul col-4" 
                    @click="SearchPersonByID"
                    :disabled="this.person_selected == true"
                    >
                        buscar
                    </button>
                </div>

                <div class="form-row">
                    <label for="buyer_name">Nombre</label>
                    <input type="text" name="buyer_name" id="buyer_name" class="form-control form-control-sm" 
                    v-model="fullname" disabled>                   
                </div>
                
                <br>
                <div class="btn btn-secondary btn-block" id="selectUser"  @click="SelectBuyer">Seleccionar</div>
            </div>
            <!-- END Person Section -->

            <!-- Product Section -->
            <div class="col-9">
                <h3 class="text-center">Selecciona productos</h3>

                <div class="row">

                    <div class="col-6">

                        <div class="row align-items-end">
                            <div class="col-8">
                                <label for="product_id">id del producto</label>
                                <input type="text" name="product_id" id="product_id" class="form-control form-control-sm"
                                    v-model.number="product.id"
                                >
                            </div>
                            <button class="btn btn-default col-4" @click="SearchProductByID">Buscar</button>
                        </div>

                        <label for="product_name">Nombre del producto</label>
                        <div class="form-row">
                            <input type="text" name="product_name" id="product_name" class="form-control form-control-sm" 
                            v-model="product.name" 
                            v-on:keyup="SearchProductByName">

                            <ul class="list-group col-12 p-0 m-0" v-if="product_results.length > 0" >
                                <li class="list-group-item list-group-item-action list-group-item-sm p-0 m-0" 
                                v-for="result in product_results" :key="result.id"
                                >
                                    <span class="ml-2"> {{ result.name+'. tiene el id: '+result.id}} </span>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="col-6">
                            <label for="description">Nota</label>
                            <textarea class="form-control" name="description" id="description" 
                            placeholder=" Puede agregar una nota (Opcional) " 
                                v-model="product.note"
                            ></textarea>
                    </div>

                </div>

                <div class="row align-items-center">
                    <div class="col-2">
                        <label for="pz">Piezas</label>
                        <input type="number" name="pz" id="pz" class="form-control form-control-sm" min="1"
                        v-model.number="product.pices"
                        @blur="price_item">
                    </div>
                    <div class="col-2">
                        <label for="in_stock">En existencia</label>
                        <input type="text" class="form-control form-control-sm" name="in_stock" id="in_stock" disabled
                        v-model.number="product.stock" >
                    </div>
                    <div class="col-2">
                        <label for="price">Precio</label>
                        <input type="text" class="form-control form-control-sm" name="price" id="price" disabled
                        v-model.number="product.p_menudeo" >
                    </div>
                    <div class="col-2">
                        <label for="total">total</label>
                        <input type="text" class="form-control form-control-sm" name="total" id="total" disabled
                        v-model.number="product.total">
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <span> <strong> ¿Tomar del almacén? </strong> </span>                 
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="take_radio" id="take_radio" value="take" checked
                                    v-model="product.take"
                                    >
                                <label class="form-check-label" for="take_radio"> SI, tomar </label>
                            </div>
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="take_radio" id="take_radio" value="no_take"
                                    v-model="product.take"
                                    >
                                <label class="form-check-label" for="take_radio"> NO, no tomar </label>
                            </div>
                        </div>
                    </div> 
                </div>

                <div class="row justify-content-center mt-3">
                    <div class="btn btn-primary btn-block mx-3"
                        @click="AddProduct"
                    >Agregar a la lista</div>
                    
                </div>

                <pre class="text-center">Productos en el carrito: {{this.added_products.length}} | Total: ${{total}} </pre>
                
                <!-- List of products -->
                <table class="table table-sm table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Pz</th>
                            <th>Total</th>
                            <th>Tomar?</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, key) in added_products">
                            <td>{{ key+1 }}</td>
                            <td>{{item.name}}</td>
                            <td>{{item.p_menudeo}}</td>
                            <td> 
                                <div class="btn btn-default btn-sm"
                                    @click="AddOne(key)"
                                >+</div> 
                                    {{item.pices}} 
                                <div class="btn btn-default btn-sm"
                                    @click="RemoveOne(key)"
                                >-</div>
                            </td>
                            <td>${{item.total}}.00</td>
                            <td>{{item.take}}</td>
                            <td>
                                <button class="btn btn-danger btn-sm"
                                @click="removeItem(key)"
                                    >
                                    Quitar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <button class="btn btn-success btn-block" v-if="this.total > 0">Finalizar</button>
                <!-- END List of products -->
            </div>
            <!-- END Product Section -->
        </div>

    </div>

</template>

<script>

import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
 
Vue.use(VueSweetalert2);

export default {
    data(){
        return{
            person : {
                id:null,
                name:null,
                ap_pat:null,
                ap_mat:null,
                address:null,
                phone:null,
                no_notebook:null,
                no_registry:null
            },
            fullname:null,
            person_selected : false,
            person_card : 'bg-light',
            showInfo : false,
            product_id : null,
            product_results : [],
            product : {
                id:null,
                name:null,
                p_menudeo:null,
                stock:null,
                pices:null,
                take:null,
                note:null,
                total: null
            },
            not_found_message : '',
            added_products : [],
            total:0,
        }
    },
    methods:{

        SearchPersonByID(){
            axios.get(`/api/buyer/${this.person.id}`).then(res=>{              
                this.person = res.data;
                
                this.fullname = this.person.person.name+' '+ this.person.person.ap_pat+' '+ this.person.person.ap_mat
                this.showInfo = true;
                this.not_found_message = ''
            })
            .catch(error=>{
                this.showInfo = false;
                this.fullname = null;
                this.not_found_message = 'No pude encontrar algún cliente con esa información';              
            })
        },

        SelectBuyer(){
            if (this.person.id == null) {
                this.firstSelectOne('cliente')
                return false;
            }
            this.person_selected = !this.person_selected;  
            this.person_card = 'border-success'          
        },

        SearchProductByID(){
            if (this.product.id == null || this.product.id == "") {
                return false;
            }
            
            axios.get('/api/product/getById/'+this.product.id).then(res => {
                
                if (res.data.length == 0) {
                    this.not_found_message = "No pude encontrar algún producto con id: " + this.product.id;
                    return false;
                }
                this.product = res.data[0];
            })
            
        },

        SearchProductByName(){
            this.product_results = [];
                        
            if(this.product.name != null){
                this.product.id == null
                axios.get('/api/product/'+this.product.name)
                .then(response => {
                    let res = response.data;

                    for (let i = 0; i < res.length; i++) {
                        this.product_results.push(res[i])                        
                    }
                })
                .catch(error =>{
                    this.emptyCart();
                });
            }
            
        },

        price_item(){
            let price = this.product.p_menudeo * this.product.pices;
            this.product.total = price;
        },

        AddProduct(){

            // valida persona seleccionada
            if(!this.person_selected){
                Vue.swal({
                    title: 'al manos selecciona un cliente '
                });
                return false;
            }

            // valida producto seleccionado
            if (this.product.name == null) {
                this.firstSelectOne('producto')
                return false;
            }

            // evita productos repetidos
            if(this.validateCart(this.product)){
                this.emptyCart()
                this.not_found_message = "Puedes agregar más piezas directamente de los botones ('+' , '-') en lista :)"
                return false;
            }

            // valida las entradas del producto
            if (this.product.id != null &&
                this.product.name != null &&
                this.product.p_menudeo != null &&
                this.product.stock != null &&
                this.product.pices != null &&
                this.product.take != null &&
                this.product.total !=  null) {
                
                if (this.product.pices > this.product.stock) {
                    Vue.swal({
                        icon: 'warning',
                        title: 'Oops...',
                        text: `No cuentas con las piezas suficientes..`,
                    });
                    return false;
                }
                if (this.product.pices == 0) {
                    Vue.swal({
                        icon: 'warning',
                        title: 'Oops...',
                        text: `Coloca al menos una pieza para añadir ...`,
                    });
                    return false;
                }
                this.added_products.push(this.product);
                this.emptyCart()
                this.CalculateTotal()
            }
            else{
            Vue.swal({
                    icon: 'warning',
                    title: 'Oops...',
                    text: `Verifica los campos`,
                });
            }

        },

        AddOne(key){
            if (this.added_products[key].pices >= this.added_products[key].stock) {
                Vue.swal({
                    icon:'error',
                    title: 'Oops...',
                    text:'La cantidad requerida supera a la disponible ...'
                });
                return false;
            }
            this.added_products[key].pices++;
            this.CalculateNewPrice(key);
            this.CalculateTotal()
        },

        RemoveOne(key){
            if (this.added_products[key].pices <= 1) {
                Vue.swal({
                    icon:'error',
                    title: 'Oops...',
                    text:'No puedes tener 0 pz para agregar...'
                });
                return false;
            }
            this.added_products[key].pices--;
            this.CalculateNewPrice(key);
            this.CalculateTotal()
        },

        CalculateNewPrice(key){
            let product = this.added_products[key]
            return product.total = (product.pices * product.p_menudeo);
        },
        
        CalculateTotal(){
            this.total = 0;
            for (let i = 0; i < this.added_products.length; i++) {
                this.total += this.added_products[i].total;
            }
        },
        
        removeItem(index){
            Vue.swal({
            title: 'Eliminar este producto?',
            text: "El producto se removerá del carrito.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, removerlo!'
            })
            .then((result) => {
                if (result.value) {

                    this.added_products.splice(index, 1);
                    this.total = 0;

                    Vue.swal(
                    'Ok!',
                    'Producto fuera ... ',
                    'success'
                    )

                }
            })
            
        },

        validateCart(product){
            let res = false;
            for (let i = 0; i < this.added_products.length; i++) {
                if (this.added_products[i].id === product.id) {
                    res = true;
                }
            }
            return res;
        },

        emptyCart(){
            this.product = { id:null, name:null, p_menudeo:null, stock:null, pices:null, take:null, note:null, total: null }
        },

        store(){

        },

        firstSelectOne(entity){
            Vue.swal({
                    icon: 'warning',
                    title: 'Oops...',
                    text: `Primero selecciona algún ${entity} ...`,
            });
        }
        
    },
    computed:{
    }
}
</script>
