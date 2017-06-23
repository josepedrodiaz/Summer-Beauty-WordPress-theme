<form action='https://crm.zoho.com/crm/WebToLeadForm' name=WebToLeads1411306000000167104 method='POST' onSubmit='javascript:document.charset="UTF-8"; return checkMandatory()' accept-charset='UTF-8'>
             <!-- Do not remove this code. -->
            <input type='text' style='display:none;' name='xnQsjsdp' value='edd4e8926c56ba0b76a16f23a540c746e22320558312339f3ddb535e01c7aaed'/>
            <input type='hidden' name='zc_gad' id='zc_gad' value=''/>
            <input type='text' style='display:none;' name='xmIwtLD' value='352b6d91b6f7e2dfb4bf6872b8f4a54ec87035d470fccdf45767ad5c66bce3ae'/>
            <input type='text' style='display:none;'  name='actionType' value='TGVhZHM='/>

            <input type='text' style='display:none;' name='returnURL' value='http&#x3a;&#x2f;&#x2f;www.elmistihostels.com&#x2f;thankyou-page' /> 
             <!-- Do not remove this code. -->

            <div class="col-md-6">
            <input type='text' class="input-sm form-control zoho" placeholder="<?php _e('Primeiro Nome','El-Misti'); ?>"  maxlength='40' name='First Name' />             
            <input type='text' class="input-sm form-control zoho" placeholder="<?php _e('Sobrenome','El-Misti'); ?>"   maxlength='80' name='Last Name' />
            <input type='text' class="input-sm form-control zoho" placeholder="<?php _e('Telefone','El-Misti'); ?>" maxlength='30' name='Phone' />
            <input type='text' class="input-sm form-control zoho" placeholder="<?php _e('Email','El-Misti'); ?>"  maxlength='100' name='Email' />
            <input type='text' class="input-sm form-control zoho" placeholder="<?php _e('Pais','El-Misti'); ?>"  maxlength='30' name='LEADCF8' />
            </div>

            <div class="col-md-6">
            <select class="input-sm form-control zoho"  name='LEADCF1'>
              <option value='-None-'>-Hostel-</option>
              <option value='El&#x20;Misti&#x20;Botafogo'>El Misti Botafogo</option>
              <option value='El&#x20;Misti&#x20;Copacabana'>El Misti Copacabana</option>
              <option value='El&#x20;Misti&#x20;House'>El Misti House</option>
              <option value='El&#x20;Misti&#x20;Ilha&#x20;Grande'>El Misti Ilha Grande</option>
              <option value='El&#x20;Misti&#x20;Leme'>El Misti Leme</option>
              <option value='El&#x20;Misti&#x20;Rio'>El Misti Rio</option>
              <option value='El&#x20;Misti&#x20;Rooms'>El Misti Rooms</option>
              <option value='El&#x20;Misti&#x20;Suites&#x20;Ilha&#x20;Grande'>El Misti Suites Ilha Grande</option>
              <option value='El&#x20;Misti&#x20;Yellow'>El Misti Yellow</option>
            </select>
                    <p id="checkinTxt">Check In</p>
                    <input class="input-sm form-control" type='text'  maxlength='20' name='LEADCF81' placeholder='dd/MM/yyyy' /><br />

                    <p id="msgTitle"><?php _e('Mensagem','El-Misti'); ?></p>
                    <textarea class="input-sm form-control zoho" name='Description' maxlength='1000'  rows="4" cols="50"></textarea><br />
                    <input  type='submit' value="<?php _e('Enviar','El-Misti'); ?>" class="btn-custom btn" style="float:right" />


             <select  style='width:250px;display:none;' name='LEADCF5'>
                        <option value='-None-'>-Nenhum-</option>
                        <option value='Booking'>Booking</option>
                        <option value='Carrinho&#x20;Abandonado'>Carrinho Abandonado</option>
                        <option value='Decolar'>Decolar</option>
                    <option selected value='ElMistiHostels.com'>ElMistiHostels.com</option>
                        <option value='Email'>E-mail</option>
                        <option value='Expedia'>Expedia</option>
                        <option value='Facebook'>Facebook</option>
                        <option value='Hostelbookers'>Hostelbookers</option>
                        <option value='Hostelclub'>Hostelclub</option>
                        <option value='Hostelworld'>Hostelworld</option>
                        <option value='Hotel&#x20;Urbano'>Hotel Urbano</option>
                        <option value='Livezilla'>Livezilla</option>
                        <option value='Mala&#x20;Pronta'>Mala Pronta</option>
                        <option value='Skype'>Skype</option>
                        <option value='Telefone'>Telefone</option>
                        <option value='Whatsapp'>Whatsapp</option>
                    </select>

          </div>
         <script>
       var mndFileds=new Array('First Name','Last Name','Email','Description','LEADCF81','LEADCF1','LEADCF8');
       var fldLangVal=new Array("<?php _e('Primeiro Nome','El-Misti'); ?>","<?php _e('Sobrenome','El-Misti'); ?>","<?php _e('E-mail','El-Misti'); ?>","<?php _e('Descrição','El-Misti'); ?>","Check In","Hostel","<?php _e('País','El-Misti'); ?>");

       function checkMandatory() {
        var name='';
        var email='';
        for(i=0;i<mndFileds.length;i++) {
          var fieldObj=document.forms['WebToLeads1411306000000167104'][mndFileds[i]];
          if(fieldObj) {
            if (((fieldObj.value).replace(/^\s+|\s+$/g, '')).length==0) {
              alert(fldLangVal[i] + "<?php _e(' não pode ficar em branco','El-Misti'); ?>"); 
                      fieldObj.focus();
                      return false;
            }  else if(fieldObj.nodeName=='SELECT') {
                     if(fieldObj.options[fieldObj.selectedIndex].value=='-None-') {
                alert(fldLangVal[i] +"<?php _e(' não pode ser vazio','El-Misti'); ?>"); 
                fieldObj.focus();
                return false;
               }
            } else if(fieldObj.type =='checkbox'){
                if(fieldObj.checked == false){
                alert('Please accept  '+fldLangVal[i]);
                fieldObj.focus();
                return false;
               } 
             } 
             try {
                 if(fieldObj.name == 'Last Name') {
                name = fieldObj.value;
                   }
            } catch (e) {}
            }
        }
         try {
            if($zoho) {
            var LDTuvidObj = document.forms['WebToLeads1411306000000167104']['LDTuvid'];
            if(LDTuvidObj) {
                     LDTuvidObj.value = $zoho.salesiq.visitor.uniqueid();
            }
            var firstnameObj = document.forms['WebToLeads1411306000000167104']['First Name'];
            if(firstnameObj) {
                 name = firstnameObj.value +' '+name;
            }
            $zoho.salesiq.visitor.name(name);
            var emailObj = document.forms['WebToLeads1411306000000167104']['Email'];
            if(emailObj) {
                 email = emailObj.value;
                 $zoho.salesiq.visitor.email(email);
            }
            }
        } catch(e) {}
         }
       </script>
    </form>