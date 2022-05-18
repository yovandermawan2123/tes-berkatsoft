<template>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
               



                <div class="card">
                    <div class="card-header">Register</div>

                    <div class="card-body">
                       <div class="col" >
       
<form class="border border-1 px-3 py-3 rounded mb-2">
    
    <div class="mb-3">
<label for="exampleInputEmail1" class="form-label">Name</label>
<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="addUser.name">

</div>

    <div class="mb-3">
<label for="exampleInputEmail1" class="form-label">Email address</label>
<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="addUser.email">

</div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" v-model="addUser.password">
  </div>
  <button type="submit" v-on:click="register()" class="btn btn-success btn-sm">Register</button>
  <div><router-link  to="/">Have an account? Login</router-link></div>
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
         
         

            register(){

               console.log(this.addUser);
    
  if (this.addUser.email) {
         this.addUser.name = this.addUser.name;
     this.addUser.password = this.addUser.password;
       
       axios
      .post("/api/register/", this.addUser)
      .then(() => {
        this.$router.push("/").catch(()=>{});
      })
      
  } else {
     console.log('gagal');
  }     
   },

       

  



          },
         
       
    }
</script>
