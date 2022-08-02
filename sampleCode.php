		<div class="form-group ml-3">
      <label style="top: calc(-0.4375rem + -2px);font-size: 11px;width:auto"  class="font-bold form-label form-label-outlined">Phone Number</label>
      <div class="form-control-wrap">
        <input id="phone_number" style="height:43px" type="tel" maxlength="10" class="form-control form-control-outlined phone-no input_value" name="phone_number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
      </div>
      <input id="phone_code" class="phone_code" name="phone_code"  type="hidden"/>
    </div>	
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script> 
     // Phone Number 
    $(document).ready( function(){
      let ary = Array.prototype.slice.call(document.querySelectorAll(".phone-no"));

      ary.forEach(function(el) {
        PhoneDisplay(el);
      })	

      function PhoneDisplay(input){		
         var phoneInput = window.intlTelInput(input, {
          initialCountry: "auto",
          autoPlaceholder: "aggressive",
          geoIpLookup: getIp,
          autoHideDialCode: false,
          separateDialCode: true,
          utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
         });
      }

      function getIp(callback) {
       fetch('https://ipinfo.io/json?token=537546a3e94e04', { headers: { 'Accept': 'application/json' }})
         .then((resp) => resp.json())
         .catch(() => {
         return {
           country: 'us',
         };
         })
         .then((resp) => callback(resp.country));
      }

      $(document).ready( function(){
        $('.iti__selected-flag').css({'background-color':'transparent'});

        $('.phone-no').on('keyup', function(){
          $(this).closest('.col-md-6').find('.phone_code').val($(this).closest('.col-md-6').find('.iti__selected-dial-code').text());
        });	

        $('.iti__flag-container').click(function(){
          $(this).closest('.col-md-6').find('.phone_code').val('');
          $(this).closest('.col-md-6').find('.phone-no').val('');
        });
      });
    });
    </script>
