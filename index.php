<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Ejemplo de VUE.JS </title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css" />
</head>
<body>
	<div class="container">		
		<form>
			<h1> Cargar Serie </h1>
			<hr />
			<div id="app">
				<div class="row">				
					<div class="span2">
						<label> Nombre: </label>
					</div>
					<div class="span4">
						<input type="text" v-model="nombre" /> </label>
					</div>
					<div class="span2">
						<label> Creador: </label>
					</div>
					<div class="span4">
						<input type="text" v-model="creador" /> </label>
					</div>
				</div>
				<div class="row">				
					<div class="span2">
						<label> Nombre del personaje: </label>
					</div>
					<div class="span4">
						<input type="text" v-model="personaje_temp" /> </label>
					</div>
					<div class="span6">
						<button type="button" class="btn btn-primary" v-on:click="agregarPersonaje()"> Agregar personaje </button>
					</div>
				</div>
				<hr />
				<h2 v-if="nombre != '' && creador != ''"> {{ nombre }} / {{ creador }} </h2>
				<div v-if="personajes.length > 0">					
					<ul>
						<li v-for="p in personajes">
							<input type="checkbox" v-model="p.seleccionado" /> {{ p.nombre }}
						</li>
					</ul>
					<a href="javascript:void(0);" class="text text-error" v-on:click="eliminarPersonajes()"> Eliminar Personajes </a>
				</div>				
			</div>
		</form>
	</div>
	<script type="text/javascript" src="js/vue.js"></script>
	<script type="text/javascript">
		var app = new Vue({
			el: '#app',
			data: {
				nombre: '',
				creador: '',
				personaje_temp: '',
				personajes: []
			},
			methods: {
				agregarPersonaje: function(){
					this.personajes.push({
						seleccionado: false,
						nombre: this.personaje_temp
					});
					this.personaje_temp = '';
				},
				eliminarPersonajes: function(){
					var personajes_act = [];
					for(var i = 0; i < this.personajes.length; i++){
						if(!this.personajes[i].seleccionado)
							personajes_act.push(this.personajes[i]);
					}
					this.personajes = personajes_act;
				}
			}
		});
	</script>
</body>
</html>