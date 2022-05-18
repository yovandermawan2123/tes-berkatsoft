<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
               
  <button class="btn btn-success mb-2 mt-2" v-on:click="hide()">Tambah Customer</button>
<div v-if="show === true">
<!-- modal add -->

<form class="border border-1 px-3 py-3 rounded mb-2" >
  <div class="mb-2">
    <label for="name" class="form-label">No Sales Order</label>
    <input type="text"  class="form-control" id="text" aria-describedby="text" v-model="addSO.no_salesorder ">   
  </div>

 <div class="mb-3">
                    <label for="tipe" class="col-form-label">Customer</label>
                    <select class="form-select " v-model="addSO.id_customer" name="type" aria-label="Default select example"  >
                      <option selected>-- Pilih Customer --</option>
                      <option v-for="customer in customers" :key="customer.id" :value="customer.id">{{ customer.name }}</option>
                     
                      
                    </select>
                  </div>

   <div class="mb-3">
                    <label for="tipe" class="col-form-label">Product</label>
                    <select class="form-select" @change="findProduct(addSO.id_product)" name="type" v-model="addSO.id_product" aria-label="Default select example"  >
                      <option selected>-- Pilih Product --</option>
                      <option v-for="product in products" :key="product.id" :value="product.id">{{ product.name }}</option>
                     
                      
                    </select>
                  </div>
                  

     <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label">Harga</label>
    <input type="number" class="form-control" id="harga" v-model="findP.price" disabled>
  </div>

     <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label">Quantity</label>
    <input type="number" class="form-control" id="harga" v-model="addSO.quantity">
  </div>

    <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label">Subtotal</label>
    <input type="number" class="form-control" id="harga"  :value="addSO.subtotal = findP.price * addSO.quantity" disabled>
  </div>
  
  <button type="button" v-on:click="pemesanan()" class="btn btn-success btn-sm">Tambah</button>
</form>
</div>

<div v-else>

</div>

<!-- modal edit -->
<div v-if="showEdit === true">
<form class="border border-1 px-3 py-3 rounded mb-2">
  <div class="mb-2">
    <label for="name" class="form-label">No Sales Order</label>
    <input type="text"  class="form-control" id="text" aria-describedby="text" v-model="findSO.no_salesorder ">   
  </div>

 <div class="mb-3">
                    <label for="tipe" class="col-form-label">Customer</label>
                    <select class="form-select " v-model="findSO.id_customer" name="type" aria-label="Default select example"  >
                      <option selected>-- Pilih Customer --</option>
                      <option v-for="customer in customers" :key="customer.id" :value="customer.id">{{ customer.name }}</option>
                     
                      
                    </select>
                  </div>

   <div class="mb-3">
                    <label for="tipe" class="col-form-label">Product</label>
                    <select class="form-select" @change="findProduct(findSO.id_product)" name="type" v-model="findSO.id_product" aria-label="Default select example"  >
                      <option selected>-- Pilih Product --</option>
                      <option v-for="product in products" :key="product.id" :value="product.id">{{ product.name }}</option>
                     
                      
                    </select>
                  </div>
                  

     <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label">Harga</label>
    <input type="number" class="form-control" id="harga" v-model="findP.price" disabled>
  </div>

     <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label">Quantity</label>
    <input type="number" class="form-control" id="harga" v-model="findSO.quantity">
  </div>

    <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label">Subtotal</label>
    <input type="number" class="form-control" id="harga"  :value="findSO.subtotal = findP.price * findSO.quantity" disabled>
  </div>

  <button type="submit" v-on:click="updating()" class="btn btn-success btn-sm">Edit</button>
</form>
</div>


<div v-else>

</div>





                <div class="card">
                    <div class="card-header">Sales Order</div>

                    <div class="card-body">
                       <div class="col" >
       
          

<table class="table">
  <thead>
    <tr>
      <th>No</th>
      <th >ID</th>
      <th >Customer</th>
      <th >Product</th>
       <th >Quantity</th>
       <th >Harga</th>
        <th >Sub Total</th>
      <th >Aksi</th>
    </tr>
  </thead>
  <tbody>

    <tr v-for="(salesorder, index) in salesorders" :key="salesorder.id" >
    
      <th scope="row">{{index +1}}</th>
    
      <td>{{ salesorder.no_salesorder }}</td>
      <td>{{ salesorder.customer.name }}</td>
       <td>{{ salesorder.product.name }}</td>
       <td>{{ salesorder.quantity }}</td>
         <td>{{ salesorder.product.price }}</td>
       <td>{{ salesorder.subtotal }}</td>
     
         
         <td><button type="submit" class="btn btn-sm btn-success float right" @click="update();findData(salesorder.id)" ><small>Update</small></button>
        <button type="submit" class="btn btn-sm btn-danger float right" @click="hapusProduct(salesorder.id)"><small>Delete</small></button></td>
 
    </tr>

   
  </tbody>
</table>
                

                            </div>
                    
                    
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";


    export default {


          data() {
          
            return {
                show: false,
                showEdit: false,
                 salesorders: [],
                   products: [],
                   customers: [],
                   addSO: {},
                   getPrices: [],

                findSO: [],
                     findP: []
    
            };
         },

          methods: {
                 setProduct(data) {
                 this.salesorders = data;
            },

              makeProduct(data) {
                 this.products = data;
            },
              makeCustomer(data) {
                 this.customers = data;
            },
            showSalesorder(data) {
                 this.findSO = data;
            },
            showProduct(data) {
                 this.findP = data;
            },
            hide(){
                if(this.show === false){
                        this.show = true;
                }else{
                    this.show = false;
                }
                
                
            },

            getPrice(data){
                    this.getPrices = data
                },
            update(){
               if(this.showEdit === false){
                        this.showEdit = true;
                }else{
                    this.showEdit = false;
                }
                
            },

             pemesanan(){

               console.log(this.addSO);
    
  if (this.addSO.no_salesorder) {
     
      this.addSO.id_customer = this.addSO.id_customer;
      this.addSO.id_product = this.addSO.id_product
      this.addSO.quantity = this.addSO.quantity;
      this.addSO.subtotal = this.addSO.subtotal
       
       axios
      .post("/api/salesorders/", this.addSO)
      .then(() => {
      console.log('berhasil');
        
      })
      .catch((err) => console.log(err))
  } else {
     console.log('gagal');
  }     
   },

        updating(){

               console.log(this.findSO);
    
  if (this.findSO.no_salesorder) {
     this.findSO.id_customer = this.findSO.id_customer;
      this.findSO.id_product = this.findSO.id_product
      this.findSO.quantity = this.findSO.quantity;
      this.findSO.subtotal = this.findSO.subtotal
       axios
      .put("/api/salesorders", this.findSO)
      .then(() => {
      console.log('berhasil');
        
      })
      .catch((err) => console.log(err))
  } else {
     console.log('gagal');
  }     
   },

  hapusProduct(id) {
      axios
        .delete("/api/salesorders/"+ id)
        .then(() =>
          // handle success
          {
            console.log('success')
            

            //reload halaman
            axios
              .get("/api/salesorders")
              .then(response =>
                // handle success
                this.setProduct(response.data.request)
              )
              .catch(error =>
                // handle error
                console.log("Gagal :", error)
              );
          }
        )
        .catch(error =>
          // handle error
          console.log("Gagal :", error)
        );
    },

    findData(id) {
       axios
        .get("/api/salesorders/" + id)
        .then(response =>
          // handle success
          this.showSalesorder(response.data.request),
        
       

        )
        .catch(error =>
          // handle error
          console.log("Gagal :", error)
        );
    },

  findProduct(id) {
       axios
        .get("/api/products/" + id)
        .then(response =>
          // handle success
         this.showProduct(response.data.request),
        
       

        )
        .catch(error =>
          // handle error
          console.log("Gagal :", error)
        );
    },

          },
         
          mounted() {
            axios
      .get("/api/salesorders/")
      .then(response =>
        // handle success
     this.setProduct(response.data.request)
      )
      .catch(error =>
        // handle error
        console.log("Gagal :", error)
      );

               axios
      .get("/api/customers/")
      .then(response =>
        // handle success
     this.makeCustomer(response.data.request)
      )
      .catch(error =>
        // handle error
        console.log("Gagal :", error)
      );

               axios
      .get("/api/products/")
      .then(response =>
        // handle success
     this.makeProduct(response.data.request)
      )
      .catch(error =>
        // handle error
        console.log("Gagal :", error)
      );
        }
    }
</script>

