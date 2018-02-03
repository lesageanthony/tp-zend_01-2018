var Nightmare = require('nightmare'),
    nightmare = Nightmare({
        show: true
    });

nightmare
//load a url
    .goto('http://localhost:8080/meetup/')
    .wait('.container')
    .wait(2000)
    .click('#create-button')
    .wait('#meetup')
    .type("input[name='title']", "meetup1")
    .type("textarea[name='description']", "short description")
    .type("input[name='begin']", "01/01/2018")
    .type("input[name='end']", "02/01/2018")
    .click("input[name='add']")
    .wait(2000)
    .end()
    //.then(function(result) {
    //    console.log(result);
    //})
    //catch errors if they happen
    .catch(function(error){
        console.error('an error has occurred: ' + error);
    });