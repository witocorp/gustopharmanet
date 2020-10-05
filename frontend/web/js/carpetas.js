var url = new URL(window.location.href);
var idParam = url.searchParams.get("id");
var appPc = new Vue({
   el: '#appPc',
   data: {
      datos: [],
	  showIndex: null,
	  active:false,
	  search:'',
   },
   created: function(){
         this.$http.get(url.pathname+'?r=carpetas%2Fjpson&id='+idParam).then(function(response){
         this.datos = response.body;
      }, function(){
         alert('Error!');
      });
   },
   computed:{
	   searchdatos: function(){
		   return this.datos.filter((responder)=>{
			   return responder.nombre.toLowerCase().match(this.search.toLowerCase())
		   }
		   );
	   }
   }
});
