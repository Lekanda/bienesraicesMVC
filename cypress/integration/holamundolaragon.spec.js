// describe crea el conjunto de pruebas 
// Un it para cada prueba
describe('TESTs de Bienes Raices Laragon', () =>{
    it('Index principal', () => { 
        cy.visit('http://localhost/bienesraicesMVC/public/index.php');
    }); 

    it('Nosotros', () => { 
        cy.visit('http://localhost/bienesraicesMVC/public/index.php/nosotros');
    });
    it('Anuncios', () => { 
        cy.visit('http://localhost/bienesraicesMVC/public/index.php/propiedades');
    }); 
});