import { Component, OnInit } from '@angular/core';
import {usuarioService} from 'src/app/servicios/usuario.service';
import Swal from 'sweetalert2';


@Component({
  selector: 'app-usuario',
  templateUrl: './usuario.component.html',
  styleUrls: ['./usuario.component.css']
})
export class UsuarioComponent implements OnInit {
// variables globales 
verf = false;
usuarios: any;
user = {
usuario: "",
clave: "",
correo: "",
celular: "",
tipo_usuario: ""
};
//para validar
validusuario = true;
validclave = true;
validcorreo = true;
validcelular = true;
validtipo_usuario = true;



constructor(private suser: usuarioService) {}

ngOnInit(): void {
this.consulta();
this.limpiar();

  }
  // mostrar formulario
 mostrar(dato:any){
  switch(dato){
    case 0:
    this.verf = false;
    break;
    case 1:
      this.verf = true;
     break;
  
}
 }
//limpiar
limpiar(){
  this.user.usuario = "";
  this.user.clave = "";
  this.user.correo = "";
  this.user.celular = "";
  this.user.tipo_usuario = "";

}
// validar
validar(){
  if(this.user.usuario == ""){
  this.validusuario = false;
  }else{
    this.validusuario = true;
  }
  if(this.user.clave == ""){
    this.validclave = false;
    }else{
      this.validclave = true;
    }
    if(this.user.correo == ""){
  this.validcorreo = false;
  }else{
    this.validcorreo = true;
  }
  if(this.user.celular == ""){
    this.validcelular = false;
    }else{
      this.validcelular = true;
    }
    if(this.user.tipo_usuario == ""){
      this.validtipo_usuario = false;
      }else{
        this.validtipo_usuario = true;
      }
}
consulta(){
   this.suser.consultar().subscribe((result:any) => {
    this.usuarios = result;
   //console.log(this.usuarios);
   })
}
   ingresar(){
    //console.log(this.cat);
    this.validar();
    if(this.validusuario==true && this.validclave==true && this.validcorreo==true && this.validcelular==true && this.validtipo_usuario==true ){
    this.suser.insertar(this.user).subscribe((datos:any) => {
     if(datos['resultado']=='ok') {
    this.consulta();
     }
    });     
    this.mostrar(0);
    this.limpiar();
   }
 }
 pregunta(id: any, usuario: any){
 
    console.log("Entro con el id: " + id);
    Swal.fire({
    title: '¿Esta seguro de eliminar el usuario]'+ usuario + "?",
    text: "El proceso no podra ser revertido!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, Eliminar!'
  }).then((result) => {
    if (result.isConfirmed) {
      this.borrarusuario(id);
      Swal.fire(
        'Eliminado!',
        'El usuario ha sido eliminado.',
        'success'
      )
    }
  })
 }
 borrarusuario(id:any){
this.suser.eliminar(id).subscribe((datos:any) =>{
if(datos['resultado']=='ok'){
  this.consulta();
}
 });
}
}
