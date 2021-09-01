$(document).ready(function() {
    /// prevent refresh and go on top of page
    $('#submit-calculator').click(function(e){ 
        e.preventDefault();
    });

    $('.prijava').click(function() {
        let ime = $('#ime').val();
        let prezime = $('#prezime').val();
        let email = $('#email').val();
        let godine = $('#godine').val();
        let telefon = $('#telefon').val();
        let pol = $('#pol').val();
        let cilj = $('#cilj').val();
        let plan = $('#odabir').val();

        if (!/^[A-ZŠĐČĆŽa-zšđčćž]+$/.test(ime)) {
            $('#ime_greska').removeClass('error-message-invisible').addClass('error-message-visible');
            $('#ime').focus();

        } else {
            $('#ime_greska').removeClass('error-message-visible').addClass('error-message-invisible');


            if (!/^[A-ZŠĐČĆŽa-zšđčćž]+$/.test(prezime)) {
                $('#prezime_greska').removeClass('error-message-invisible').addClass('error-message-visible');
                $('#prezime').focus();
            } else {
                $('#prezime_greska').removeClass('error-message-visible').addClass('error-message-invisible');
                if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                    $('#email_greska').removeClass('error-message-invisible').addClass('error-message-visible');
                    $('#email').focus();
                } else {
                    $('#email_greska').removeClass('error-message-visible').addClass('error-message-invisible');
                    if (godine == "" || godine < 16 || godine > 70) {
                        $('#godine_greska').removeClass('error-message-invisible').addClass('error-message-visible');
                        $('#godine').focus();
                    } else {
                        $('#godine_greska').removeClass('error-message-visible').addClass('error-message-invisible');
                        if (telefon == "" || !/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/.test(telefon)) {
                            $('#telefon_greska').removeClass('error-message-invisible').addClass('error-message-visible');
                            $('#telefon').focus();
                        } else {
                            $('#telefon_greska').removeClass('error-message-visible').addClass('error-message-invisible');
                            //AJAX POST METHOD
                            $.post('php/form.php', //url to php page
                                {
                                    ime: ime,
                                    prezime: prezime,
                                    email: email,
                                    godine: godine,
                                    telefon: telefon,
                                    pol: pol,
                                    cilj: cilj,
                                    plan: plan
                                }, // data to be submit
                                function(data, textStatus, jqXHR) {
                                    // success callback
                                    if (data === "succes") {
                                        
                                        $("#php_greska").html("<p>Uspesna prijava, hvala Vam</p>");
                                    } else {
                                        $("#php_greska").html(data);
                                    }

                                }

                            );
                        }

                    }
                }
            }
        }


    });
});