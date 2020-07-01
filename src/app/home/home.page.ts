import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage implements OnInit {
  contatos = [];
  api = "http://localhost/consulta.php";
  pesq="";

  constructor( private http:HttpClient ) {}

  ngOnInit() {
    this.lerContatos();
  };

  lerContatos() {
    this.http.get<any[]>(this.api+"?pesq="+this.pesq).subscribe(dados => {
        this.contatos = dados;
      });
  };
}
