$(document).ready(function(){
    Score();
});


function Score(){
    console.clear();

    var name                = $('#name').val();
    var description         = $('#description').val();
    var phone               = $('#phone').val();
    var address             = $('#address').val();
    var guide               = $('#guide').val();
    var location            = $('#city_id').val();

    var name_score          = 0; // 15
    var description_score   = 0; // 20
    var phone_score         = 0; // 15
    var address_score       = 0; // 20
    var guide_score         = 0; // 20
    var location_score      = 0; // 10
    var total = 0;

    if(name){
        name_score = 5;

        if(name.length > 20)
            name_score = 15;
        else if(name.length > 15)
            name_score = 12;
        else if(name.length > 10)
            name_score = 7;

        //$('#name-length').html(name.length);
        console.log(name_score+' :Name');
    }
    if(description){
        description_score = 5;
        if(description.length > 120)
            description_score = 20;
        else if(description.length > 80)
            description_score = 18;
        else if(description.length > 50)
            description_score = 14;
        else if(description.length > 30)
            description_score = 8;

        //$('#description-length').html(description.length);
        console.log(description_score+' :Description');
    }
    if(address){
        address_score = 5;
        if(address.length > 40)
            address_score = 20;
        else if(address.length > 30)
            address_score = 17;
        else if(address.length > 20)
            address_score = 12;
        else if(address.length > 10)
            address_score = 8;
        
        //$('#address-length').html(address.length);
        console.log(address_score+' :Address');
    }
    if(guide){
        guide_score = 5;

        if(guide.length > 50)
            guide_score = 20;
        else if(guide.length > 30)
            guide_score = 16;
        else if(guide.length > 20)
            guide_score = 12;
        else if(guide.length > 10)
            guide_score = 7;

        //$('#guide-length').html(guide.length);
        console.log(guide_score+' :Guide');
    }
    if(phone.length > 9){
        phone_score = 13;
        if(phone.length > 18)
            phone_score = 15;
        console.log(phone_score+' :Phone');
    }
    if(location){
        location_score = 10;
        //console.log(location_score+' :Location');
    }

    total = name_score+description_score+phone_score+address_score+guide_score+location_score;

    $('#score').html(total+'%');

    //console.log(total+' :Total Score');
}