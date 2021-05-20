/// <references types="cypress"/>
// Da mejor autocompletado
describe('Carga la pagina principal INDEX', () =>{
    it('Prueba el Header de INDEX', () => {
        cy.visit('/');
        cy.get('[data-cy="heading-sitio"]').should('exist');// Comprueba sí existe el atributo
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal', 'Venta de Casas De Lujo y Apartamentos Exclusivos');// Comprueba que sea texto y que el textop sea igual a 'Venta de......'
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('not.equal', 'Bienes Raices');// Comprueba que sea texto y que el texto NO  sea igual a 'Bienes Raices'
    });
    it('Prueba el Header de Iconos-Nosotros en INDEX', () => {
        cy.get('[data-cy="heading-nosotros"]').should('exist');
        cy.get('[data-cy="heading-nosotros"]').invoke('text').should('equal','Más Sobre Nosotros');
        cy.get('[data-cy="heading-nosotros"]').should('have.prop', 'tagName').should('equal', 'H2');

        // selecciona los Iconos.
        cy.get('[data-cy="iconos-nosotros"]').should('exist');
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('have.length',3);
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('not.have.length',4);

    });
    it('Prueba el Header de Propiedades en INDEX', () => {
        // Debe haber 3 propiedades
        cy.get('[data-cy="anuncio"]').should('have.length',3);
        cy.get('[data-cy="anuncio"]').should('not.have.length',5);

        // Probar el enlace de la propiedad
        cy.get('[data-cy="enlace-propiedad"]').should('have.class', 'boton-amarillo-block');

        // Texto de boton Ver Propiedad
        cy.get('[data-cy="enlace-propiedad"]').first().invoke('text').should('equal','Ver Propiedad');

        // probar el click en el enlace de una propiedad
        cy.get('[data-cy="enlace-propiedad"]').first().click();// Click a Propiedad
        cy.get('[data-cy="titulo-propiedad"]').should('exist'); // Titulo de Propiedad en propiedad.php

        cy.wait(1000); // Espera un segundo
        cy.go('back'); // Retorna a la pagina de Index





        // cy.get('[data-cy="anuncio"]').should('exist');
        // cy.get('[data-cy="anuncio"]').invoke('text').should('equal','Casas y Fincas en Venta');
        // cy.get('[data-cy="anuncio"]').should('have.prop', 'tagName').should('equal', 'H2');

        // // selecciona los Iconos.
        // cy.get('[data-cy="anuncio-propiedades"]').should('exist');
        // cy.get('[data-cy="anuncio-propiedades"]').find('.icono').should('have.length',3);
        // cy.get('[data-cy="iconos-propiedades"]').find('.icono').should('not.have.length',4);
    });
});

/*

 * [data-cy="heading-sitio"]
 - Por norma se pone en la etiqueta HTML de la vista, en este caso en un h1 del layout.php se ha puesto este atributo(data-cy="heading-sitio"). De esta forma lo enlazamos con el Test.

*/