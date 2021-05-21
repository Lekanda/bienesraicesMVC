/// <reference types="cypress"/>

describe('Prueba de navegacion del Header y Footer', ()=>{
    it('Prueba Navegacion del Header', () => {
        // Ir a pagina principal
        cy.visit('/');
        // Comprobar que el enlace existe
        cy.get('[data-cy="navegacion-header"]').should('exist');
        cy.get('[data-cy="navegacion-header"]').find('a').should('have.length',5);
        cy.get('[data-cy="navegacion-header"]').find('a').should('not.have.length',4);

        //Revisar que los enlaces sean correctos.
        cy.get('[data-cy="navegacion-header"]').find('a').eq(0).invoke('attr','href').should('equal','/bienesraicesMVC/public/index.php/nosotros');
        cy.get('[data-cy="navegacion-header"]').find('a').eq(0).invoke('text').should('equal','Nosotros');

        cy.get('[data-cy="navegacion-header"]').find('a').eq(1).invoke('attr','href').should('equal','/bienesraicesMVC/public/index.php/propiedades');
        cy.get('[data-cy="navegacion-header"]').find('a').eq(1).invoke('text').should('equal','Propiedades');

        cy.get('[data-cy="navegacion-header"]').find('a').eq(2).invoke('attr','href').should('equal','/bienesraicesMVC/public/index.php/blog');
        cy.get('[data-cy="navegacion-header"]').find('a').eq(2).invoke('text').should('equal','Blog');

        cy.get('[data-cy="navegacion-header"]').find('a').eq(3).invoke('attr','href').should('equal','/bienesraicesMVC/public/index.php/contacto');
        cy.get('[data-cy="navegacion-header"]').find('a').eq(3).invoke('text').should('equal','Contacto');

        cy.get('[data-cy="navegacion-header"]').find('a').eq(4).invoke('attr','href').should('equal','/bienesraicesMVC/public/index.php/login');
        cy.get('[data-cy="navegacion-header"]').find('a').eq(4).invoke('text').should('equal','Login');
    });
    
    it('Prueba Navegacion del Footer', () => {
        cy.get('[data-cy="navegacion-footer"]').should('exist');
        cy.get('[data-cy="navegacion-footer"]').should('have.prop', 'class').should('equal', 'navegacion');
        cy.get('[data-cy="navegacion-footer"]').find('a').should('have.length',4);
        cy.get('[data-cy="navegacion-footer"]').find('a').should('not.have.length',5);


        cy.get('[data-cy="navegacion-footer"]').find('a').eq(0).invoke('attr','href').should('equal','/bienesraicesMVC/public/index.php/nosotros');
        cy.get('[data-cy="navegacion-footer"]').find('a').eq(0).invoke('text').should('equal','Nosotros');

        cy.get('[data-cy="navegacion-footer"]').find('a').eq(1).invoke('attr','href').should('equal','/bienesraicesMVC/public/index.php/propiedades');
        cy.get('[data-cy="navegacion-footer"]').find('a').eq(1).invoke('text').should('equal','Propiedades');

        cy.get('[data-cy="navegacion-footer"]').find('a').eq(2).invoke('attr','href').should('equal','/bienesraicesMVC/public/index.php/blog');
        cy.get('[data-cy="navegacion-footer"]').find('a').eq(2).invoke('text').should('equal','Blog');

        cy.get('[data-cy="navegacion-footer"]').find('a').eq(3).invoke('attr','href').should('equal','/bienesraicesMVC/public/index.php/contacto');
        cy.get('[data-cy="navegacion-footer"]').find('a').eq(3).invoke('text').should('equal','Contacto');

        cy.get('[data-cy="copyright"]').should('have.prop', 'class').should('equal', 'copyright');
    });
});