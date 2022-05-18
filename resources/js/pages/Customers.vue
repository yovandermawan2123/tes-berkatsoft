<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
               
  <button class="btn btn-success mb-2 mt-2" v-on:click="hide()">Tambah Customer</button>
<div v-if="show === true">
<!-- modal add -->

<form class="border border-1 px-3 py-3 rounded mb-2">
  <div class="mb-2">
    <label for="name" class="form-label">Nama Customer</label>
    <input type="text"  class="form-control" id="text" aria-describedby="text" v-model="addCustomer.name ">   
  </div>
  <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label">alamat</label>
    <input type="text" class="form-control" id="harga" v-model="addCustomer.address">
  </div>

   <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label">No Telephone</label>
    <input type="number" class="form-control" id="harga" v-model="addCustomer.no_telephone">
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
    <label for="name" class="form-label">Nama Customer</label>
    <input type="text"  class="form-control" id="text" aria-describedby="text" v-model="findCustomer.name ">   
  </div>
  <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label">alamat</label>
    <input type="text" class="form-control" id="harga" v-model="findCustomer.address">
  </div>

   <div class="mb-2">
    <label for="exampleInputPassword1" class="form-label">No Telephone</label>
    <input type="number" class="form-control" id="harga" v-model="findCustomer.no_telephone">
  </div>
  

  <button type="submit" v-on:click="updating()" class="btn btn-success btn-sm">Edit</button>
</form>
</div>


<div v-else>

</div>





                <div class="card">
                    <div class="card-header">Customers</div>

                    <div class="card-body">
                       <div class="col" >
       
          

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">No Telephone</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>

    <tr v-for="(customer, index) in customers" :key="customer.id" >
    
      <th scope="row">{{index +1}}</th>
    
      <td>{{ customer.name }}</td>
      <td>{{ customer.address }}</td>
      
       <td>+{{ customer.no_telephone }}</td>
     
         
         <td><button type="submit" class="btn btn-sm btn-success float right" @click="update();findData(customer.id)" > Update</button>
        <button type="submit" class="btn btn-sm btn-danger float right" @click="hapusProduct(customer.id)"> Hapus</button></td>
 
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
                 customers: [],
                   addCustomer: {},

                findCustomer: []
    
            };
         },

          methods: {
                 setProduct(data) {
                 this.customers = data;
            },
            showCustomer(data) {
                 this.findCustomer = data;
            },
            hide(){
                if(this.show === false){
                        this.show = true;
                }else{
                    this.show = false;
                }
                
            },
            update(){
               if(this.showEdit === false){
                        this.showEdit = true;
                }else{
                    this.showEdit = false;
                }
                
            },

             pemesanan(){

               console.log(this.addCustomer);
    
  if (this.addCustomer.address) {
     
      this.addCustomer.name = this.addCustomer.name;
        this.addCustomer.no_telephone = this.addCustomer.no_telephone
       
       axios
      .post("/api/customers/", this.addCustomer)
      .then(() => {
      console.log('berhasil');
        
      })
      .catch((err) => console.log(err))
  } else {
     console.log('gagal');
  }     
   },

        updating(){

               console.log(this.findCustomer);
    
  if (this.findCustomer.address) {
     this.findCustomer.name
        this.findCustomer.no_telephone
     this.findCustomer.id = this.findCustomer.id;
       
       axios
      .put("/api/customers", this.findCustomer)
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
        .delete("/api/customers/"+ id)
        .then(() =>
          // handle success
          {
            console.log('success')
            

            //reload halaman
            axios
              .get("/api/customers")
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
        .get("/api/customers/" + id)
        .then(response =>
          // handle success
          this.showCustomer(response.data.request)
       

        )
        .catch(error =>
          // handle error
          console.log("Gagal :", error)
        );
    },


          },
         
          mounted() {
            axios
      .get("/api/customers/")
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
