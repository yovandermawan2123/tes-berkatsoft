<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
               
  <button class="btn btn-success mb-2 mt-2" v-on:click="hide()">Tambah Produk</button>
<div v-if="show === true">
<!-- modal add -->

<form class="border border-1 px-3 py-3 rounded mb-2">
  <div class="mb-2">
    <label for="name" class="form-label">Nama Produk</label>
    <input type="text"  class="form-control" id="text" aria-describedby="text" v-model="addProduct.name ">   
  </div>
  <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label">Harga</label>
    <input type="number" class="form-control" id="harga" v-model="addProduct.price">
  </div>
  <div class="mb-3">
                    <label for="tipe" class="col-form-label">Ketersediaan</label>
                    <select class="form-select " v-model="addProduct.is_ready" name="type" aria-label="Default select example">
                      <option selected>-- Ketersediaan --</option>
                      <option value="1">Ready</option>
                      <option value="0">Not Ready</option>
                      
                    </select>
                  </div>
  <button type="submit" v-on:click="pemesanan()" class="btn btn-success btn-sm">Tambah</button>
</form>
</div>

<div v-else>

</div>

<!-- modal edit -->
<div v-if="showEdit === true">
<form class="border border-1 px-3 py-3 rounded mb-2">
  <div class="mb-2">
    <label for="name" class="form-label">Nama Produk</label>
    <input type="text"  class="form-control" id="text" aria-describedby="text" v-model="findProduct.name ">   
  </div>
  <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label">Harga</label>
    <input type="number" class="form-control" id="harga" v-model="findProduct.price">
  </div>
  <div class="mb-3">
                    <label for="tipe" class="col-form-label">Ketersediaan</label>
                    <select class="form-select " v-model="findProduct.is_ready" name="type" aria-label="Default select example">
                      <option selected>-- Ketersediaan --</option>
                      <option value="1">Ready</option>
                      <option value="0">Not Ready</option>
                      
                    </select>
                  </div>
  <button type="submit" v-on:click="updating()" class="btn btn-success btn-sm">Edit</button>
</form>
</div>


<div v-else>

</div>





                <div class="card">
                    <div class="card-header">Products</div>

                    <div class="card-body">
                       <div class="col" >
       
          

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Harga</th>
      <th scope="col">Ketersediaan</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  


    <tr v-for="(product, index) in products" :key="product.id" >
    
      <th scope="row">{{index +1}}</th>
    
      <td>{{ product.name }}</td>
      <td>{{ product.price }}</td>
      
       <td v-if="product.is_ready === 1"> Ready</td>
         <td v-else> Not Ready</td>
         
         <td><button type="submit" class="btn btn-sm btn-success float right" @click="update();findData(product.id)" > Update</button>
        <button type="submit" class="btn btn-sm btn-danger float right" @click="hapusProduct(product.id)"> Hapus</button></td>
 
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
                 products: [],
                   addProduct: {},

                findProduct: []
    
            };
         },

          methods: {
                 setProduct(data) {
                 this.products = data;
            },
            showProduct(data) {
                 this.findProduct = data;
            },
            hide(){
                if(this.show === false){
                        this.show = true;
                }else{
                    this.show = false;
                }
                
            },
            update(){
               if(this.show === false){
                        this.showEdit = true;
                }else{
                    this.showEdit = false;
                }
                
            },

             pemesanan(){

               console.log(this.addProduct);
    
  if (this.addProduct.price) {
     
     this.addProduct.id = this.$route.params.id;
       
       axios
      .post("/api/products/", this.addProduct)
      .then(() => {
      console.log('berhasil');
        
      })
      .catch((err) => console.log(err))
  } else {
     console.log('gagal');
  }     
   },

        updating(){

               console.log(this.findProduct);
    
  if (this.findProduct.price) {
     this.findProduct.name
     this.findProduct.id = this.findProduct.id;
       
       axios
      .put("/api/products/", this.findProduct)
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
        .delete("/api/products/"+ id)
        .then(() =>
          // handle success
          {
            console.log('success')
            

            //reload halaman
            axios
              .get("/api/products")
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
        .get("/api/products/" + id)
        .then(response =>
          // handle success
          this.showProduct(response.data.request)
       

        )
        .catch(error =>
          // handle error
          console.log("Gagal :", error)
        );
    },


          },
         
          mounted() {
            axios
      .get("/api/products/")
      .then(response =>
        // handle success
      this.setProduct(response.data.request)
      )
      .catch(error =>
        // handle error
        console.log("Gagal :", error)
      );
        }
    }
</script>
