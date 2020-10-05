var url = new URL(window.location.href);
var idParam = url.searchParams.get("id");

var appPa = new Vue({
   el: '#appPa',
   data: {
      datos: [],
	  showIndex: null,
	  active:false,
	  search:'',
   },
   created: function(){
         this.$http.get(url.pathname+'?r=archivos%2Fjpson&id='+idParam).then(function(response){
         this.datos = response.body;
         for (indice in response.body) {
            var strSpl = response.body[indice]['url'].split(".");
            if(strSpl[1]=='PDF' || strSpl[1]=='pdf' ){
               response.body[indice]['extension']="far fa-file-pdf";
            }
            else if(strSpl[1]=='JPG' || strSpl[1]=='JPGE' || strSpl[1]=='PNG' || strSpl[1]=='GIF' || strSpl[1]=='PSD' || strSpl[1]=='AI' 
               || strSpl[1]=='jpg' || strSpl[1]=='jpge' || strSpl[1]=='png' || strSpl[1]=='gif' || strSpl[1]=='psd' || strSpl[1]=='ai'){
               response.body[indice]['extension']="far fa-file-image";
            }
            else if(strSpl[1]=='MP4' || strSpl[1]=='mp4' ){
               response.body[indice]['extension']="far fa-file-video";
            }
            else{
               response.body[indice]['extension']="fas fa-file";
            }
         }
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
