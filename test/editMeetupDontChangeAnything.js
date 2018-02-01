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