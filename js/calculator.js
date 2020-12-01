

//// Racunanje ////
$(document).ready(function() {
/// Promene opcija brzine u odnosu na cilj
    $('#odabir-cilj').change(function() {
       
        if ($(this).val() == 'odrzavanje') {``
            document.getElementById("opis-brzina").innerHTML ='Pri odrzavanju ne postoji mogucnost odabira brzine jer ne postoji promena telesne težine';
            document.getElementById("brzina").innerHTML = "";
            
          $('#brzina').prop('disabled', true);
        } else if ($(this).val() == 'dobijanje') {
            document.getElementById("opis-brzina").innerHTML ="Brzina ostvarenja se iskazuje kroz procenat telesne težine koji želite da dobijete u proseku nedeljno i moze biti od 0.2% do 0.6%";
            document.getElementById("brzina").innerHTML =
            `<option value="0.2" class="opcija">0.2%</option>
            <option value="0.3" class="opcija">0.3%</option>
            <option value="0.4" class="opcija">0.4%</option>
            <option value="0.5" class="opcija">0.5%</option>
            <option value="0.6" class="opcija">0.6%</option>`
           
          $('#brzina').prop('disabled', false);
        } else if ($(this).val() == 'gubljenje') {
            document.getElementById("opis-brzina").innerHTML ="Brzina ostvarenja se iskazuje kroz procenat telesne težine koji želite da izgubite u proseku nedeljno i moze biti od 0.2% do 1%";
            document.getElementById("brzina").innerHTML =
            `<option value="0.2" class="opcija">0.2%</option>
            <option value="0.3" class="opcija">0.3%</option>
            <option value="0.4" class="opcija">0.4%</option>
            <option value="0.5" class="opcija">0.5%</option>
            <option value="0.6" class="opcija">0.6%</option>
            <option value="0.7" class="opcija">0.7%</option>
            <option value="0.8" class="opcija">0.8%</option>
            <option value="0.9" class="opcija">0.9%</option>
            <option value="1" class="opcija">1%</option>
            `
            
          
          $('#brzina').prop('disabled', false);
        }



      });






    /// prevent refresh and go on top of page
    $('#submit-calculator').click(function(e){ 
        e.preventDefault();
    });
    /// calculator
    $('#submit-calculator').click(function() {
       /// vrednosti inputa
        let ciljVal = $('#odabir-cilj').val();
        let polVal = $('#pol').val();
        let godineVal = $('#godine').val();
        let tezinaVal = $('#tezina').val();
        let visinaVal = $('#visina').val();
        let aktivnostVal = $('#aktivnost').val();
        let brzinatVal = parseFloat($('#brzina').val());
        console.log(brzinatVal+'prvo ocitavanje');
        if (isNaN(brzinatVal)) {
            brzinatVal=0.6;
            
        }
       console.log(brzinatVal+'posle nedefinisanog ocitavanje');

        /// vrednost grama proteina zavisno od aktivnosti
        if (aktivnostVal==='veoma-neaktivan' || aktivnostVal==='lagano-aktivan') {
            var gramProteina = 1.5;
        }else if (aktivnostVal==='srednje-aktivan') {
            var gramProteina = 1.8;
        }else{
            var gramProteina = 2; 
        }
        /// dodavanje 0.2g ako je gubljenje
        if(ciljVal==="gubljenje"){
            gramProteina=gramProteina+0.2;
        }
        
        //// vrednosti idealnih tezina
        let idealnaMasti=visinaVal-100;
        if (polVal==='muski') {
            var idealnaProteini= visinaVal-80;
            gramMasti=0.8;
        } else {
            var idealnaProteini= visinaVal-90;
            gramMasti=1;
        }

        //dnevna promena u zavisnosti od brzine
        let dnevnaPromena = tezinaVal*brzinatVal*10;
        dnevnaPromenaMasti=dnevnaPromena*0.713*0.87*9;//cal
        dnevnaPromenaTkiva=dnevnaPromena*0.287*0.3*4;//cal
        let promena = (dnevnaPromenaMasti+dnevnaPromenaTkiva)/7;
        if (ciljVal==='odrzavanje') {
            promena= 0;
           // console.log(brzinatVal);
        }
            
        if (godineVal == "" || godineVal < 15 || godineVal > 80){
            ///unestite ispravne godine
            $('#godine_greska').removeClass('error-message-invisible').addClass('error-message-visible');
            $('#godine').focus();
        } else{
            $('#godine_greska').removeClass('error-message-visible').addClass('error-message-invisible');
            if (tezinaVal == "" || tezinaVal < 30 || tezinaVal > 200) {
                //////unestite ispravne tezinu
                $('#tezina_greska').removeClass('error-message-invisible').addClass('error-message-visible');
                $('#tezina').focus();
            } else {
                $('#tezina_greska').removeClass('error-message-visible').addClass('error-message-invisible');

                if (visinaVal == "" || visinaVal < 100 || visinaVal > 250) {
                    //////unestite ispravne visinu
                    $('#visina_greska').removeClass('error-message-invisible').addClass('error-message-visible');
                    $('#visina').focus();
                } else {
                    $('#visina_greska').removeClass('error-message-visible').addClass('error-message-invisible');
                    let rezultat = 66.5+(13.75*tezinaVal)+(5.003*visinaVal)-(6.775*godineVal);
                    if (polVal==="zenski") {
                        var BMP = 655.1+(9.563*tezinaVal)+(1.85*visinaVal)-(4.676*godineVal);
                    }else {var BMP = rezultat;}
                    
                    /// BMP zavisno od aktivnosti

                    if (aktivnostVal==="veoma-neaktivan"){BMP=BMP*1.2;}
                    if (aktivnostVal==="lagano-aktivan"){BMP=BMP*1.375;}
                    if (aktivnostVal==="srednje-aktivan"){BMP=BMP*1.55;}
                    if (aktivnostVal==="veoma-aktivan"){BMP=BMP*1.725; }
                    if (aktivnostVal==="ektremno-aktivan"){BMP=BMP*1.9;}
                    let BMPactiv= BMP;

                    /// BMP zavisno od cilja
                    
                    if (ciljVal==="dobijanje"){BMPactiv=BMPactiv+promena;}
                    if (ciljVal==="gubljenje"){BMPactiv=BMPactiv-promena;}
                    if (ciljVal==="odrzavanje"){BMPactiv=BMPactiv;}

                    //// konacan BMP 
                    let BMPFinal = Math.floor(BMPactiv);
                              
                    /// Proracun procenta nutrienata
                    let MastiProcent= Math.floor(idealnaMasti*gramMasti);
                    let ProteiniProcent= Math.floor(idealnaProteini*gramProteina);

                    /// Proracun gramaze nutrienata
                    let Masti = MastiProcent*9;
                    let Proteini = ProteiniProcent*4;
                    let Hidrati = Math.floor((BMPFinal-Masti-Proteini)/4);

                    //// Ispisivanje rezultata
                    document.getElementById("kalorije").innerHTML = "Kalorije: "+BMPFinal+" cal";
                    document.getElementById("protein").innerHTML = "Protein: "+ProteiniProcent+" g";
                    document.getElementById("hidrat").innerHTML = "Ugljeni hidrati: "+Hidrati+" g";
                    document.getElementById("mast").innerHTML = "Masti: "+MastiProcent+" g";
                   
                }/////
                

                
            }
        }
        
    });
});

