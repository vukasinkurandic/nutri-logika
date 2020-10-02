

$(document).ready(function() {
    /// prevent refresh and go on top of page
    $('#submit-calculator').click(function(e){ 
        e.preventDefault();
    });
    /// calculator
    $('#submit-calculator').click(function() {
       /// values of inputs
        let ciljVal = $('#cilj').val();
        let polVal = $('#pol').val();
        let godineVal = $('#godine').val();
        let tezinaVal = $('#tezina').val();
        let visinaVal = $('#visina').val();
        let aktivnostVal = $('#aktivnost').val();

        if (godineVal == "" || godineVal < 16 || godineVal > 70){
            ///unestite ispravne godine
            $('#godine_greska').removeClass('error-message-invisible').addClass('error-message-visible');
            $('#godine').focus();
            console.log("unestite ispravne godine");
        } else{
            $('#godine_greska').removeClass('error-message-visible').addClass('error-message-invisible');
            if (tezinaVal == "" || tezinaVal < 40 || tezinaVal > 200) {
                //////unestite ispravne tezinu
                $('#tezina_greska').removeClass('error-message-invisible').addClass('error-message-visible');
                $('#tezina').focus();
                console.log("unestite ispravne tezinu");
            } else {
                $('#tezina_greska').removeClass('error-message-visible').addClass('error-message-invisible');

                if (visinaVal == "" || visinaVal < 130 || visinaVal > 230) {
                    //////unestite ispravne visinu
                    $('#visina_greska').removeClass('error-message-invisible').addClass('error-message-visible');
                    $('#visina').focus();
                    console.log("unestite ispravne visinu");
                } else {
                    $('#visina_greska').removeClass('error-message-visible').addClass('error-message-invisible');
                    let rezultat = (10*tezinaVal)+(6.25*visinaVal)-(5*godineVal)+5;
                    if (polVal==="zenski") {
                        var BMP = rezultat - 166;
                    }else {var BMP = rezultat;}
                    
                    /// BMP zavisno od aktivnosti

                    if (aktivnostVal==="veoma-neaktivan"){BMP=BMP*1.2;}
                    if (aktivnostVal==="lagano-aktivan"){BMP=BMP*1.375;}
                    if (aktivnostVal==="srednje-aktivan"){BMP=BMP*1.55;}
                    if (aktivnostVal==="veoma-aktivan"){BMP=BMP*1.725; }
                    if (aktivnostVal==="ektremno-aktivan"){BMP=BMP*1.9;}
                    let BMPactiv= BMP;

                    /// BMP zavisno od cilja
                    if (ciljVal==="dobijanje"){BMPactiv=BMPactiv+300;}
                    if (ciljVal==="gubljenje"){BMPactiv=BMPactiv-500;}

                    //// konacan BMP 
                    let BMPFinal = Math.floor(BMPactiv);
                    
                    
                    /// Proracun procenta nutrienata
                    let MastiProcent= (BMPFinal/100)*20;
                    let ProteiniProcent= (BMPFinal/100)*15;
                    let HidratiProcent= (BMPFinal/100)*65;

                    /// Proracun gramaze nutrienata
                    let Masti = Math.floor(MastiProcent/9);
                    let Proteini = Math.floor(ProteiniProcent/4);
                    let Hidrati = Math.floor(HidratiProcent/4);

                    //// Ispisivanje rezultata
                    document.getElementById("kalorije").innerHTML = "Kalorije: "+BMPFinal+" cal";
                    document.getElementById("protein").innerHTML = "Protein: "+Proteini+" g";
                    document.getElementById("hidrat").innerHTML = "Ugljeni hidrati: "+Hidrati+" g";
                    document.getElementById("mast").innerHTML = "Masti: "+Masti+" g";
                   
                }/////
                
            }
        }
        
    });
});

