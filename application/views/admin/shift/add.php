

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjlyTMFSZuwQMG2AA5aAsyUSmLWADqZuI&libraries=places"></script>  
<style>
    #map_canvas{
    width: 650px;
    height: 400px;
}

    </style> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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
          <!--  <a href="<?= base_url('admin/admin'); ?>" class="btn btn-success"><i class="fa fa-list"></i> <?= trans('admin_list') ?></a>
--></div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <!-- form start -->
                <div class="box-body">

                  <!-- For Messages -->
                  <?php $this->load->view('admin/includes/_messages.php') ?>

                  <?php echo form_open_multipart(base_url('admin/shift/add'), 'class="form-horizontal"');  ?> 
                  


                  <?php 

$participant=select('participant');
                  ?>

<div class="row">
      <div class="col-sm-4"><label for="firstname" class="col-md-12 control-label">participant_name</label>
      </div>
      <div class="col-sm-4">
     <div class="form-group">
      <div class="col-md-4">
        <select name="participant" requiredd="" class="form-control participant_name" id="selectp">
          <option value="">Please Select value</option>
         
         <?php
           foreach($participant as $rate) {  
           ?>
         <option value="<?=$rate['id']?>"><?=$rate['first_name']?> <?=$rate['last_name']?></option>
          <?php } ?>
        </select>
      </div>

      </div>
      
      </div> 
       <div class="col-sm-2">
       
               

       </div>
      
       
      <div class="col-sm-2">
      

      </div>
     
      </div>



                  <?php 
                  $allowance=select('allowance');
                  $employee_pay_rate=select('emppay_guide');
                  $emp=select('ci_admin',array('admin_role_id'=>7));
                  $dropdown=array(array('id'=>'Yes','name'=>'Yes'),array('id'=>'No','name'=>'No'));





                  $array=array(
                  //array('label'=>'participant_name','required'=>'requdddired','name'=>'participant_name','type'=>'text', 'value'=>''),
                  array('label'=>'date','name'=>'date','required'=>'requirded','type'=>'date', 'value'=>''),
                  );
                  echo create_formb($array);

?>

<div class="row">
                  <div class="col-sm-4">
                  <label for="firstname" class="col-md-12 control-label">shift_start</label>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <input type="time" value="" reqduired="" name="shift_start" class="form-control shift_start" id="time" placeholder="shift_start">
                  </div>
                  </div>
                  <div class="col-sm-4"></div>
                  
                  </div>



                  <div class="row">
                  <div class="col-sm-4">
                  <label for="firstname" class="col-md-12 control-label">shift_end</label>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                  <input type="time" value="" reqduired="" name="shift_end" class="form-control shift_end" id="time" placeholder="shift_end">
                  </div>
                  </div>
                  <div class="col-sm-4"></div>
                  
                  </div>


<?php

                  
                  $array=array(
                    //array('label'=>'participant_name','required'=>'requdddired','name'=>'participant_name','type'=>'text', 'value'=>''),
                  array('label'=>'shift_type','name'=>'shift_type','type'=>'text','required'=>'requdired', 'value'=>''),
                  //array('label'=>'create_a_split_shift','name'=>'create_a_split_shift','type'=>'select', 'dropdown'=>$dropdown,'required'=>'requdired', 'value'=>''),
                  array('label'=>'allowances','name'=>'allowances','type'=>'select','dropdown'=>$allowance, 'required'=>'rsequired','value'=>''),
                  array('label'=>'shift_location','name'=>'shift_location','type'=>'text','required'=>'requiredd', 'value'=>''),
                  array('label'=>'other_location','name'=>'other_location','type'=>'text','required'=>'requiredd', 'value'=>''),
                  //array('label'=>'select_employee','name'=>'select_employee','type'=>'select','required'=>'requiredd','dropdown'=>$emp, 'check_val'=>'admin_id','value'=>''),
                
                  );
                 echo create_formb($array);
               ?>



<div class="row">
      <div class="col-sm-4"><label for="firstname" class="col-md-12 control-label">select_employee</label>
      </div>
      <div class="col-sm-4">
     <div class="form-group">
      <div class="col-md-4">
        <select name="employee" requiredd="" class="form-control select_employee" id="select">
          <option value="">Please Select value</option>
         
         <?php
           foreach($emp as $rate) {  
           ?>
         <option value="<?=$rate['admin_id']?>"><?=$rate['firstname']?> <?=$rate['lastname']?></option>
          <?php } ?>
        </select>
      </div>

      </div>
      
      </div> 
       <div class="col-sm-2">
       
               

       </div>
      
       
      <div class="col-sm-2">
      

      </div>
     
      </div>







<div class="row">
      
      <div class="col-sm-4"><label for="firstname" class="col-md-12 control-label">employee_pay_rate</label>
      </div>
      <div class="col-sm-4">
     <div class="form-group">
      <div class="col-md-4">
        <select name="pay_rate" requiredd="" class="form-control employee_pay_rate" id="select">
          <option value="">Please Select value</option>
         
         <?php
           foreach($employee_pay_rate as $rate) {  
           ?>
         <option value="<?=$rate['id']?>"><?=$rate['hourly_rate']?>(Hourly Rate)</option>
          <?php } ?>
        </select>
      </div>

      </div>
      
      </div> 
       <div class="col-sm-2">
       


       </div>
      
       
       <div class="col-sm-2">
       

       </div>
      
       </div>




<div class="row">
      
      <div class="col-sm-4"><label for="firstname" class="col-md-12 control-label">Lat Long</label>
      
 <input type="text" class="form-control" id="latlng" size="40" /><br />
      </div>
    <div class="col-sm-4">
       

<div id="map_canvas"></div>


       </div>
       
      
       </div>
<br>

      
      <br>
                  <!-------->
                 <div class='row'>

<div class="col-md-6">
              </div>
  <div class="col-md-6">

  <div class="form-group">
  <input type="submit" name="submit" value="<?= trans('Add Split Shift') ?>" class="btn btn-primary pull-right">
  </div>
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

<script>

$(document).ready(function($) {
    $("#selectp").on('change', function() {
        var level = $(this).val();
      //  alert(level);
        if(level){
               $.ajax ({
                type: 'POST',
                url: '<?=base_url('admin/shift/get_participant_data')?>',
                data: { participant_id: '' + level + '' },
                success : function(htmlresponse) {
                const obj = JSON.parse(htmlresponse);  
                 var address=obj['address'];
                 var latlng=obj['latlng'];


    $('#latlng').val(latlng);
    $('input[name="shift_location"]').val(address);
  
    $('input[name="other_location"]').val(latlng);
      },error:function(e){
                alert("error");}
            });
        }
    });
});
    </script>