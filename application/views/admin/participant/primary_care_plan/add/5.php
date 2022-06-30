<div class="tab">Medication:5
    <!-- <form> -->
<p><select class="form-control i_require_assistance_with_medication" name="i_require_assistance_with_medication" caslass="form-control">
                          <option value=""><?= trans('AlI require assistance with medication- Yes/No') ?></option>
                          <option value="No">No </option>
                          <option value="Yes">Yes </option>
                        </select>
                </p>   
<div  id='i_require_assistance_with_medication_div' style='display:none';>
<p>
<select class="form-control medication_assistance_plan" name="medication_assistance_plan" caslass="form-control">
                          <option value=""><?= trans('Medication Assistance Plan- Yes/No') ?></option>
                          <option value="No">No </option>
                          <option value="Yes">Yes </option>
                        </select>
</p>               
</div>
<!-- <input type='submit'>
</form> -->
<script>
$(document).ready(function(){
  
  $('.i_require_assistance_with_medication').on('change', function() {
    if ( this.value == 'Yes')
    {
      $("#i_require_assistance_with_medication_div").show();
      //$("#3_1").attr("required","required");

    }
    else
    {
      $("#i_require_assistance_with_medication_div").hide();
     // $("#3_1").removeAttr("required");
     
    }
  });
});
</script>
</div>