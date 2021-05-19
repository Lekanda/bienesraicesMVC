/// <references types="cypress"/>
// Da mejor autocompletado
describe('Carga la pagina principal', () =>{
    it('Prueba el header de la pagina principal', () => {
        cy.visit('/');
        cy.get('[data-cy="heading-sitio"]')
    });
});

/** 
 
 * [data-cy="heading-sitio"]
 - Por norma se pone en la etiqueta HTML de la vista, en este caso en un h1 del layout.php se ha puesto este atributo(data-cy="heading-sitio"). De esta forma lo enlazamos con el Test.

 
 * 

***/