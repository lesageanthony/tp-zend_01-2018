var Nightmare = require('nightmare'),
    nightmare = Nightmare({
        show: true
    });

nightmare
//load a url
    .goto('http://localhost:8080/meetup')
    .wait('.container')
    .wait(2000)
    .click('#edit-button')
    .wait('#meetup')
    .wait(2000)
    .type("input[name='title']", "")
    .type("textarea[name='description']", "")
    .type("input[name='title']", "meetup2")
    .type("textarea[name='description']", "long description")
    .type("input[name='begin']", "01/01/2019")
    .type("input[name='end']", "02/01/2019")
    .click("input[name='edit']")
    .wait(2000)

    .end()
    //.then(function(result) {
    //    console.log(result);
    //})
    //catch errors if they happen
    .catch(function(error){
        console.error('an error has occurred: ' + error);
    });