/// <reference types="cypress"/>
// Da mejor autocompletado de Cypress en V.Studio
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

        // cy.wait(1000); // Espera un segundo
        cy.go('back'); // Retorna a la pagina de Index
    });

    it('Prueba el routing del enlace hacia VER TODAS', () => {
        cy.get('[data-cy="todas-propiedades"]').should('exist');
        cy.get('[data-cy="todas-propiedades"]').should('have.class', 'boton-verde');
        cy.get('[data-cy="todas-propiedades"]').invoke('text').should('equal','Ver Todas');
        cy.get('[data-cy="todas-propiedades"]').invoke('attr', 'href').should('equal','/propiedades');
        
        cy.get('[data-cy="todas-propiedades"]').click();
        cy.get('[data-cy="heading-propiedades"]').invoke('text').should('equal','Casas y Fincas en Venta');
        
        // cy.wait(1000);
        cy.go('back');
        
    });
    
    it('Prueba el bloque de Contactanos hacia Contacto', () => {
        cy.get('[data-cy="imagen-contacto"]').should('exist');
        cy.get('[data-cy="imagen-contacto"]').find('h2').invoke('text').should('equal', 'Encuentra la casa de tus sueños');
        cy.get('[data-cy="imagen-contacto"]').find('p').invoke('text').should('equal', 'Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad');
        
        cy.get('[data-cy="imagen-contacto"]').find('a').invoke('attr','href')
            .then(href => {
                cy.visit(href)
            });// Va a formulario contacto
            
        cy.get('[data-cy="heading-contacto"]').should('exist');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('equal', 'Contacto');

        // cy.wait(1000);
        cy.visit('');// Visit por que hemos entrado en la pagina contacto con .then. Si no seria go
    });

    it('Prueba los Testimoniales y el Blog', () => {
        cy.get('[data-cy="blog"]').should('exist');
        cy.get('[data-cy="blog"]').find('h3').invoke('text').should('equal', 'Nuestro Blog');
        cy.get('[data-cy="blog"]').find('img').should('have.length', 2);

        cy.get('[data-cy="testimoniales"]').should('exist');
        cy.get('[data-cy="testimoniales"]').find('h3').invoke('text').should('equal', 'Opiniones');
        cy.get('[data-cy="testimoniales"]').find('h3').invoke('text').should('not.equal', 'Mis Opiniones');

    });
});

/*

 * [data-cy="heading-sitio"]
 - Por norma se pone en la etiqueta HTML de la vista, en este caso en un h1 del layout.php se ha puesto este atributo(data-cy="heading-sitio"). De esta forma lo enlazamos con el Test.

*/