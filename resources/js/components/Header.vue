<template>
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">BerkatSoft</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <router-link class="nav-link active" aria-current="page" to="/products">Product</router-link>
        <router-link class="nav-link" to="/customers">Customer</router-link>
        <router-link class="nav-link" to="/salesorders">Sales Order</router-link>
       
      </div>
    </div>
  </div>
</nav>
</div>





 
</template>

<script>
import axios from "axios";

export default {
  name: "Navbar",
  data() {
    return {
      jumlahPemesanan: []
    }
  },
  props: ['updateKeranjang'],
  methods: {
    setJumlah(data) {
      this.jumlahPemesanan = data
    }
  },
  mounted() {
     axios
      .get("http://localhost:3000/keranjang")
      .then((response) =>
        // handle success
      this.setJumlah(response.data)
)
      .catch((error) =>
        // handle error
        console.log("Gagal :", error))
  },
};
</script>

<style>

.router-link-exact-active{
  font-weight: bold;
}
</style>