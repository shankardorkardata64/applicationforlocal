

 <div class="tab">My Appointed Decision Maker: 2
    <p> <select class="form-control my_appointed_decision_maker_yes_no" name="my_appointed_decision_maker_yes_no" caslass="form-control">
                          <option value=""><?= trans('please_select') ?></option>
                          <option value="No">No </option>
                          <option value="Yes">Yes </option>
                        </select>
                </p>

    <div id='appointed' style='display:none;'>
                     <p><select id='1' required name="induring_poa" class="form-control">
                        <option value=""><?= trans('please_select_type') ?></option>
                          <option >Power of Attorney</option>
                          <option >Office Of Public Guardian</option>
                        <option >Family Member</option>
                        </select></p>

<p><select required id='2' name="prefered_method_of_contact" class="form-control" >
                        <option value=""><?= trans('please_select_prefered_method_of_contact') ?></option>
                          <option >Phone</option>
                          <option >Mobile</option>
                           <option >Email</option>
                        </select></p>
<p><input id='3' placeholder="Name" required oninput="this.className = ''" name="aname"></p>
<p><input id='4' placeholder="Phone number" required oninput="this.className = ''" name="aphone_no"></p>
<p><input id='5' placeholder="Mobile Number" required oninput="this.className = ''" name="amobile"></p>
<p><input id='6' placeholder="Email" required oninput="this.className = ''" name="aemail"></p>
<p><input id='7' placeholder="Address" required  oninput="this.className = ''" name="aaddress"></p>
<p><input id='8' placeholder="Relationship" required  oninput="this.className = ''" name="arelationship"></p>
</div>
<script>
$(document).ready(function(){

    $('.my_appointed_decision_maker_yes_no').on('change', function() 
    {
      
    if ( this.value == 'Yes')
    {
     $("#nextBtn").show();
     $("#appointed").show();
     $("#1").attr("required","required");
     $("#2").attr("required","required");
     $("#3").attr("required","required");
     $("#4").attr("required","required");
     $("#5").attr("required","required");
     $("#6").attr("required","required");
     $("#7").attr("required","required");
     $("#8").attr("required","required");
    }
    else if( this.value == 'No')
    {  
      $("#nextBtn").show();
      $("#appointed").hide();
      $("#1").removeAttr("required");
      $("#2").removeAttr("required");
      $("#3").removeAttr("required");
      $("#4").removeAttr("required");
      $("#5").removeAttr("required");
      $("#6").removeAttr("required");
      $("#7").removeAttr("required");
      $("#8").removeAttr("required");
   }
   else
   {
//alert('Please select');
$("#appointed").hide();
$("#nextBtn").hide();
      $("#1").removeAttr("required");
      $("#2").removeAttr("required");
      $("#3").removeAttr("required");
      $("#4").removeAttr("required");
      $("#5").removeAttr("required");
      $("#6").removeAttr("required");
      $("#7").removeAttr("required");
      $("#8").removeAttr("required");
   }
  });
});
</script>
</div>