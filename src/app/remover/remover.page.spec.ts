import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { RemoverPage } from './remover.page';

describe('RemoverPage', () => {
  let component: RemoverPage;
  let fixture: ComponentFixture<RemoverPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ RemoverPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(RemoverPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
