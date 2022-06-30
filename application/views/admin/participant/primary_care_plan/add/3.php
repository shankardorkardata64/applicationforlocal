<div class="tab">
    Advanced Health Directive: 3
    <!-- <form> -->
<p><select class="form-control I_have_an_Advanced_Health_Directive" name="I_have_an_Advanced_Health_Directive" caslass="form-control">
                          <option value=""><?= trans('I have an Advanced Health Directive') ?></option>
                          <option value="No">No </option>
                          <option value="Yes">Yes </option>
                        </select>
                </p>   
<div  id='I_have_an_Advanced_Health_Directive' style='display:none';>
                <p> <select id="3_1" class="form-control Display Advanced Health Directive On Support Console" name="display_advanced_health_directive_on_support_cosole" caslass="form-control">
                          <option value=""><?= trans('Display Advanced Health Directive On Support Console') ?></option>
                          <option value="No">No </option>
                          <option value="Yes">Yes </option>
                        </select>
                </p>   
<p><input type='file' id="3_2" placeholder="Upload Advanced Health Directive" oninput="this.className = ''" name="upload_advanced_helth_directive"></p>

</div>
<!-- <input type='submit'>
</form> -->
<script>
$(document).ready(function(){
  
  $('.I_have_an_Advanced_Health_Directive').on('change', function() {
    if ( this.value == 'Yes')
    {
      $("#I_have_an_Advanced_Health_Directive").show();
      $("#3_1").attr("required","required");
      $("#3_2").attr("required","required");
    }
    else
    {
      $("#I_have_an_Advanced_Health_Directive").hide();
      $("#3_1").removeAttr("required");
      $("#3_2").removeAttr("required");
    }
  });
});
</script>
</div>