var WALLET_TEMPLATE = "/wp-content/plugins/findbitcoincash/assets/images/default.png";
jQuery(function($){
    function aj(data, callback){
        jQuery.post(bchaj.ajaxurl, data, function(response){
            callback(response);
        });
    }
    $('#bchGo').on('click',function(){
        $(this).attr('disabled','disabled');
        if(isNaN($('#bchNumber').val())){
            console.log("There is no Bitcoin Cash or Private Keys stored on this server");
            return false;
        }
        aj({'action':'generate_wallet','bchNumber':$('#bchNumber').val()},function(rawAddressList){
            if(rawAddressList !== 0){
                var addressList = JSON.parse(rawAddressList);
                for(var i=0; i<addressList.length;i++){
                    var html = 
                    `
                    <div class="artwallet" id="artwallet1">
                    <img id="papersvg${i}" class="papersvg" src="${WALLET_TEMPLATE}" />
                    <div id="qrcode_public1" class="qrcode_public"><img src="${addressList[i].cashQr}" /></div>
                    <div id="qrcode_private1" class="qrcode_private"><img src="${addressList[i].privatekeyQR}" /></div>
                    <div class="bchaddress" id="bchaddress1">${addressList[i].cashaddress}</div>
                    <div class="bchprivwif" id="bchprivwif1">${addressList[i].privatekey}</div>
                    </div>
                     `;
                    $('#bchWalletList').append(html);
                }
            }
        });
        $('#bchGenerate').hide();
        $('#bchWalletListWrap').show();
    });
    $('#printWallets').on('click',function(){
        // method taken from https://stackoverflow.com/questions/2244605/jquery-add-element-after-another-element
        $('body').after('<div id="print-me"></div>');
        //Copy the element you want to print to the print-me div.
        $("#bchWalletList").clone().appendTo("#print-me");
        //Apply some styles to hide everything else while printing.
        $("body").addClass("printing");
        //Print the window.
        window.print();
        //Restore the styles.
        $("body").removeClass("printing");
        //Clear up the div.
        $("#print-me").empty();
        $("#print-me").remove();
    })
})