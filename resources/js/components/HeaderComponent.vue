<template>
 <header>
  <div class="wrapper">
   <div class="panel_header_top">
    <div class="logotype_block">
     <img v-bind:src="'/storage/' + this.logo" alt="error">
    </div>
    <div class="line"></div>
    <div class="email_block">
     <a href="#" v-text="email"></a>
    </div>
   </div>
   <button class="btn" v-on:click="$emit('modal')">Заказать звонок</button>
  </div>
 </header>
</template>

<script>
 export default {
  mounted() {
   let url = '/api/getPage';
   axios.get(url)
    .then((data) => {
     console.log(data.data[0].values);
     let dataPage = data.data;
     this.email = dataPage[1].values;
     this.logo = dataPage[2].values; 
    });
  },

  data() {
   return {
    email: '',
    logo: '',
    title: ''
   }
  }
 }
</script>
