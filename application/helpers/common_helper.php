<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function uploadfile($name)
{

  if(@$_FILES[$name]['error']==0)
  {
  $ci =&get_instance();
  $config = array(
    'upload_path' => "./npadd/",
    'allowed_types' => "*",
    'overwrite' => TRUE,
    'file_name'=>'pcare_'.rand(23,343434).time()
    );
    $ci->load->library('upload', $config);
    if($ci->upload->do_upload($name))
    {
    $udata = $ci->upload->data();
    return array('status'=>true,'file'=>$udata['file_name']);
    }
    else
    {
    $err=$ci->upload->display_errors(); 
    return array('status'=>false,'error'=>$err);
    }
  }
  else
  {
    return array('status'=>false,'error'=>$name.' File not uploaded');
  }
}


function is_in_array($array, $key, $key_value){
  $within_array = 'no';
  foreach( $array as $k=>$v ){
    if( is_array($v) ){
        $within_array = is_in_array($v, $key, $key_value);
        if( $within_array == 'yes' ){
            break;
        }
    } else {
            if( $v == $key_value && $k == $key ){
                    $within_array = 'yes';
                    break;
            }
    }
  }
  return $within_array;
}


function get_latlong($address)
{
            $prepAddr = str_replace(' ','+',$address);
            $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false&key=AIzaSyBm46Na2pfh0csGP2bocMljHJ9q8xRbnk8&libraries');
            $output= json_decode($geocode);
            $lat = $output->results[0]->geometry->location->lat;
            $long = $output->results[0]->geometry->location->lng;
            $formatted_address=@$output->results[0]->formatted_address;
            return array('latlong'=>$lat.','.$long,'formatted_address'=>$formatted_address); 
}


function add_notification($array)
{
    $ci =&get_instance();
    $ci->db->insert('notification',$array);
    
$fcm_token=$ci->db->get_where('ci_admin',array('admin_id'=>$array['admin_id']))->row()->fcm_token;
if($fcm_token!='')
{
$data = array("to" =>$fcm_token, 
"notification" => array( "title" => $array['type'], "body" => $array['notification']));


$data_string = json_encode($data); 
$headers = array ( 'Authorization: key=AAAALa7Ilew:APA91bHdRxOl87sP5GUhR2N7zz4vzpSx7AL_-JJ7C5ZeL0BmOw0J7pE627C3iulCsDdI341fpsjzY6HY68ChIEJxiF5T_s1p_91O5ciZ5CkdRvz52KlApFaWescDVOwHTa0zSK20WH8I', 'Content-Type: application/json' ); 
$ch = curl_init(); curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' ); 
curl_setopt( $ch,CURLOPT_POST, true ); 
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers ); 
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true ); 
curl_setopt( $ch,CURLOPT_POSTFIELDS, $data_string); 
$result = curl_exec($ch); 
curl_close ($ch); 
}
}

function getAddress($latitude, $longitude)
{
        $url = "http://maps.google.com/maps/api/geocode/json?key=AIzaSyAjlyTMFSZuwQMG2AA5aAsyUSmLWADqZuI&latlng=$latitude,$longitude";
        $geocode = file_get_contents($url);
        $json = json_decode($geocode);
        $address = $json->results[0]->formatted_address;
        return $address;
}


function get_shift($participant_id,$date,$r=0,$emp='')
{
  $ci =&get_instance();
// if($r!=0)
// {
//   $data=$ci->db->get_where('shift',array('region'=>$r,'participant'=>$participant_id,'date'=>$date))->result_array();
// }
// else
// {

//  $data=$ci->db->get_where('shift',array('participant'=>$participant_id,'date'=>$date))->result_array();
// }


$ci->db->where('date',$date);
$ci->db->where('participant',$participant_id);
if($emp!='')
{
  $ci->db->where('employee',$emp);
}
if($r!=0)
{
  $ci->db->where('region',$r);
} 
$data=$ci->db->get('shift')->result_array();



 $put=array();
 foreach($data as $d)
 {
   if($d['status']==0)
   {
     $status='Awaiting confirmation';
     $class='pending';
     
   }
   elseif($d['status']==1)
   {
     $status='Shift Confirmed';
     $class='accepted';
   }
   else
   {
     $status='Shift Rejected';
     $class='rejected';
   }


   $push=array('shift_id'=>$d['id'],'shift_duration'=>$d['shift_duration'],'status'=>$status,'class'=>$class,
   'shift_start'=>$d['shift_start'],'shift_end'=>$d['shift_end'],'data'=>$d
  );
   array_push($put,$push);
   
 }
 if(!empty($put))
 {
 return $put;
 }
 
}


function get_single_shift($id)
{
  $ci =&get_instance();
 $data=$ci->db->get_where('shift',array('id'=>$id))->result_array();
 $put=array();
 foreach($data as $d)
 {
   if($d['status']==0)
   {
     $status='Awaiting confirmation';
     $class='pending';
     
   }
   elseif($d['status']==1)
   {
     $status='Shift Confirmed';
     $class='accepted';
   }
   else
   {
     $status='Shift Rejected';
     $class='rejected';
   }


   $push=array('shift_id'=>$d['id'],'latlog'=>$d['other_location'],'shift_location'=>$d['shift_location'],'date'=>$d['date'],'shift_duration'=>$d['shift_duration'],'status'=>$status,'class'=>$class,
   'shift_start'=>$d['shift_start'],'shift_end'=>$d['shift_end']
   );
  // array_push($put,$push);
   
 }
 if(!empty($push))
 {
 return $push;
 }
 else
 {
     return  array();
 }
 
}



function differenceInHours($startdate,$enddate){
	$starttimestamp = strtotime($startdate);
	$endtimestamp = strtotime($enddate);
	$difference = abs($endtimestamp - $starttimestamp)/3600;
	return $difference;
}


function create_alert($note_type_id,$input)
{
  $ci =&get_instance();
  $rt=array('note_id'=>$note_type_id,'user_id'=>$input['user_id'],'alert_text'=>$input['note'],'date'=>date('d-m-Y'),'time'=>date("h:i:s a"),'isread'=>0);


  $ci->db->insert('alert',$rt);

}

function getdate1()
{
  return strtotime(date('d-m-Y'));
}
function driskassessments($id)
{
  $ci=&get_instance();
  $ci->db->where('id',$id);
  $ci->db->delete('riskassessments');
  return true;
}



function dother_care_plan($id)
{
  $ci=&get_instance();
  $ci->db->where('id',$id);
  $ci->db->delete('other_care_plan');
  return true;
}

function create_other_assessment($array)
{
    $ci =&get_instance();
    $data['hazard_identified']=$array['hazard_identified'];
    $data['list_current_risk_control']=$array['list_current_risk_control'];
    $data['risk_rating']=$array['risk_rating'];
    $data['list_additional_control']=$array['list_additional_control'];
    $data['additonal_mesure_imp']=$array['additonal_mesure_imp'];
    $data['date_of_reassesment']=date('d-m-Y', strtotime('365 days')); 
    $data['date_of_creation']=$array['date_of_creation'];
    $data['user_id']=$array['user_id'];
    $data['status']=0;
    $ci->db->insert('riskassessments',$data);

}
function create_other_task($array)
{
  
  $ci =&get_instance();
  $data['user_id']=$array['user_id'];
  $data['cat_id']=$array['cat_id'];
  $data['task_for_careplan']=0;
  $data['task_name']=$array['taskname'];
  $data['every_days']=$data['add_specific_time_of_day']=$data['fortnightly_on']=$data['monthy_starting_on']=NULL;
  $data['every_months']=NULL;
  $data['add_specific_time_of_day']=NULL;
  $data['added_at']=time();
  $data['updated_at']='';
  $data['started_on']=date('Y-m-d');
 $ci->db->insert('task',$data); 
 
}
function create_other_plan($array)
{

  $ci =& get_instance();
  $in['user_id']=$array['user_id'];
  $in['care_plan']=$array['care_plan'];
  $in['service_provider']=@$array['service_provider'];
  $in['plan_review_date']='';
  $in['assesment_description']='';
  $in['stratergies']='';
  $in['add_task_for_support_worker']='No';
  $in['date']=time();
  $in['status']=0;
  $in['valid_till']=strtotime(date('d-m-Y', strtotime('365 days')));
  $ci->db->insert('other_care_plan',$in);
 
}


function create_form($array='')
{
    $text="";
    $form='';   
    foreach($array as $a)
    {
        if($a['type']=='time')
        {
          $text="
          <div class='row'>
          <div class='col-sm-6'>
          <div class='form-group'>
          <label for='firstname' class='col-md-12 control-label'>".trans($a['name'])."</label>
          <div class='col-md-12'>
          <input type='".$a['type']."' value='".$a['value']."'  required name='".$a['name']."' class='form-control ".$a['name']."' id='".$a['type']."' placeholder=''>
          </div>
          </div>
           </div>
          </div>";
           $form=$form.$text;
        }
    
        if($a['type']=='text')
    {
      $text="
      <div class='row'>
      <div class='col-sm-6'>
      <div class='form-group'>
      <label for='firstname' class='col-md-12 control-label'>".trans($a['name']);
      if(@$a['hint'])
      {
        $text .="(".$a['hint'].")";
      }
      $text .="</label>
      <div class='col-md-12'>
      <input type='".$a['type']."' value='".$a['value']."'  required name='".$a['name']."' class='form-control ".$a['name']."' id='".$a['type']."' placeholder=''>
      </div>
      </div>
       </div>
      </div>";
       $form=$form.$text;
    }

    if($a['type']=='hidden')
    {
      $text="
      <input type='".$a['type']."' value='".$a['value']."'  required name='".$a['name']."' class='form-control ".$a['name']."' id='".$a['type']."' placeholder=''>
      ";
       $form=$form.$text;
    }
    
    if($a['type']=='date')
    {
      $text="
      <div class='row'>
      <div class='col-sm-6'>
      <div class='form-group'>
      <label for='firstname' class='col-md-12 control-label'>".trans($a['name'])."</label>
      <div class='col-md-12'>
      <input type='".$a['type']."' value='".$a['value']."'  required name='".$a['name']."' class='form-control ".$a['name']."' id='".$a['type']."' placeholder=''>
      </div>
      </div>
       </div>
      </div>";
       $form=$form.$text;
    }
    

    if($a['type']=='textarea')
    {
      $text="
      <div class='row'>
      <div class='col-sm-6'>
      <div class='form-group'>
      <label for='firstname' class='col-md-12 control-label'>".trans($a['name'])."</label>
      <div class='col-md-12'>
      <textarea type='".$a['type']."' value='".$a['value']."'  required name='".$a['name']."' class='form-control ".$a['name']."' 
      id='".$a['type']."' placeholder=''>".$a['value']."</textarea>
      </div>
      </div>
       </div>
      </div>";
       $form=$form.$text;
    }

    if($a['type']=='select')
    {
    $dropdown=$a['dropdown'];
      $option='<option value="">Please Select value</option>';
      $selected='';
      foreach($dropdown as $d)
      {
          if($d['id']==$a['value'])
          {
              $selected='selected';
          }
          else
          {
            $selected='';

          }
        $option=$option.'<option  '.$selected.' value="'.$d['id'].'">'.$d['name'].'</option>';
      }
    
      $text="
      <div class='row'>
      <div class='col-sm-6'>
    
      <div class='form-group'>
      <label for='firstname' class='col-md-12 control-label'>".trans($a['name'])."</label>
      <div class='col-md-12'><select name='".$a['name']."' required class='form-control ".$a['name']."' id='".$a['type']."'>".$option."</select>
      </div>
      </div>
       </div>
      </div>";
      $form=$form.$text;
    }


    if($a['type']=='checkbox')
    {
    $dropdown=$a['dropdown'];
      $option='';
      $selected='';
      foreach($dropdown as $d)
      {
          if($d['id']==$a['value'])
          {
              $selected='checked';
          }
          else
          {
            $selected='';
          }
        $option=$option.'<input type="checkbox" class='.$a['name'].' name='.$a['name'].'[] '.$selected.' value="'.$d['name'].'">'.$d['name'].'</input>';
      }
    
      $text="
      <div class='row'>
      <div class='col-sm-6'>
    
      <div class='form-group'>
      <label for='firstname' class='col-md-12 control-label'>".trans($a['name'])."</label>
      <div class='col-md-12'>".$option."
      </div>
      </div>
       </div>
      </div>";
      $form=$form.$text;
    }
    

    
    if($a['type']=='radio')
    {
      $dropdown=$a['dropdown'];
      $option='';
      $selected='';
      foreach($dropdown as $d)
      {
          if($d['id']==$a['value'])
          {
              $sel='checked=checked';
          }
          else
          {
            $sel='';
          }
          
        $option=$option.'<input  type="radio" class='.$a['name'].'  '.$sel.'  name='.$a['name'].' value="'.$d['name'].'">'.$d['name'].'</input>';
      }
    
      $text="
      <div class='row'>
      <div class='col-sm-6'>
    
      <div class='form-group'>
      <label for='firstname' class='col-md-12 control-label'>".trans($a['name'])."</label>
      <div class='col-md-12'>".$option."
      </div>
      </div>
       </div>
      </div>";
      $form=$form.$text;
    }
    


    }
   return $form;
    

}



function create_formb($array='')
{
    $text="";
    $form='';   
    foreach($array as $a)
    {
      if($a['type']=='file')
      {
        $text="
        <div class='row'>
        <div class='col-sm-4'>
        <label for='firstname' class='col-md-12 control-label'>".trans($a['label'])."</label>
        </div>
        <div class='col-md-4'>
        <div class='form-group'>
        <input type='file'  ".$a['required']." name='".$a['name']."' class='form-control ".$a['name']."' id='".$a['type']."' placeholder='".trans($a['label'])."'>
        </div>
        </div>
        <div class='col-sm-4'></div>
        
        </div>
        ";
         $form=$form.$text;
      }
  

        if($a['type']=='time')
        {
          $text="
          <div class='row'>
          <div class='col-sm-4'>
          <label for='firstname' class='col-md-12 control-label'>".trans($a['label'])."</label>
          </div>
          <div class='col-md-4'>
          <div class='form-group'>
          <input type='".$a['type']."' value='".$a['value']."'  ".$a['required']." name='".$a['name']."' class='form-control ".$a['name']."' id='".$a['type']."' placeholder='".trans($a['label'])."'>
          </div>
          </div>
          <div class='col-sm-4'></div>
          
          </div>
          ";
           $form=$form.$text;
        }
    
      if($a['type']=='text')
      {
        $text="
        <div class='row'>
        <div class='col-sm-4'>
        <label for='firstname' class='col-md-12 control-label'>".trans($a['label'])."</label>
        </div>
        <div class='col-md-4'>
        <div class='form-group'>
        <input type='".$a['type']."' value='".$a['value']."'  ".$a['required']." name='".$a['name']."' class='form-control ".$a['name']."' id='".$a['type']."' placeholder='".trans($a['label'])."'>
        </div>
        </div>
        <div class='col-sm-4'></div>
        </div>
        ";
       $form=$form.$text;
    }

    if($a['type']=='hidden')
    {
      $text="
      <input type='".$a['type']."' value='".$a['value']."'  ".$a['required']." name='".$a['name']."' class='form-control ".$a['name']."' id='".$a['type']."' placeholder=''>
      ";
       $form=$form.$text;
    }
    
    if($a['type']=='date')
    {$text="
        <div class='row'>
        <div class='col-sm-4'>
        <label for='firstname' class='col-md-12 control-label'>".trans($a['label'])."</label>
        </div>
        <div class='col-md-4'>
        <div class='form-group'>
        <input type='".$a['type']."' value='".$a['value']."'  ".$a['required']." name='".$a['name']."' class='form-control ".$a['name']."' id='".$a['type']."' placeholder=''>
        </div>
        </div>
        <div class='col-sm-4'></div>
        </div>
        ";
       $form=$form.$text;
    }
    

    if($a['type']=='textarea')
    {

      $text="
          <div class='row'>
          <div class='col-sm-4'>
          <label for='firstname' class='col-md-12 control-label'>".trans($a['label'])."</label>
          </div>
          <div class='col-md-4'>
          <div class='form-group'>
          
      <textarea type='".$a['type']."' value='".$a['value']."'  ".$a['required']." name='".$a['name']."' class='form-control ".$a['name']."' 
      id='".$a['type']."' placeholder=''>".$a['value']."</textarea></div>
          </div> 
          <div class='col-sm-4'></div>
          </div>
          ";
       $form=$form.$text;
    }

    if($a['type']=='select')
    {
    $dropdown=$a['dropdown'];
      $option='<option value="">Please Select value</option>';
      $selected='';
      foreach($dropdown as $d)
      {
          if($d['id']==$a['value'])
          {
              $selected='selected';
          }
          else
          {
            $selected='';

          }
        $option=$option.'<option  '.$selected.' value="'.$d['id'].'">'.$d['name'].'</option>';
      }
    
if(isset($a['free_text'])){
      $free="<input type='text' value=''   name='".$a['free_text']."' class='form-control ".$a['free_text']."' id='".$a['free_text']."' placeholder='".trans($a['free_text'])."'>";
}
else{
  $free='';
}        

      $text="
      <div class='row'>
      
      <div class='col-sm-4'><label for='firstname' class='col-md-12 control-label'>".trans($a['label'])."</label>
      </div>
      <div class='col-sm-4'>
     <div class='form-group'>
      <div class='col-md-4'><select name='".$a['name']."' ".$a['required']." class='form-control ".$a['name']."' id='".$a['type']."'>".$option."</select>
      </div>

      </div>
      
      </div> 
       <div class='col-sm-2'>
       
".$free."

       </div>
      
       
       <div class='col-sm-2'>
       

       </div>
      
       </div>";
      $form=$form.$text;
    }



    if($a['type']=='selectb')
    {
    $dropdown=$a['dropdown'];
      $option='<option value="">***Please  Select value</option>';
      $selected='';
      foreach($dropdown as $d)
      {
          if($d['id']==$a['value'])
          {
              $selected='selected';
          }
          else
          {
            $selected='';

          }
        $option=$option.'<option  '.$selected.' value="'.$d['name'].'">'.$d['name'].'</option>';
      }
  
      
      
if(isset($a['free_text'])){
      $free="<input type='text' value=''   name='".$a['free_text']."' class='form-control ".$a['free_text']."' id='".$a['free_text']."' placeholder='".trans($a['free_text'])."'>";
}
else{
  $free='';
}        

      $text="
      <div class='row'>
      
      <div class='col-sm-4'><label for='firstname' class='col-md-12 control-label'>".trans($a['label'])."</label>
      </div>
      <div class='col-sm-4'>
     <div class='form-group'>
      <div class='col-md-4'><select name='".$a['name']."' ".$a['required']." class='form-control ".$a['name']."' id='".$a['type']."'>".$option."</select>
      </div>

      </div>
      
      </div> 
       <div class='col-sm-2'>
       
".$free."

       </div>
      
       
       <div class='col-sm-2'>
       

       </div>
      
       </div>";
      $form=$form.$text;
    }




    if($a['type']=='checkbox')
    {
      
    $dropdown=$a['dropdown'];
      $option='';
      $selected='';
     /* foreach($dropdown as $d)
      {
          if($d['id']==$a['value'])
          {
              $selected='checked';
          }
          else
          {
            $selected='';
          }
        $option=$option.'<br><input type="checkbox" class='.$a['name'].' name='.$a['name'].'[]'.$selected.' value="'.$d['id'].'"><label for="firstname" class="col-md-12 control-label">'.$d['name'].'</label></input>';
      }

      $text="
      <div class='row'>
      <div class='col-sm-2'>
      <label for='firstname' class='col-md-12 control-label'>".trans($a['label'])."</label>
      </div>
      <div class='form-group'>
      <div class='col-md-10'>".$option."</div>
       </div> 
      </div>";
      $form=$form.$text;


*/
      $text="<div class='row'>
      <div class='col-sm-4'>
      <label for='firstname' class='col-md-12 control-label'>".$a['label']."</label>
      </div>
      <div class='form-group'>
      <div class='col-md-8'>";
     $in='';
      foreach($dropdown as $d)
      {  
  
    $in=$in."<label fors='".$d['name']."' class='col-md-12 control-label'>
    <input class='".$a['name']."'  name='".$a['name']."[]' value='".$d['name']."' id='".$d['name']."' type='checkbox'>
    </input>".$d['name']."</label>";
      
     } 
      
     $text=$text.$in.'</div>
    </div> 
     </div>';

     $form=$form.$text;

    }
    

    
    if($a['type']=='radio')
    {
    $dropdown=$a['dropdown'];
      $option='';
      $selected='';
     /*
      foreach($dropdown as $d)
      {
          if($d['id']==$a['value'])
          {
              $selected='checked';
          }
          else
          {
            $selected='';
          }
        $option=$option.'<input type="radio" class='.$a['name'].'  name='.$a['name'].' '.$selected.' value="'.$d['name'].'">'.$d['label'].'</input>';
      }
    
      $text="
      <div class='row'>
      <div class='col-sm-64
      <div class='form-group'>
      <label for='firstname' class='col-md-12 control-label'>".trans($a['name'])."</label>
      <div class='col-md-4'>".$option."
      </div>
      </div>
       </div> 
       <div class='col-sm-4'></div>
      </div>";
      $form=$form.$text;
      */
      $text="<div class='row'>
      <div class='col-sm-4'>
      <label for='firstname' class='col-md-12 control-label'>".$a['label']."</label>
      </div>
      <div class='form-group'>
      <div class='col-md-8'>";
     $in='';
      foreach($dropdown as $d)
      {  
        if($d['id']==$a['value'])
        {
            $selected='checked';
        }
        else
        {
          $selected='';
        }
    $in=$in."<label fors='".$d['name']."' class='col-md-12 control-label'>
    <input '.$selected.' class='".$a['name']."'  name='".$a['name']."' value='".$d['name']."' id='".$d['name']."' type='radio'>
    </input>".$d['name']."</label>";
      
     } 
      
     $text=$text.$in.'</div>
    </div> 
     </div>';

     $form=$form.$text;

    }
    


    }
   return $form;
    

}

function create_formc($array='')
{
    $text="";
    $form='';   
    foreach($array as $a)
    {
      if($a['type']=='file')
      {
        $text="
        <div class='row'>
        <div class='col-sm-4'>
        <label for='firstname' class='col-md-12 control-label'>".trans($a['label'])."</label>
        </div>
        <div class='col-md-8'>
        <div class='form-group'>
        <input type='file'  ".$a['required']." name='".$a['name']."' class='form-control ".$a['name']."' id='".$a['type']."' placeholder='".trans($a['label'])."'>
        </div>
        </div>
      
        
        </div>
        ";
         $form=$form.$text;
      }
  

        if($a['type']=='time')
        {
          $text="
          <div class='row'>
          <div class='col-sm-4'>
          <label for='firstname' class='col-md-12 control-label'>".trans($a['label'])."</label>
          </div>
          <div class='col-md-8'>
          <div class='form-group'>
          <input type='".$a['type']."' value='".$a['value']."'  ".$a['required']." name='".$a['name']."' class='form-control ".$a['name']."' id='".$a['type']."' placeholder='".trans($a['label'])."'>
          </div>
          </div>
       
          
          </div>
          ";
           $form=$form.$text;
        }
    
      if($a['type']=='text')
      {
        $text="
        <div class='row'>
        <div class='col-sm-4'>
        <label for='firstname' class='col-md-12 control-label'>".trans($a['label'])."</label>
        </div>
        <div class='col-md-8'>
        <div class='form-group'>
        <input type='".$a['type']."' value='".$a['value']."'  ".$a['required']." name='".$a['name']."' class='form-control ".$a['name']."' id='".$a['type']."' placeholder='".trans($a['label'])."'>
        </div>
        </div>

        </div>
        ";
       $form=$form.$text;
    }

    if($a['type']=='hidden')
    {
      $text="
      <input type='".$a['type']."' value='".$a['value']."'  ".$a['required']." name='".$a['name']."' class='form-control ".$a['name']."' id='".$a['type']."' placeholder=''>
      ";
       $form=$form.$text;
    }
    
    if($a['type']=='date')
    {$text="
        <div class='row'>
        <div class='col-sm-4'>
        <label for='firstname' class='col-md-12 control-label'>".trans($a['label'])."</label>
        </div>
        <div class='col-md-8'>
        <div class='form-group'>
        <input type='".$a['type']."' value='".$a['value']."'  ".$a['required']." name='".$a['name']."' class='form-control ".$a['name']."' id='".$a['type']."' placeholder=''>
        </div>
        </div>

        </div>
        ";
       $form=$form.$text;
    }
    

    if($a['type']=='textarea')
    {

      $text="
          <div class='row'>
          <div class='col-sm-4'>
          <label for='firstname' class='col-md-12 control-label'>".trans($a['label'])."</label>
          </div>
          <div class='col-md-12'>
          <div class='form-group'>
          
      <textarea type='".$a['type']."' value='".$a['value']."'  ".$a['required']." name='".$a['name']."' class='form-control ".$a['name']."' 
      id='".$a['type']."' placeholder=''>".$a['value']."</textarea></div>
          </div> 
          
          </div>
          ";
       $form=$form.$text;
    }

    if($a['type']=='select')
    {
    $dropdown=$a['dropdown'];
      $option='<option value="">Please Select value</option>';
      $selected='';
      foreach($dropdown as $d)
      {
          if($d['id']==$a['value'])
          {
              $selected='selected';
          }
          else
          {
            $selected='';

          }
        $option=$option.'<option  '.$selected.' value="'.$d['id'].'">'.$d['name'].'</option>';
      }
    
if(isset($a['free_text'])){
      $free="<input type='text' value=''   name='".$a['free_text']."' class='form-control ".$a['free_text']."' id='".$a['free_text']."' placeholder='".trans($a['free_text'])."'>";
}
else{
  $free='';
}        

      $text="
      <div class='row'>
      
      <div class='col-sm-4'><label for='firstname' class='col-md-12 control-label'>".trans($a['label'])."</label>
      </div>
      <div class='col-sm-5'>
     <div class='form-group'>
      <div class='col-md-12'><select name='".$a['name']."' ".$a['required']." class='form-control ".$a['name']."' id='".$a['type']."'>".$option."</select>
      </div>

      </div>
      
      </div> 
       <div class='col-sm-3'>
       
".$free."

       </div>
      
       
     
      
       </div>";
      $form=$form.$text;
    }



    if($a['type']=='selectb')
    {

      $dropdown=$a['dropdown'];
      $option='<option value="">***Please  Select value</option>';
      $selected='';
      foreach($dropdown as $d)
      {
          if($d['id']==$a['value'])
          {
              $selected='selected';
          }
          else
          {
            $selected='';

          }
        $option=$option.'<option  '.$selected.' value="'.$d['name'].'">'.$d['name'].'</option>';
      }
  
      
      
if(isset($a['free_text'])){
      $free="<input type='text' value=''   name='".$a['free_text']."' class='form-control ".$a['free_text']."' id='".$a['free_text']."' placeholder='".trans($a['free_text'])."'>";
}
else{
  $free='';
}        

      $text="
      <div class='row'>
      
      <div class='col-sm-4'><label for='firstname' class='col-md-12 control-label'>".trans($a['label'])."</label>
      </div>
      <div class='col-sm-4'>
     <div class='form-group'>
      
      <select name='".$a['name']."' ".$a['required']." class='form-control ".$a['name']."' id='".$a['type']."'>".$option."</select>
     
      </div>
      
      </div> 
       <div class='col-sm-4'>
       
".$free."

       </div>
      
       
  
      
       </div>";
      $form=$form.$text;
    }




    if($a['type']=='checkbox')
    {
      $dropdown=$a['dropdown'];
      $option='';
      $selected='';
      $text="<div class='row'>
      <div class='col-sm-4'>
      <label for='firstname' class='col-md-12 control-label'>".$a['label']."</label>
      </div>
      <div class='form-group'>
      <div class='col-md-8'>";
     $in='';
      foreach($dropdown as $d)
      {  
      $in=$in."<label fors='".$d['name']."' class='col-md-12 control-label'>
      <input class='".$a['name']."'  name='".$a['name']."[]' value='".$d['name']."' id='".$d['name']."' type='checkbox'>
      </input>".$d['name']."</label>";
     } 
     $text=$text.$in.'</div>
    </div> 
    </div>';

  

    $form=$form.$text;

    }
    

    
    if($a['type']=='radio')
    {
    $dropdown=$a['dropdown'];
      $option='';
      $selected='';
     /*
      foreach($dropdown as $d)
      {
          if($d['id']==$a['value'])
          {
              $selected='checked';
          }
          else
          {
            $selected='';
          }
        $option=$option.'<input type="radio" class='.$a['name'].'  name='.$a['name'].' '.$selected.' value="'.$d['name'].'">'.$d['label'].'</input>';
      }
    
      $text="
      <div class='row'>
      <div class='col-sm-64
      <div class='form-group'>
      <label for='firstname' class='col-md-12 control-label'>".trans($a['name'])."</label>
      <div class='col-md-4'>".$option."
      </div>
      </div>
       </div> 
       <div class='col-sm-4'></div>
      </div>";
      $form=$form.$text;
      */
      $text="<div class='row'>
      <div class='col-sm-2'>
      <label for='firstname' class='col-md-12 control-label'>".$a['label']."</label>
      </div>
     
      ";
     $in='';
      foreach($dropdown as $d)
      {  
        if($d['id']==$a['value'])
        {
            $selected='checked';
        }
        else
        {
          $selected='';
        }
    $in=$in."<div class='col-sm-12'>  <div class='form-group'><label fors='".$d['name']."' class='col-md-6 control-label'>
    <input '.$selected.' class='".$a['name']."'  name='".$a['name']."' value='".$d['name']."' id='".$d['name']."' type='radio'>
    </input>".$d['name']."</label></div> 
    </div>";
      
     } 
      
     $text=$text.$in.'</div>
    ';

     $form=$form.$text;

    }
    


    }
   return $form;
    

}


function  hoursRange( $lower = 0, $upper = 86400, $step = 3600, $format = '' ) {
    $times = array();

    if ( empty( $format ) ) {
        $format = 'g:i a';
    }

    foreach ( range( $lower, $upper, $step ) as $increment ) {
        $increment = gmdate( 'H:i', $increment );

        list( $hour, $minutes ) = explode( ':', $increment );

        $date = new DateTime( $hour . ':' . $minutes );

        $times[(string) $increment] = $date->format( $format );
    }

    return $times;
}


function get_otp()
{
$r=rand(1000,9999);
    return 1111;
}
function pd($a)
{
    echo '<pre>';
    print_r($a);
    die();
}

function json_output($statusHeader,$response)
{
    $ci =& get_instance();
    $ci->output->set_content_type('application/json');
    $ci->output->set_status_header($statusHeader);
    $ci->output->set_output(json_encode($response));
}


function json_output_object($statusHeader,$response)
{
    $ci =& get_instance();
    $ci->output->set_content_type('application/json');
    $ci->output->set_status_header($statusHeader);
    $ci->output->set_output(json_encode($response,JSON_FORCE_OBJECT));
}


function check_auth_client() {
   
    return true;
    $client_service = "smartschool";
    $auth_key = "schoolAdmin@";

    $ci =& get_instance();
    $client_service = $ci->input->get_request_header('Client-Service', true);
      $auth_key = $ci->input->get_request_header('Auth-Key', true);
     
          if ($client_service == $client_service && $auth_key == $auth_key) 
          {
              return true;
          }
          else 
          {
              return json_output(401, array('status' => 401, 'message' => 'Unauthorized.'));
          }
      }

      

function input()
{
      return json_decode(file_get_contents('php://input'), true);
}


function calculate_age($date)
{
    return $diff = (date('Y') - date('Y',strtotime($date)));

}

 function get_participant_region_by_id($participant_id)
{
 $user_id=@select('participant',array('id'=>$participant_id))[0]['added_by_admin_id'];
 if($user_id)
 {
$service_provider_id=@select('ci_admin',array('admin_id'=>$user_id))[0]['service_provider_id'];
if($service_provider_id)
 {
 $ch=@select('service_provider',array('id'=>$service_provider_id))[0]['region'];
 $ch=explode(',',$ch);
 $ar=array();
 foreach($ch as $key=>$c) 
 {
 $rr=@select('region',array('id'=>$c))[0]['name'];
 array_push($ar,$rr);
 }
 return implode(',',$ar);
 }
 else
 {
 return false;
 }
 }
 else
 {
  return false;
 }
}
function lv($page,$data)
{

    $folderdata=explode('/',$page);
    $folder=$folderdata[0];
    if (!is_dir('application/views/admin/'.$folder)) {
        mkdir('application/views/admin/'.$folder, 0777, TRUE);
        $file='application/views/admin/'.$folder.'/'.$folderdata[1].'.php';
        fopen($file, "w");
        
        $file='application/views/admin/'.$folder.'/list.php';
        fopen($file, "w");


        
        $file='application/views/admin/'.$folder.'/add.php';
        fopen($file, "w");

        
        $file='application/views/admin/'.$folder.'/edit.php';
        fopen($file, "w");
        
    }
    $file='application/views/admin/'.$page.'.php';
  if(!file_exists($file))
  {
    fopen($file, "w");
      
  }



        $ci = & get_instance();
        $ci->load->view('admin/includes/_header');
		$ci->load->view('admin/'.$page, $data);
		$ci->load->view('admin/includes/_footer');
}

function mlv($page,$data)
{

    $folderdata=explode('/',$page);
    $folder=$folderdata[0];
    if (!is_dir('application/views/manager/'.$folder)) {
        mkdir('application/views/manager/'.$folder, 0777, TRUE);
        $file='application/views/manager/'.$folder.'/'.$folderdata[1].'.php';
        fopen($file, "w");
        
        $file='application/views/manager/'.$folder.'/list.php';
        fopen($file, "w");


        
        $file='application/views/manager/'.$folder.'/add.php';
        fopen($file, "w");

        
        $file='application/views/manager/'.$folder.'/edit.php';
        fopen($file, "w");
        
    }
    $file='application/views/manager/'.$page.'.php';
  if(!file_exists($file))
  {
    fopen($file, "w");
      
  }



        $ci = & get_instance();
        $ci->load->view('manager/includes/_header');
		$ci->load->view('manager/'.$page, $data);
		$ci->load->view('manager/includes/_footer');
}


function check_region_is_yes_or_no($ch)
{
    $ci = & get_instance();
    $ch=explode(',',$ch);
    $ar=array();
    foreach($ch as $c) 
    {
       $rr=array($ci->db->get_where('region',array('id'=>$c))->row()->name);
        array_merge($ar,$rr);
    }
    return implode(',',$ar);
}




function select($table,$array='')
{
$ci = & get_instance();

if($array)
{
$return=$ci->db->get_where($table,$array)->result_array();
}
else
{
    $return=$ci->db->get($table)->result_array();
}
return $return;
}


function selecto($table,$array='')
{
$ci = & get_instance();

if($array)
{
$return=$ci->db->get_where($table,$array)->result();
}
else
{
    $return=$ci->db->get($table)->result();
}
return $return;
}


function insert($table,$array)
{
    $ci = & get_instance();
     $ci->db->insert($table,$array);
 return $ci->db->insert_id();
}


// -----------------------------------------------------------------------------
// Get Language by ID
function get_lang_name_by_id($id)
{
    $ci = & get_instance();
    $ci->db->where('id',$id);
    return $ci->db->get('ci_language')->row_array()['name'];
}


function get_input_by_id($id)
{
    $ci = & get_instance();
    return $ci->db->get_where('care_inputtype',array('id'=>$id))->row()->name;
}


// -----------------------------------------------------------------------------
// Get Language Short Code
function get_lang_short_code($id)
{
    $ci = & get_instance();
    $ci->db->where('id',$id);
    return $ci->db->get('ci_language')->row_array()['short_name'];
}

// -----------------------------------------------------------------------------
// Get Language List
function get_language_list()
{
    $ci = & get_instance();
    $ci->db->where('status',1);
    return $ci->db->get('ci_language')->result_array();
}

// -----------------------------------------------------------------------------
// Get country list
function get_country_list()
{
    $ci = & get_instance();
    return $ci->db->get('ci_countries')->result_array();
}

// -----------------------------------------------------------------------------
// Get country name by ID
function get_country_name($id)
{
    $ci = & get_instance();
    return $ci->db->get_where('ci_countries', array('id' => $id))->row_array()['name'];
}

// -----------------------------------------------------------------------------
// Get City ID by Name
function get_country_id($title)
{
    $ci = & get_instance();
    return $ci->db->get_where('ci_countries', array('slug' => $title))->row_array()['id'];
}

// -----------------------------------------------------------------------------
// Get country slug
function get_country_slug($id)
{
    $ci = & get_instance();
    return $ci->db->get_where('ci_countries', array('id' => $id))->row_array()['slug'];
}

// -----------------------------------------------------------------------------
// Get country's states
function get_country_states($country_id)
{
    $ci = & get_instance();
    return $ci->db->select('*')->where('country_id',$country_id)->get('ci_states')->result_array();
}

// -----------------------------------------------------------------------------
// Get state's cities
function get_state_cities($state_id)
{
    $ci = & get_instance();
    return $ci->db->select('*')->where('state_id',$state_id)->get('ci_cities')->result_array();
}

// Get state name by ID
function get_state_name($id)
{
    $ci = & get_instance();
    return $ci->db->get_where('ci_states', array('id' => $id))->row_array()['name'];
}

// -----------------------------------------------------------------------------
// Get city name by ID
function get_city_name($id)
{
    $ci = & get_instance();
    return $ci->db->get_where('ci_cities', array('id' => $id))->row_array()['name'];
}

// -----------------------------------------------------------------------------
// Get city ID by title
function get_city_slug($id)
{
    $ci = & get_instance();
    return $ci->db->get_where('ci_cities', array('id' => $id))->row_array()['slug'];
}

/**
 * Generic function which returns the translation of input label in currently loaded language of user
 * @param $string
 * @return mixed
 */
function trans($string)
{
    $ci =& get_instance();
    $r=$ci->lang->line($string);
    if($r=='')
    {
        return  $string;
    }
    else
    {
        return $r;
    }
}