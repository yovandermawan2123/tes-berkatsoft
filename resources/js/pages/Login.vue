<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
               



                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                       <div class="col" >
       
<form class="border border-1 px-3 py-3 rounded mb-2">

                   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="addUser.email">
 
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" v-model="addUser.password">
  </div>
  <button type="button" @click="login()" class="btn btn-success btn-sm">Login</button>
<div><router-link to="/register">Havent registered yet? Register</router-link></div>
</form>
                

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
                   addUser: {},

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
         
         

             login(){

            //    console.log(this.addUser);
    
  if (this.addUser.email) {
     
     this.addUser.password = this.addUser.password;
       
       axios
      .post("/api/login/", this.addUser)
      .then(() => {
    this.$router.push("/products").catch(()=>{});
      })
    //   .catch((err) => console.log(err))
  } else {
     console.log('gagal');
  }     
   },

       

  



          },
         
       
    }
</script>
