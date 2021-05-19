/// <references types="cypress"/>
// Da mejor autocompletado
describe('Carga la pagina principal', () =>{
    it('Prueba el Header de INDEX', () => {
        cy.visit('/');
        cy.get('[data-cy="heading-sitio"]').should('exist');// Comprueba sí existe el atributo
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal', 'Venta de Casas De Lujo y Apartamentos Exclusivos');// Comprueba que sea texto y que el textop sea igual a 'Venta de......'
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('not.equal', 'Bienes Raices');// Comprueba que sea texto y que el texto NO  sea igual a 'Bienes Raices'
    });
    
});

/** 
 
 * [data-cy="heading-sitio"]
 - Por norma se pone en la etiqueta HTML de la vista, en este caso en un h1 del layout.php se ha puesto este atributo(data-cy="heading-sitio"). De esta forma lo enlazamos con el Test.

 
 * 

***/