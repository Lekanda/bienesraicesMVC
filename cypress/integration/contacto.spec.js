/// <reference types="cypress"/>

describe('Prueba el Formulario de contacto', ()=>{
    it('Prueba la pagina de contacto y el envio de Emails', () => {
        cy.visit('/contacto').should('exist');

        cy.get('[data-cy="heading-contacto"]').should('exist');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('equal', 'Contacto');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('not.equal', 'Formulario de Contacto');

        cy.get('[data-cy="heading-formulario"]').should('exist');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('equal', 'Llene el formulario de Contacto');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('not.equal', 'Formulario');

        cy.get('[data-cy="formulario-contacto"]').should('exist');
    });

    it('Llena los campos del Formulario y Envia',() => {

        cy.get('[data-cy="input-nombre"]').type('Andres');
        cy.get('[data-cy="input-mensaje"]').type('Este es un test de Cypress para probar el completado de campos en el formulario Contacto del proyecto Bienes Raices');
        cy.get('[data-cy="input-opciones"]').select('Compra');
        cy.get('[data-cy="input-presupuesto"]').type('120000');
        cy.get('[data-cy="forma-contacto"]').eq(1).check();// selecciona Email
        cy.get('[data-cy="input-email"]').type('a@a.com');

        cy.wait(1500);

        cy.get('[data-cy="forma-contacto"]').eq(0).check();// selecciona Telefono
        cy.get('[data-cy="input-telefono"]').type('948562587');
        cy.get('[data-cy="input-fecha"]').type('2021-08-06');
        cy.get('[data-cy="input-hora"]').type('16:30');

        cy.get('[data-cy="formulario-contacto"]').submit();
        cy.get('[data-cy="alerta-envio-formulario"]').should('exist');
        cy.get('[data-cy="alerta-envio-formulario"]').invoke('text').should('equal','Mensaje Enviado Correctamente');
        // cy.get('[data-cy="alerta-envio-formulario"]').should('have.class', 'alerta exito');
        cy.get('[data-cy="alerta-envio-formulario"]').should('have.class', 'alerta').and('have.class','exito').and('not.have.class','error');

    });
});