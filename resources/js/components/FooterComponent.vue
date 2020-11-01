<template>
 <footer class="wrapper">
  <h3 class="footer_zag">footer text:</h3>
  <div class="footer_text" v-html="footer">
   
  </div>
 </footer>
</template>

<script>
 export default {
   mounted() {
    console.log('slider created');
    let url = '/api/getPage';
    axios.get('/api/getPage')
     .then((data) => {
      this.footer = data.data[3].values
     });
   },

   data() {
   	return {
   	 footer: ''
   	}
   }
  }

</script>