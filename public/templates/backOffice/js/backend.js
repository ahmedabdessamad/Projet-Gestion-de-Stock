$(document).ready(function()
{
    $('.input-switch').bootstrapSwitch();
    //Custom Checkbox
    $('input[type="checkbox"].custom-checkbox').uniform();
    $('.checker span').append('<i class="glyph-icon icon-check"></i>');
    //Custom Radio
    $('input[type="radio"].custom-radio').uniform();
    $(".selector").append('<i class="glyph-icon icon-caret-down"></i>');
    $('.radio span').append('<i class="glyph-icon icon-circle"></i>');
    //End Custom Radio
    $(".touch-spin").TouchSpin({
        verticalbuttons: true,
        verticalupclass: 'glyph-icon icon-plus',
        verticaldownclass: 'glyph-icon icon-minus'
    });

    $.datepicker.regional['fr'] = {
        closeText: "Fermer",
        prevText: "Précédent",
        nextText: "Suivant",
        currentText: "Aujourd'hui",
        monthNames: [ "janvier", "février", "mars", "avril", "mai", "juin",
            "juillet", "août", "septembre", "octobre", "novembre", "décembre" ],
        monthNamesShort: [ "janv.", "févr.", "mars", "avr.", "mai", "juin",
            "juil.", "août", "sept.", "oct.", "nov.", "déc." ],
        dayNames: [ "dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi" ],
        dayNamesShort: [ "dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam." ],
        dayNamesMin: [ "D","L","M","M","J","V","S" ],
        weekHeader: "Sem.",
        dateFormat: "dd/mm/yy",
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: "" 
    };
    $.datepicker.setDefaults($.datepicker.regional['fr']);
    $('.datepicker').datepicker();

    //BS DatePicker
    $('.bootstrap-datepicker').bsdatepicker({
        format: 'dd-mm-yyyy',
    });
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    $('.birthday-picker').bsdatepicker({
        format: 'dd-mm-yyyy',
        onRender: function(date) {
            return date.valueOf() > now.valueOf() ? 'disabled' : '';
        }
    });
    //Birthday And Age
    $("#birthday").bsdatepicker({
        format: 'dd-mm-yyyy',
    }).on('changeDate', function(e){
        v = moment().diff(moment(e.date.valueOf()), 'years');
        $('input[name="age').val(v);
    }).on('change', function(){
        birthday = moment($(this).val(),'DD-MM-YYYY');
        if(birthday.isValid()){
            v = moment().diff(birthday, 'years');
            $('input[name="age"]').val(v);
            return true;
        }
        alert('Vérifiez le format du date');
    });
    $('.dateinterval').daterangepicker({
        autoUpdateInput: true,
        format: 'DD/MM/YYYY',
        locale: {
            separator: " - ",
            applyLabel: "Valider",
            cancelLabel: "Annuler",
            fromLabel: "De",
            toLabel: "à",
            customRangeLabel: "Custom",
            daysOfWeek: [
                "Dim",
                "Lun",
                "Mar",
                "Mer",
                "Jeu",
                "Ven",
                "Sam"
            ],
            monthNames: [
                "Janvier",
                "Février",
                "Mars",
                "Avril",
                "Mai",
                "Juin",
                "Juillet",
                "Août",
                "Septembre",
                "Octobre",
                "Novembre",
                "Décembre"
            ],
            firstDay: 1
        }
    });
    $('.dateinterval-left').daterangepicker({
        opens: 'left',
        autoUpdateInput: true,
        format: 'DD/MM/YYYY',
        locale: {
            separator: " - ",
            applyLabel: "Valider",
            cancelLabel: "Annuler",
            fromLabel: "De",
            toLabel: "à",
            customRangeLabel: "Custom",
            daysOfWeek: [
                "Dim",
                "Lun",
                "Mar",
                "Mer",
                "Jeu",
                "Ven",
                "Sam"
            ],
            monthNames: [
                "Janvier",
                "Février",
                "Mars",
                "Avril",
                "Mai",
                "Juin",
                "Juillet",
                "Août",
                "Septembre",
                "Octobre",
                "Novembre",
                "Décembre"
            ],
            firstDay: 1
        }
    });
    $('.timepicker-example').timepicker({ 'timeFormat': 'H:i:s' });

    //Disable Tab Navigation
    $(".nonclickable").click(function(){
        // return false;
    });

    $(".dataTable").dataTable({
        dom: 'lfr<"toolbar">tip',
        language: {
            sProcessing: "Traitement en cours...",
            searchPlaceholder: "Rechercher",
            sSearch: "",
            sLengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
            sInfo: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            sInfoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            sInfoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            sInfoPostFix: "",
            sLoadingRecords: "Chargement en cours...",
            sZeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
            sEmptyTable: "Aucune donn&eacute;e disponible dans le tableau",
            oPaginate: {
                "sFirst": "Premier",
                "sPrevious": "Pr&eacute;c&eacute;dent",
                "sNext": "Suivant",
                "sLast": "Dernier"
            },
        }
    });
    //Vehicle Form

    function cleanForm(){
        $(".form-error").removeClass('form-error');
        $(".error-msg").remove();
    }

    function validateElement(selector,parent,msg){
        $(selector).addClass('form-error');
        if(!parent){
            $(selector).parent().append('<div class="error-msg"><small>'+msg+'</small></div>');
        }
        else{
            $(selector).parent().parent().append('<div class="error-msg"><small>'+msg+'</small></div>');
        }
        $(selector).focus();
        return false;
    }

    function zoomImage(src,caption){
        if(!src) return false;
        caption = (caption)?caption:'';
        $("#zoomImageModal").modal('show');
        $("#img01").attr("src",src);
        $("#caption").text(caption);
        // When the user clicks on <span> (x), close the modal
        $("#zoomImageModal .close").click(function() { 
            $("#zoomImageModal").modal('hide');
        });
    }

    //Vehicle Form
    $('#vehicle-wizard').bootstrapWizard({
        'nextSelector': '.button-next',
        'previousSelector': '.button-previous',
        'tabClass': '',
        onNext: function(tab, navigation, index) {
            console.log('test');
            cleanForm("vehicleForm");
            if(index==1) {
                if(!$('input[name=matricule_number]').val()) {
                    return validateElement('input[name=matricule_number]',0,'Ce Champ est obligatoire');
                }
                if(!$('input[name=year_of_matricule]').val()){
                    return validateElement('input[name=year_of_matricule]',0,'L\'année d\'immatriculation est obligatoire');
                }
                if(!$('input[name=number_of_places]').val() || $('input[name=number_of_places]').val()<=1){
                    msg = 'Le Nombre de places est obligatoire';
                    if($('input[name=number_of_places]').val()) msg = 'Le Nombre de place doit être superieur à 1';
                    return validateElement('input[name=number_of_places]',1,msg);
                }
                if($('#handicap').attr('checked') && $("input[name=number_of_special_places]").val()<=0){
                    return validateElement('input[name=number_of_special_places]',1,'Veuillez introduire une valeur valide');
                }
            }
            if(index==2){
                if(!$('input[name=license_number]').val()) {
                    return validateElement('input[name=license_number]',0,'Le Champ N° Licence est obligatoire');
                }
                if(!$('input[name=gas_card_number]').val()) {
                    return validateElement('input[name=gas_card_number]',0,'Ce Champ est obligatoire');
                }
                if(!$('input[name=gary_card]').val()) {
                    return validateElement('input[name=gary_card]',0,'Veuillez introduire la Carte Grise');
                }
                if(!$('input[name=date_of_mic]').val()) {
                    return validateElement('input[name=date_of_mic]',0,'La Date de 1er mise en circulation est obligatoire');
                }
                if(!$('input[name=insurance]').val()) {
                    return validateElement('input[name=insurance]',0,'Veuillez introduire une Assurance');
                }
                if(!$('input[name=expiration_date]').val()) {
                    return validateElement('input[name=expiration_date]',0,'Ce Champ est obligatoire');
                }
            }
        },
        onTabChange:function(){
            $(window).scrollTop($('li.active').offset().top)
        }
    });
    $('#vehicle-submit').click(function(e){
        e.preventDefault();
        cleanForm("vehicleForm");
        /*
        if(!$('input[name=frontImage]').val()) {
            return validateElement('input[name=frontImage]',0,'Ce Champ est obligatoire');
        }
        if(!$('input[name=profilPhoto]').val()) {
            return validateElement('input[name=profilPhoto]',0,'Ce Champ est obligatoire');
        }
        if(!$('input[name=backPhoto]').val()) {
            return validateElement('input[name=backPhoto]',0,'Ce Champ est obligatoire');
        }
        if(!$('input[name=damagesFile]').val() && $('input[name=damages]').val()) {
            return validateElement('input[name=damagesFile]',0,'Ce Champ est obligatoire');
        }
        if(!$('input[name=lastMaintenance]').val()) {
            return validateElement('input[name=lastMaintenance]',1,'Ce Champ est obligatoire');
        }
        if(!$('input[name=entryDate]').val()) {
            return validateElement('input[name=entryDate]',1,'Ce Champ est obligatoire');
        }
        if($('input[name=showMaintenance]').prop('checked')){
            if(!$('input[name=garage]').val()) {
                return validateElement('input[name=garage]',0,'Ce Champ est obligatoire');
            }
            if(!$('input[name=address]').val()) {
                return validateElement('input[name=address]',0,'Ce Champ est obligatoire');
            }
            if(!$('input[name=phoneNumber]').val()) {
                return validateElement('input[name=phoneNumber]',0,'Ce Champ est obligatoire');
            }
            if(!$('input[name=mobileNumber]').val()) {
                return validateElement('input[name=mobileNumber]',0,'Ce Champ est obligatoire');
            }
        }
        */
       $("#confirmationModal").modal("show");
    });

    $('.textarea-counter').keyup(function () {
        var max = ($(this).data( "max" ))?$(this).data( "max" ):200;
        var len = $(this).val().length;
        parent = $(this).parent();
        if (len >= max) {
            $('.character-remaining',parent).text('Vous avez atteint la limite');
        } else {
            var char = max - len;
            $('.character-remaining',parent).text(char + ' caractères restants');
        }
    });

    $('.zoomEnable').click(function(){
        zoomImage($(this).attr('src'),$(this).attr('alt'));
    });

    $(".thumbnail-box").click(function(){
        img = $(this).find('.zoomEnable');
        zoomImage($(img).attr('src'),$(img).attr('alt'));
    });

    $('#client-wizard').bootstrapWizard({
        'nextSelector': '.button-next',
        'previousSelector': '.button-previous',
        'tabClass': '',
        onNext: function(tab, navigation, index) {
            cleanForm("clientForm");
        },
        onTabChange:function(){
            $(window).scrollTop($('li.active').offset().top)
        }
    });
    $('#client-submit').click(function(e){
        e.preventDefault();
        $("#confirmationModal").modal("show");
    });
    //Chosen Select
    $(".chosen-select").chosen({
        placeholder_text_single: "Selectionner une option...",
    });
    $(".chosen-nosearch").chosen({
        placeholder_text_single: "Selectionner une option...",
        disable_search_threshold: 10,
    });
    $(".chosen-search").append('<i class="glyph-icon icon-search"></i>');
    $(".chosen-single div").html('<i class="glyph-icon icon-caret-down"></i>');
    //End Chosen Select

    //Wizards Using the class
    $('.form-wizard').bootstrapWizard({
        'nextSelector': '.button-next',
        'previousSelector': '.button-previous',
        'tabClass': '',
        onTabChange:function(){
            $(window).scrollTop($('li.active').offset().top)
        }
    });

    $('.autocomplete').change(function(){
        geolocate();
    });

    //Accordion
    if($(".accordion").length){
        $(".accordion").accordion({
            heightStyle: "content"
        });
    }

    if($('input[name="lat"]').val() && $('input[name="lon"]').val()){
        console.log('Create Marker');
        addMarkerWithLatnLng($('input[name="lat"]').val(),$('input[name="lon"]').val());
    }

    //Handle 2 Weeks Calendars
    $("#weekCheckBox").change(function(){
        if($(this).prop( "checked" )){
            toggleTwoWeeks(1)
        }
        else{
            toggleTwoWeeks(0);
        }
    });
    
});

function getNextMonthByPosition(date,index){
    result = date.clone();
    while(result.month()!=index){
        result = result.add(1, 'M');
    }
    result.endOf("month");
    return result;
}

var placeSearch, autocomplete;
var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
};
var infowindow;
var map = null;
var marker = null;
var geocoder;
var totalDistance,totalDuration,beginTime,durations,markers = [];

//function to Toggle The second week of a calendar
function toggleTwoWeeks(option){
    if(option==1){
        //show Two Weeks form
        $(".weekA").addClass("col-md-6");
        $(".weekB").removeClass("hide");
        $(".weekTitle").removeClass("hide");
        $("#multipleWeeks").val(1);
    }
    else{
        $(".weekA").removeClass("col-md-6");
        $(".weekB").addClass("hide");
        $(".weekTitle").addClass("hide");
        $("#multipleWeeks").val(0);
    }
}

//Planning Functions
function initializeClient(id){
    nbr = $(".clientbox").length+1;
    id.find(".clientNumber").text("Usager "+nbr);
    id.find('.tooltip-button').tooltip({
        container: 'body'
    });
    id.find(".clientid").attr('name',"clients[]");
    id.find(".chosen-container").remove();
    id.find(".error-msg").remove();
    id.find('.custom-checkbox').uniform();
    id.find('.checker span').append('<i class="glyph-icon icon-check"></i>');
}

function add_client(id){
    clone = $(".clientbox").first().clone();
    initializeClient(clone);
    
    $(".clientbox").last().after(clone);
    $(".removeclient").show();
}

function remove_client(id){
    boxtoremove = $(".clientbox").last();
    boxtoremove.remove();
    
    if($(".clientbox").length == 1){
        $('.removeclient').hide();
    }
}

function getEstablishmentInfo(id){
    return [ $("#establishment option[value="+id+"]").text(),
             $("#establishment option[value="+id+"]").data('lat'),
             $("#establishment option[value="+id+"]").data('lon'),
            ];
}

function buildCircuit(){
    $(".clientdiv").empty();
    $(".clientdiv").append(`
        <div class="row mrg20B clientbox">
            <label class="col-sm-3 control-label clientNumber">Usager 1</label>
            <div class="col-sm-6 select"></div>
            <div class="col-sm-3 control-label text-left checkbox-info">
                <label><input type="checkbox" name="clientPM[]" id="checkbox2018" value="1" class="custom-checkbox">PM</label>
                <span class="bs-badge badge-primary tooltip-button display-inline" data-placement="right" title="Pause Méridienne">?</span>
            </div>
        </div>`);
    clientselect = $(".hiddenclients").clone();
    clientselect.removeClass();
    clientselect.addClass("form-control clientid");
    $(".clientdiv").find(".select").last().append(clientselect);
    $(".clientdiv").wrapInner(`<div class="form-group"></div>`);
    $(".clientdiv").append(`
        <div class="row">
            <button class="btn btn-danger pull-right removeclient" title="Supprimer Contact"><i class="glyph-icon icon-minus"></i></button>
            <button class="btn btn-success pull-right mrg5R addclient" title="Ajouter Contact"><i class="glyph-icon icon-plus"></i></button>
        </div>`);
    initializeClient($(".clientbox"));
    $(".clientNumber").text("Usager 1");
    add_client();
    add_client();
}

//Navette
function buildShuttle(){
    console.log('Navette');
    $(".clientdiv").empty();
    for(i=0;i<8;i++){
        $(".clientdiv").append(`<div class="col-md-6"><div class="form-group">
                <label class="col-md-3 control-label">Usager `+(i+1)+`</label>
                <div class="col-md-9 select"></div>
                </div></div>`);
        clientselect = $(".hiddenclients").clone();
        clientselect.removeClass();
        clientselect.attr('name','clients[]');
        clientselect.addClass("form-control clientid");
        $(".clientdiv").find(".select").last().append(clientselect);
    }
    $(".clientdiv").wrapInner(`<div class="row"></div>`);
    $("input[name='distance']").val(0);
    $("input[name='time']").val(0);
    $(".shuttle").show();
}

function toggleStagePane(test){
    if(test){
        $('.form-wizard').bootstrapWizard('display', 2);
        $("#showResume").find(".wizard-step").text(4);
        $(".gotostep2").attr("href","#step-3");
        $(".gotostep3").attr("href","#step-3");
    }
    else{
        $('.form-wizard').bootstrapWizard('hide', 2);
        $("#showResume").find(".wizard-step").text(3);
        $(".gotostep2").attr("href","#step-2");
        $(".gotostep3").attr("href","#step-4");
    }
}

function buildStage(){
    toggleStagePane(1);
    $(".stage").show();
    console.log('Stage');
    $(".clientdiv").empty();
    $(".clientdiv").append(`
        <div class="row mrg20B clientbox">
            <label class="col-sm-3 control-label clientNumber">Usager 1</label>
            <div class="col-sm-6 select"></div>
            <div class="col-sm-3 control-label text-left checkbox-info">
                <label><input type="checkbox" name="clientPM[]" id="checkbox2018" value="1" class="custom-checkbox">PM</label>
                <span class="bs-badge badge-primary tooltip-button display-inline" data-placement="right" title="Pause Méridienne">?</span>
            </div>
        </div>`);
    clientselect = $(".hiddenclients").clone();
    clientselect.removeClass();
    clientselect.addClass("form-control clientid");
    $(".clientdiv").find(".select").last().append(clientselect);
    $(".clientdiv").wrapInner(`<div class="form-group"></div>`);
    $(".clientdiv").append(`
        <div class="row">
            <button class="btn btn-danger pull-right removeclient" title="Supprimer Contact"><i class="glyph-icon icon-minus"></i></button>
            <button class="btn btn-success pull-right mrg5R addclient" title="Ajouter Contact"><i class="glyph-icon icon-plus"></i></button>
        </div>`);
    initializeClient($(".clientbox"));
    $(".clientNumber").text("Usager 1");
    $(".planningAgent").text("Tuteur de stage");
}

function buildExamen(){
    console.log("Examen");
    buildStage();
    $(".planningAgent").text("Responsable");
    $(".companyBox").hide();
}

function isArrayInArray(arr, item){
    var item_as_string = JSON.stringify(item);
  
    var contains = arr.some(function(ele){
      return JSON.stringify(ele) === item_as_string;
    });
    return contains;
}

function getCol(matrix, col){
    var column = [];
    for(var i=0; i<matrix.length; i++){
        column.push(matrix[i][col]);
    }
    return column;
}


//Google AutoComplete Functions
    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById($('.autocomplete').first().attr('id'))),
            // getElementsByClassName
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
        var myOptions = {
            zoom: 8,
            center: new google.maps.LatLng(48.856614,2.352222),
            mapTypeControl: true,
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
            navigationControl: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
                
        map = new google.maps.Map(document.getElementById("map_canvas"),
                                        myOptions);

        infowindow = new google.maps.InfoWindow(
            { 
                size: new google.maps.Size(150,50)
            });
            
        if(navigator.geolocation && !marker) {
            navigator.geolocation.getCurrentPosition(function (position) {
                initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                map.setCenter(initialLocation);
            });
        }
        
        google.maps.event.addListener(map, 'click', function() {
            infowindow.close();
        });

        google.maps.event.addListener(map, 'click', function(event) {
            //call function to create marker
                if (marker) {
                    marker.setMap(null);
                    marker = null;
                }
            marker = createMarker(event.latLng, "name", "<b>Position</b><br>"+event.latLng);
            geocoder = new google.maps.Geocoder();
            $('.lat').val(event.latLng.lat());
            $('.lng').val(event.latLng.lng());
            geocodePosition(marker.getPosition());
        });
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
        $('.lat').val(place.geometry.location.lat());
        $('.lng').val(place.geometry.location.lng());
        if (marker) {
            marker.setMap(null);
            marker = null;
        }
        pos = new google.maps.LatLng(place.geometry.location.lat(),place.geometry.location.lng());
        marker = createMarker(pos, "name", "<b>Adresse</b><br>"+pos);

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                // var val = place.address_components[i][componentForm[addressType]];
                // document.getElementById(addressType).value = val;
                var val = place.address_components[i][componentForm[addressType]];
                if(addressType === 'locality'){
                    $('.city').val(val);
                }
                if(addressType === 'country'){
                    $('.country').val(val);
                }
                if(addressType === 'postal_code'){
                    $('.zipcode').val(val);
                }
            }
        }
        
    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        if (navigator.geolocation  && !marker) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
    //Get Address from Marker
    // A function to create the marker and set up the event window function 
    function createMarker(latlng, name, html) {
        var contentString = html;
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            zIndex: Math.round(latlng.lat()*-100000)<<5
            });

        google.maps.event.addListener(marker, 'click', function() {
            infowindow.setContent(contentString); 
            infowindow.open(map,marker);
            });
        google.maps.event.trigger(marker, 'click');
        return marker;
    }

    function geocodePosition(pos) {
        geocoder.geocode({
          latLng: pos
        }, function(responses) {
          if (responses && responses.length > 0) {
              var address = '';
              var val = '';
            for (var i = 0; i < responses[0].address_components.length; i++) {
                var addressType = responses[0].address_components[i].types[0];
                if (componentForm[addressType]) {
                    val = responses[0].address_components[i][componentForm[addressType]];
                    if(addressType === 'locality'){
                        $('.city').val(val);
                    }
                    if(addressType === 'country'){
                        $('.country').val(val);
                    }
                    if(addressType === 'postal_code'){
                        $('.zipcode').val(val);
                    }
                    if(val.length && val!='Unnamed Road'){
                        if(!address.length){
                            address = val;
                        }
                        else{
                            address = address+', '+val;                        
                        }
                    }
                }
            }
            $('.address').val(address);
          } 
          else {
            console.log('error');
            $('address').val('');
            $('.city').val('');
            $('.country').val()
            $('.zipcode').val('');
          }
        });
    }

    function addMarkerWithLatnLng(lat,lng){
        if(lat && lng){
            pos = new google.maps.LatLng(lat,lng);
            marker = createMarker(pos, "name", "<b>Position</b><br>"+pos);
        }
    }
//Google Maps
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
            center: {lat: 48.856614, lng: 2.352222}  // Australia.
    });
}

function displayRoute(origin, destination, service, display,pt1,pt2,points,saved = 0) {
    var deferred = new $.Deferred();
    point1 = [origin[0],origin[1]];
    point2 = [destination[0], destination[1]];
    service.route({
        origin: point1.toString(),
        destination: point2.toString(),
        travelMode: 'DRIVING',
        avoidTolls: true
    }, function(response, status) {
        if (status === 'OK') {
            display.setDirections(response);
            var _route = response.routes[0].legs[0];
            if(pt1==1){
                marker = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='+pt1+'|00a792|000000';
                pinA = new google.maps.Marker({
                    position: _route.start_location,
                    map: map,
                    icon: marker
                });
                markers[pt1-1] = pinA;
            }
            marker = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='+pt2+'|00a792|000000'
            pinB = new google.maps.Marker({
                position: _route.end_location,
                map: map,
                icon: marker
            });
            markers[pt2-1] = pinB;
            var distance = 0;
            var time = 0;
            var myroute = response.routes[0];
            for (var i = 0; i < myroute.legs.length; i++) {
                distance += myroute.legs[i].distance.value;
                time += myroute.legs[i].duration.value;
            }
            distance = parseFloat(distance / 1000).toFixed(3);
            time = parseFloat(time / 60).toFixed(3);
            durations.push(time);
            totalDistance += parseFloat(distance);
            totalDuration += parseFloat(time);
            $(".distanceText").text(parseFloat(totalDistance).toFixed(3)+'KM');
            $(".timeText").text(parseFloat(totalDuration).toFixed(3)+'Min');
            if(points.length==pt2){
                if(!saved) setBubles(points);
                else setReadyBubles(points);
            }
            $("#map").after("<input type='hidden' value='"+distance+"' name='mapDistancesTmp[]' class='MapTmp' />");
            $("#map").after("<input type='hidden' value='"+time+"' name='mapDurationsTmp[]' class='MapTmp' />");
            deferred.resolve([totalDistance,totalDuration]);
        } 
        else {
            // alert('Une erreur s\'est produite lors du creation du route ' + status);
            console.log('Erreur');
        }
    });
    return deferred.promise();
}

function reDrawGMap(points,saved = 0){
    
    $(".MapTmp").remove();
    totalDistance = 0;
    totalDuration = 0;
    $(".distanceText").text(parseFloat(totalDistance).toFixed(3)+'KM');
    $(".timeText").text(parseFloat(totalDuration).toFixed(3)+'Min');
    durations = [];
    for(i=0;i<markers.length;i++){
        markers[i].setMap(null);
    }
    markers.length = 0;
    var directionsService = new google.maps.DirectionsService;
    for(i=0;i<points.length-1;i++){
        var directionsDisplay = new google.maps.DirectionsRenderer({
            draggable: false,
            map: map,
            suppressMarkers: true
        });
        displayRoute(points[i],points[i+1], directionsService,
            directionsDisplay,i+1,i+2,points,saved).then(function(data){
                totalDistance = data[0];
                totalDuration = data[1];
            });
    }
    $(".distanceText").text(parseFloat(totalDistance).toFixed(3)+'KM');
    $("input[name='distance']").val(parseFloat(totalDistance).toFixed(3));
    $(".timeText").text(parseFloat(totalDuration).toFixed(3)+'Min');
    $("input[name='time']").val(parseFloat(totalDuration).toFixed(3));
}

function setBubles(points){
    var beginTime = [];
    //Get Begin Times from points array
    for(i=1;i<points.length;i++){
        if(points[i][2]==2) beginTime.push(points[i-1][4].clone().subtract(5,'m'));
    }
    j = beginTime.length-1;
    for(i=markers.length-1;i>=0;i--){
        addtionalTime = (durations[i])?Math.ceil(durations[i]):0;
        marker = markers[i];
        content = points[i][6]+'<br>';
        if(points[i][2]!=1) { 
            content += ' Etablissement <br/>'; 
            time = beginTime[j];j--;
        }
        else { content += 'Usager <br/>';
            time = time.subtract(addtionalTime,'m');
        }
        content += 'Heure d\'arrivée '+time.format('hh:mm');
        var infowindow = new google.maps.InfoWindow();
        console.log("Markers = "+markers.length+"  Points = "+points.length);
        google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
            return function() {
               infowindow.setContent(content);
               infowindow.open(map,marker);
            };
        })(marker,content,infowindow));
        google.maps.event.trigger(marker, 'click');
    }
}
function setReadyBubles(points){
    console.log(points);
    for(i=markers.length-1;i>=0;i--){
        marker = markers[i];
        content = points[i][6]+'<br>';
        if(points[i][2]!=1) { 
            content += ' Etablissement <br/>'; 
        }
        else { content += 'Usager <br/>';
        }
        time = points[i][4];
        content += 'Heure d\'arrivée '+time.format('hh:mm');
        var infowindow = new google.maps.InfoWindow();
        google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
            return function() {
               infowindow.setContent(content);
               infowindow.open(map,marker);
            };
        })(marker,content,infowindow));
        google.maps.event.trigger(marker, 'click');
    }
}
//Show Map With A Marker in It
function showMapWithMarker(){
    title = $('#markerTitle').val();
    latitude = parseFloat($('#lat').val());
    longitude = parseFloat($('#lon').val());
    if(lat && lat){
        var myLatLng = {lat: latitude, lng: longitude};

        var map = new google.maps.Map(document.getElementById('map_canvas'), {
            zoom: 11,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: title
        });

        if(title){
            var infowindow = new google.maps.InfoWindow({
                content: title
            });
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });
            
            google.maps.event.trigger(marker, 'click');
        }
    }
}