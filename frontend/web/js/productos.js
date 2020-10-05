var url = new URL(window.location.href);
var idParam = url.searchParams.get("id");
var appPr = new Vue({
   el: '#appPr',
   data: {
      datos: [],
	  showIndex: null,
	  active:false,
	  search:'',
   },
   created: function(){
         this.$http.get(url.pathname+'?r=productos%2Fjpson&id='+idParam).then(function(response){
         this.datos = response.body;
      }, function(){
         alert('Error!');
      });
   },
   computed:{
	   searchdatos: function(){
		   return this.datos.filter((responder)=>{
			   return responder.producto.toLowerCase().match(this.search.toLowerCase())
		   }
		   );
	   }
   }
});