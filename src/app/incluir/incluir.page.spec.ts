import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { IncluirPage } from './incluir.page';

describe('IncluirPage', () => {
  let component: IncluirPage;
  let fixture: ComponentFixture<IncluirPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ IncluirPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(IncluirPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
