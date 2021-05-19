
// describe crea el conjunto de pruebas 
// Un it para cada prueba
describe('Envia un hola mundo', () =>{
    it('Hola mundo en Cypress', () => { 
        cy.visit('http://localhost:3000/');
    }); 

    it('Prueba 2', () => { 
        console.log('Hola 2');
    }); 


});