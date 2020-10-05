var url = new URL(window.location.href);
var idPais = url.searchParams.get("id");
var app = new Vue({
   el: '#app',
   data: {
      personajes: [],
	  showIndex: null,
	  active:false,
	  search:'',
	  marca:'',
	  file:'',
   },
   created: function(){
         this.$http.get('/pharma/backend/web/index.php?r=marcas%2Fjpson&id='+idPais).then(function(response){
         this.personajes = response.body;
      }, function(){
         alert('Error!');
      });
   },
   computed:{
	   searchpersonajes: function(){
		   return this.personajes.filter((responder)=>{
			   return responder.marca.toLowerCase().match(this.search.toLowerCase())
		   }
		   );
	   }
   },
   methods: {
		deleteM: function (urlD, event) {
			event.preventDefault();
			this.$http.get(urlD).then(function(response){
				this.personajes = response.body;
			}, function(){
				alert('Error!');
			});
		},
		createM: function (urlD,pais, event) {
			event.preventDefault();
			let formData = new FormData();
			formData.append('file', this.file);
			console.log('https://serversideup.net/uploading-files-vuejs-axios/');
		},
		handleFileUpload(){
				this.file = this.$refs.file.files[0];
		}
	}
});