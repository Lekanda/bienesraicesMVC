
// describe crea el conjunto de pruebas 
// Un it para cada prueba
describe('TESTs Bienes Raices', () =>{
    it('Index principal', () => { 
        cy.visit('/');
    }); 
    it('Nosotros', () => { 
        cy.visit('/nosotros');
    });
    it('Anuncios', () => { 
        cy.visit('/propiedades');
    });
    it('Blog', () => { 
        cy.visit('/blog');
    });
    it('Contacto', () => { 
        cy.visit('/contacto');
    });
    it('Login', () => { 
        cy.visit('/login');
    });
    


});