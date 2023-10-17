import { Component } from '@angular/core';
import { UsuarioService } from 'src/app/servicios/administradores.service';

@Component({
  selector: 'app-usuario',
  templateUrl: './usuario.component.html',
  styleUrls: ['./usuario.component.css']
})
export class UsuarioComponent {
// variables globales 
verf = false;
usuario: any;
constructor(private suser: UsuarioService){}

  ngOnInit(): void {
this.consulta();

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
consulta(){
   this.suser.consultar().subscribe((result: any) => {
    this.usuario = result;
   // console.log(this.usuario);
   })

}
}
