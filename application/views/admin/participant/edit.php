<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjlyTMFSZuwQMG2AA5aAsyUSmLWADqZuI&libraries=places"></script>  
<style>
    #map_canvas
    {
    width: 650px;
    height: 400px;
}
</style>

                  <div class='row'>
                   <div class="col-sm-6"></div>
                   <div class="col-sm-6"></div>
                  </div>



                  <div class='row'>
                   <div class="col-sm-4"></div>
                   <div class="col-sm-4"></div>
                   <div class="col-sm-4"></div>
                  </div>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              <?= $title ?> </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/admin'); ?>" class="btn btn-success"><i class="fa fa-list"></i> <?= trans('admin_list') ?></a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <!-- form start -->
                <div class="box-body">

                  <!-- For Messages -->
                  <?php $this->load->view('admin/includes/_messages.php') ?>


                  <?php

$i=$info;
?>
                  <?php echo form_open_multipart(base_url('admin/participant/edit'), 'class="form-horizontal"');  ?> 
                  
                  <input type='hidden' name='id' value="<?=$i['id']?>">
                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('firstname') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="firstname"  value="<?=$i['first_name']?>" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('lastname') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="lastname" value="<?=$i['last_name']?>" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>



                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('preferred_username') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="preferred_username" value="<?=$i['preferred_name']?>" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>
   





                  



                  



                  <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('dva_number') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="dva_number" value="<?=$i['dva_number']?>" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('ex_date') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="dva_number_edate" value="<?=$i['dva_number_edate']?>" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>

                  
                  <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('pension_number') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="pension_number" value="<?=$i['pension_number']?>" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('ex_date') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="pension_number_edate" value="<?=$i['pension_number_edate']?>" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>




                  <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('dob') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="dob" class="form-control" value="<?=$i['dob']?>" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('gender') ?></label>
                  <div class="col-md-12">
                      <select name="gender"  class="form-control">
                        <option value=""><?= trans('select_gender') ?></option>
                        <?php foreach($emp_gender as $g): ?>
                          <option <?php if($i['gender']==$g['id']) { echo "selected";} ?> value="<?= $g['id']; ?>"><?= $g['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                  </div>
                  </div>
                  
                  </div>
                  </div>



                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('address') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="address" value="<?=$i['address']?>" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('phone_number') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="phone_number" value="<?=$i['phone_number']?>" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                        </div>
                  
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('email') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="email" value="<?=$i['email']?>" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  

                  </div>
                  </div>



                  
                  <div class='row'>
                  <div class="col-sm-6">
                  </div>
                  <div class="col-sm-6">
                  </div>
                  </div>
                  

                  
                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('ndis_number') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="ndis_number" value="<?=$i['ndis_number']?>" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('medicare_number') ?></label>
                  
                  <div class="col-md-12">
                  <input type="text" name="medicare_number" value="<?=$i['medicare_number']?>" class="form-control" id="firstname" placeholder="">
                  
                  </div>
                  </div>
                  </div>


                  
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('medicare_number_edate') ?></label>
                  
                  <div class="col-md-12">
                  <input type="date" name="medicare_number_edate" value="<?=$i['medicare_number_edate']?>" class="form-control" id="firstname" placeholder="">
                  
                  </div>
                  </div>
                  </div>
                 </div>
                 




                 <div class='row'>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('cc_number') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="cc_number" value="<?=$i['cc_number']?>" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('cc_number_edate') ?></label>
                  <div class="col-md-12">
                  <input type="date" name="cc_number_edate" value="<?=$i['cc_number_edate']?>" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>







                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('r_first_name') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="r_first_name" value="<?=$i['r_first_name']?>" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('r_last_name') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="r_last_name" value="<?=$i['r_last_name']?>" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>



                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('r_phone_number') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="r_phone_number" value="<?=$i['r_phone_number']?>" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  

                  </div>
   



                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('abount_me') ?></label>
                  <div class="col-md-12">
                  <input type="text" name="abount_me" value="<?=$i['abount_me']?>" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('photo') ?></label>
                  
                  <div class="col-md-12">
                  <input type="file" name="photo" value="<?=$i['photo']?>" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>




                  <div class="col-sm-4">
                   <img src="<?=base_url()?>uploads/<?=$i['photo']?> " alt="" border=3 height=100 width=100></img>
			
                  
                  </div>
                  

                  </div>
   



                 <!---->

 

   
                 <hr>
<center>
<h3>About Myself and My Preference</h3>
                        </center>

                        <br>


                        <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('lang') ?></label>
                  <div class="col-md-12">
                  <input type="text" required name="lang"  value="<?=$i['lang']?>" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('emergency_name') ?></label>
                  <div class="col-md-12">
                  <input type="text" required name="emergency_name" value="<?=$i['emergency_name']?>" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('emergency_phone') ?></label>
                  <div class="col-md-12">
                  <input type="text" required name="emergency_phone" value="<?=$i['emergency_phone']?>" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>
   




                        
                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('characterestics') ?></label>
                  <div class="col-md-12">
                  <input type="text" required name="characterestics"  value="<?=$i['characterestics']?>" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('qualty') ?></label>
                  <div class="col-md-12">
                  <input type="text" required name="qualty" value="<?=$i['qualty']?>" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('interest') ?></label>
                  <div class="col-md-12">
                  <input type="text" required name="interest" value="<?=$i['interest']?>" class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>
                  </div>
   



                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('culture') ?></label>
                  <div class="col-md-12">
                  <input type="text" required name="culture" value="<?=$i['culture']?>" class="form-control" id="firstname" placeholder="">
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('spiritual') ?></label>
                  <div class="col-md-12">
                  <input type="text" required name="spiritual" value="<?=$i['spiritual']?>"class="form-control" id="lastname" placeholder="">
                  </div>
                  </div>
                  </div>



                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('valueandbel') ?></label>
                  <div class="col-md-12">
                    <textarea required class="form-control" name="valueandbel"><?=$i['valueandbel']?></textarea>
                  </div>
                  </div>
                  </div>
                  </div>
   






                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="firstname" class="col-md-12 control-label"><?= trans('strenghts') ?></label>
                  <div class="col-md-12">
                    
                  <textarea required class="form-control" name="strenghts"><?=$i['strenghts']?></textarea>
                  </div>
                  </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('interest') ?></label>
                  <div class="col-md-12">
                    
                  <textarea required class="form-control" name="interest"><?=$i['interest']?></textarea>
                  </div>
                  </div>
                  </div>



                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label"><?= trans('difficult') ?></label>
                  <div class="col-md-12">
                    <textarea required class="form-control" name="difficult"><?=$i['difficult']?></textarea>
                  </div>
                  </div>
                  </div>
                  </div>
   
<!--
                  <div class='row'>
                  <div class="col-sm-4">
                  <div class="form-group">
                  <label for="lastname" class="col-md-12 control-label">Select Address location</label>
                  <div class="col-md-12">
                  <div id="map_canvas"></div>
                  <input type="text"  id="latlng" name='latlng' required  class="form-control" readonly /><br />
      
                  </div>
                  </div>
                  </div>
                  <div class="col-sm-4">
                  </div>

                  <div class="col-sm-4"></div>
                  </div>

-->





<?php 
$allre=$this->db->get('region')->result_array();
$admin_id=$this->session->userdata('admin_id');
      if($this->session->userdata('is_supper')==1)
      {
        $region=$allre;
      }
    else
    {

      $service_provider_id=$this->db->get_where('ci_admin',array('admin_id'=>$admin_id))->row()->service_provider_id;
      $region=explode(",",@$this->db->get_where('service_provider',array('id'=>$service_provider_id))->row()->region);
    }
        ?>
        <br><br>
                 <div class='row'>
                 
                   <div class="col-sm-4">
                  <div class="form-group">
                  <label for="region" class="col-md-12 control-label"><?= trans('region') ?></label>
                  <div class="col-md-12">
                      <select name="region"  required id='regions' class="form-control">
                        <option value=""><?= trans('select_region') ?></option>
                    <?php    if($this->session->userdata('is_supper')==1)
      { 
      foreach($region as $g): ?>
          <option  <?php if($i['region']==$g['id']) { echo "selected"; }?> value="<?= $g['id']; ?>"><?= $g['name']; ?>
        </option>
        <?php endforeach; ?>
      <?php 
      }
      else { 

    foreach($region as $g): ?>
                          <option  <?php if($i['region']==$g) { echo "selected"; }?> value="<?= $g ?>">
                           <?=$this->db->get_where('region',array('id'=>$g))->row()->name?>
                        </option>
                        <?php endforeach; ?>
            <?php } ?>
                        
                      </select>
                  </div>
                  </div>
                  
                  </div>
                 
                  <div class="col-sm-4" style="display:none;">
                  <div class="form-group">
                  <label for="caretaker_id"  class="col-md-12 control-label"><?= trans('Allocate_to_care_taker') ?></label>
                  <div class="col-md-12">
                      <select name="caretaker_id"  id='caretaker_id' class="form-control">
                        <option value=""><?= trans('select_caretaker') ?></option>
<!--                        <?php foreach($caretaker as $g): ?>
                          <option value="<?= $g['admin_id']; ?>"><?= $g['firstname']?>  <?= $g['lastname']; ?> </option>
                        <?php endforeach; ?>-->
                      </select>
                  </div>
                  </div>
                  
                  </div>
                  
                  </div>
                  
<?php //} ?>
        



                  <div class="form-group">
                    <div class="col-md-12">
                      <input type="submit" name="submit" value="<?= trans('update') ?>" class="btn btn-primary pull-right">
                    </div>
                  </div>
                  <?php echo form_close(); ?>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
          </div>  
        </div>
      </div>
    </section> 
  </div>
  

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {
    var yourStartLatLng = new google.maps.LatLng(53.307697, -6.222317);
    $('#map_canvas').gmap({'center': yourStartLatLng, zoom: 15})
    .bind('init', function(event, map) { 
        $(map).click( function(event) {
            var lat=event.latLng.lat();
            var lng=event.latLng.lng();
            $('#latlng').val(lat+', '+lng);
            
        });
    });
});





/*! jquery-ui-map rc1 | Johan Säll Larsson */
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1;};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p;}('(3(d){d.a=3(a,b){j c=a.w(".")[0],a=a.w(".")[1];d[c]=d[c]||{};d[c][a]=3(a,b){K.I&&2.16(a,b)};d[c][a].J=d.n({1A:c,1z:a},b);d.S[a]=3(b){j g="1y"===1D b,f=H.J.12.15(K,1),i=2;l(g&&"1C"===b.1B(0,1))9 i;2.13(3(){j h=d.Z(2,a);h||(h=d.Z(2,a,k d[c][a](b,2)));l(g&&(h=h[b].10(h,f),"4"===b||o!=h))i=h});9 i}};d.a("1x.1t",{r:{1s:"1r",1w:5},1v:3(a,b){l(b)2.r[a]=b,2.4("8").B(a,b);P 9 2.r[a]},16:3(a,b){2.C=b;a=a||{};m.n(2.r,a,{1e:2.D(a.1e)});2.1c();2.1j&&2.1j()},1c:3(){j a=2;2.q={8:k 6.7.1u(a.C,a.r),L:[],t:[],u:[]};6.7.s.1N(a.q.8,"1M",3(){d(a.C).19("1L",a.q.8)});a.F(a.r.1Q,a.q.8)},1d:3(a){j b=2.4("1i",k 6.7.1P);b.n(2.D(a));2.4("8").1O(b)},1K:3(a){j b=2.4("8").1G();9 b?b.1F(a.18()):!1},1E:3(a,b){2.4("8").1J[b].O(2.z(a))},1I:3(a,b){a.8=2.4("8");a.Y=2.D(a.Y);j c=k(a.1H||6.7.1k)(a),e=2.4("L");c.V?e[c.V]=c:e.O(c);c.1i&&2.1d(c.18());2.F(b,a.8,c);9 d(c)},y:3(a){2.G(2.4(a));2.B(a,[])},G:3(a){A(j b R a)a.U(b)&&(a[b]p 6.7.T?(6.7.s.X(a[b]),a[b].x&&a[b].x(o)):a[b]p H&&2.G(a[b]),a[b]=o)},1p:3(a,b,c){a=2.4(a);b.v=d.1l(b.v)?b.v:[b.v];A(j e R a)l(a.U(e)){j g=!1,f;A(f R b.v)l(-1<d.1n(b.v[f],a[e][b.1q]))g=!0;P l(b.11&&"1m"===b.11){g=!1;1o}c(a[e],g)}},4:3(a,b){j c=2.q;l(!c[a]){l(-1<a.2i(">")){A(j e=a.14(/ /g,"").w(">"),d=0;d<e.I;d++){l(!c[e[d]])l(b)c[e[d]]=d+1<e.I?[]:b;P 9 o;c=c[e[d]]}9 c}b&&!c[a]&&2.B(a,b)}9 c[a]},2h:3(a,b,c){j d=2.4("Q",a.2j||k 6.7.2l);d.M(a);d.2k(2.4("8"),2.z(b));2.F(c,d)},2d:3(){o!=2.4("Q")&&2.4("Q").2c()},B:3(a,b){2.q[a]=b},2e:3(){j a=2.4("8"),b=a.2g();d(a).17("2f");a.2m(b)},2r:3(){2.y("L");2.y("u");2.y("t");2.G(2.q);m.2s(2.C,2.2t)},F:3(a){a&&d.2o(a)&&a.10(2,H.J.12.15(K,1))},D:3(a){l(!a)9 k 6.7.N(0,0);l(a p 6.7.N)9 a;a=a.14(/ /g,"").w(",");9 k 6.7.N(a[0],a[1])},z:3(a){9!a?o:a p m?a[0]:a p 2n?a:d("#"+a)[0]},2q:3(a,b){j c=k 6.7[a](m.n({8:2.4("8")},b));2.4("t > "+a,[]).O(c);9 d(c)},2p:3(a,b){(!b?2.4("t > E",k 6.7.E):2.4("t > E",k 6.7.E(b,a))).M(m.n({8:2.4("8")},a))},2b:3(a,b,c){2.4("t > "+a,k 6.7.1X(b,m.n({8:2.4("8")},c)))},1W:3(a,b,c){j d=2,g=2.4("u > 1f",k 6.7.1f),f=2.4("u > 1g",k 6.7.1g);b&&f.M(b);g.1Y(a,3(a,b){"20"===b?(f.1Z(a),f.x(d.4("8"))):f.x(o);c(a,b)})},1S:3(a,b){2.4("8").1R(2.4("u > 1a",k 6.7.1a(2.z(a),b)))},1T:3(a,b){2.4("u > 1b",k 6.7.1b).1V(a,b)}});m.S.n({17:3(a){6.7.s.19(2[0],a);9 2},W:3(a,b,c){6.7&&2[0]p 6.7.T?6.7.s.1U(2[0],a,b):c?2.1h(a,b,c):2.1h(a,b);9 2},27:3(a){6.7&&2[0]p 6.7.T?a?6.7.s.26(2[0],a):6.7.s.X(2[0]):2.28(a);9 2}});m.13("2a 29 22 21 23 25 24".w(" "),3(a,b){m.S[b]=3(a,d){9 2.W(b,a,d)}})})(m);',62,154,'||this|function|get||google|maps|map|return||||||||||var|new|if|jQuery|extend|null|instanceof|instance|options|event|overlays|services|value|split|setMap|clear|_unwrap|for|set|el|_latLng|FusionTablesLayer|_call|_c|Array|length|prototype|arguments|markers|setOptions|LatLng|push|else|iw|in|fn|MVCObject|hasOwnProperty|id|addEventListener|clearInstanceListeners|position|data|apply|operator|slice|each|replace|call|_setup|triggerEvent|getPosition|trigger|StreetViewPanorama|Geocoder|_create|addBounds|center|DirectionsService|DirectionsRenderer|bind|bounds|_init|Marker|isArray|AND|inArray|break|find|property|roadmap|mapTypeId|gmap|Map|option|zoom|ui|string|pluginName|namespace|substring|_|typeof|addControl|contains|getBounds|marker|addMarker|controls|inViewport|init|bounds_changed|addListenerOnce|fitBounds|LatLngBounds|callback|setStreetView|displayStreetView|search|addListener|geocode|displayDirections|KmlLayer|route|setDirections|OK|mouseover|dblclick|mouseout|dragend|drag|clearListeners|removeEventListener|unbind|rightclick|click|loadKML|close|closeInfoWindow|refresh|resize|getCenter|openInfoWindow|indexOf|infoWindow|open|InfoWindow|setCenter|Object|isFunction|loadFusion|addShape|destroy|removeData|name'.split('|'),0,{}));

    </script>