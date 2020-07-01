import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { RemoverPageRoutingModule } from './remover-routing.module';

import { RemoverPage } from './remover.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RemoverPageRoutingModule
  ],
  declarations: [RemoverPage]
})
export class RemoverPageModule {}
