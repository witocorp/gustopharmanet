var url = new URL(window.location.href);
var idParam = url.searchParams.get("id");
var app = new Vue({
   el: '#app',
   data: {
      datos: [],
	  showIndex: null,
	  active:false,
	  search:'',
	  marca:'',
	  file:'',
   },
   created: function(){
         this.$http.get(url.pathname+'?r=marcas%2Fjpson&id='+idParam).then(function(response){
         this.datos = response.body;
      }, function(){
         alert('Error!');
      });
   },
   computed:{
	   searchdatos: function(){
		   return this.datos.filter((responder)=>{
			   return responder.marca.toLowerCase().match(this.search.toLowerCase())
		   }
		   );
	   }
   }
});