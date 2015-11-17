function validar(){
	if((document.formulario_form.aula.value!="")&& (document.formulario_form.recursos.value!="")){
		return true;
	} else {
		alert("Selecciona una opcion del select");
		return false;
	}
}
