<?php


function getMenus(){

     $user_menus = [];
     $menus = auth()->user()->menus()->where('url','=','#')->get();

     foreach ($menus as $menu){

         if ($menu->url == "#"){

             $subs = json_decode($menu->sup);

             foreach ($subs as $sub){
                $user_menus[] = $sub;
            }
         }else{
             $user_menus[]=$menu->id;
         }
     }

     $menus = auth()->user()->menus()->whereNotIn('id',$user_menus)
         ->orderby(DB::raw('case when url= "/" then 1 when url="#" then 2 else 3 end'))->get();



     if (auth()->user()->admin == 1){
         $menus = \App\Menu::where('primary',1)->get();
     }
     return $menus;
}




function getSubsMenu($subs_ids){

    $ids = json_decode($subs_ids);
    $menus = \App\Menu::whereIn('id',$ids)->get();
    return $menus;

}



function isAdmin(){

    if (auth()->user()->admin == 1){
        return true;
    }

    return false;
}


function getAuthUsers()
{
    $users = auth()->user();
    $user_data = $users->presidents()->pluck('id')->toArray();
    $user_data[] =$users->id;
    return $user_data;
}

function getAuthRole()
{
    if (auth()->user()->admin === 1) {
        return "admin";
    }elseif (auth()->user()->manger === 1) {
        return "manger";
    }else{
        return "user";
    }
}







function getDeviceById($user_id,$find="*") {

    switch (getAuthRole()) {

        case "admin":
            $device = App\Device::select($find)->get();
            //dd($device);
        break;
        case "manger":
            $getAuthUsers=getAuthUsers();
            $devicee = App\User::whereIn('id', $getAuthUsers)->with('devices')->select($find)->get();
            //dd($devicee);
            $device = [];
            foreach ($devicee as $dev){
                foreach ($dev->devices as $all){
                    $device[] = $all;
                }
            }

           // $device = \App\User::whereIn('id', $getAuthUsers)->devices()->select($find);
           return $device;
        break;
        default:
            $getAuthUsers=getAuthUsers();
            //dd('user');
        if(in_array($user_id,$getAuthUsers)){
            $device = \App\User::where('id',$user_id)->devices()->select($find)->get();
        }
    }
    return $device;
}





function getUserUsers($model,$selects)
{

    $user = auth()->user();
    if ($user->admin == 1){

        return $model->where('id','!=',$user->id)->select($selects);
    }

    return $user->presidents()->where('id','!=',$user->id)->select($selects);

}


function getUserGeofences($model,$selects)
{

    $user = auth()->user();
    if ($user->admin == 1){

        return $model->select($selects);
    }

    return $user->geofence()->select($selects);

}






function getUserDevicesForMap($model,$selects)
{

    $user = auth()->user();
    if ($user->admin == 1){

        return $model->select($selects)->with('location','type');
    }

    return $user->devices()->select($selects);
}



function getUserDevices($model,$selects)
{

    $user = auth()->user();
    if ($user->admin == 1){

        return $model->select($selects);
    }

    return $user->devices()->select($selects);

}



function getUserDrivers($model,$selects)
{

    $user = auth()->user();
    if ($user->admin == 1){

        return $model->select($selects);
    }

    return $user->drivers()->select($selects);

}




function getUserGroups($model,$selects)
{

    $user = auth()->user();
    if ($user->admin == 1){

        return $model->select($selects);
    }

    return $user->groups()->select($selects);

}



function getUserContainers($model,$selects)
{

    $user = auth()->user();
    if ($user->admin == 1){

        return $model->select($selects);
    }

    return $user->containers()->select($selects);

}




function getData($model,$selects,$relation){
    $user = auth()->user();

    if ($user->admin == 1){

        return $model->select($selects);
    }


    return $user->$relation()->select($selects);

}



function usersBelongsToCurrentAuth(){

    $presidents = auth()->user()->presidents;

    $users_ids = [];
    foreach ($presidents as $user){
        foreach ($user->presidents as $belongs_user){
            $users_ids[] = $belongs_user->id;
        }
        $users_ids[] = $user->id;
    }

    return array_unique($users_ids);
}


function getFirstLitter($word){
    $word = explode(" ", $word);
    $char = "";

    foreach ($word as $w) {
        $char .= $w[0];
    }

    return $char;
}





function getAccordingLang($text,$lang){

    $json_decoded = json_decode($text);

        try{
           return $json_decoded->$lang;
        }catch (Exception $e){
            return false;
        }
}



function checkDriverActions($user,$driver){

     $attr = DB::table('user_driver')->where('userid',$user)->where('driverid',$driver)->first();
    if ($attr){
         return json_decode($attr->permissions, true);
     }
     return 0;

}

function check_base64_image($base64) {
    $img = imagecreatefromstring(base64_decode($base64));
    if (!$img) {
        return false;
    }

    imagepng($img, 'tmp.png');
    $info = getimagesize('tmp.png');

    unlink('tmp.png');

    if ($info[0] > 0 && $info[1] > 0 && $info['mime']) {
        return true;
    }

    return false;
}


function checkDeviceActions($user,$device){

     $attr = DB::table('user_device')->where('userid',$user)->where('deviceid',$device)->first();
    if ($attr){
         return json_decode($attr->permissions, true);
     }
     return 0;

}

function checkGroupActions($user,$group){

     $attr = DB::table('user_groups')->where('userid',$user)->where('groupid',$group)->first();
    if ($attr){
         return json_decode($attr->permissions, true);
     }
     return 0;

}
function checkUserActions($user,$user2){

     $attr = DB::table('user_user')->where('userid',$user2)->where('manageduserid',$user)->first();
    if ($attr){
         return json_decode($attr->permissions, true);
     }
     return 0;

}


function checkUserActionsGroup($group,$user){

    $attr = DB::table('user_groups')->where('userid',$user)->where('groupid',$group)->first();
    if ($attr){
        return json_decode($attr->permissions, true);
    }
    return 0;

}

function checkUserActionsGeofence ($geofence,$user){

    $attr = DB::table('user_geofence')->where('userid',$user)->where('geofenceid',$geofence)->first();
    if ($attr){
        return json_decode($attr->permissions, true);
    }
    return 0;

}


function checkUserActionsContainer ($container,$user){


    $attr = DB::table('users_containers')->where('user_id',$user)->where('container_id',$container)->first();
    if ($attr){
        return json_decode($attr->permissions, true);
    }
    return 0;

}


function checkMenuActions($user,$menu){

    $attr = DB::table('slidemenu_users')->where('userid',$user)->where('menuid',$menu)->first();
    if ($attr){
        return json_decode($attr->permissions, true);
    }
    return 0;

}





function attribute2($key , $value){

    $json_field = [];

    for ($i = 0; $i < sizeof($key); $i++) {

        if ($key[$i] != ''){
            $json_field[$key[$i]] = $value[$i];
        }
    }

     $attribute = null;

    if (sizeof($json_field) != 0){
        $attribute = json_encode($json_field);
    }

    return $attribute;

}



function getAttributes($jsonString){

    if ($jsonString != null){
        $attr = json_decode($jsonString);
        return $attr;
    }
    return [];
}



function attribute($key , $value){

    $json_field = [];

    for ($i = 0; $i < count($key); $i++) {
        $json_field[$key[$i]] = $value[$i];
    }

    if(isset($json_field) != ''){
        $attribute = json_encode($json_field);

    }else
    {
        $attribute = null;
    }

    return $attribute;

}


function decode($array)
{
    if($array !== null){
        $value = json_decode($array,true);

    }else{
        $value = '';

    }

    return $value;


}



function direction()
{
    if(LaravelLocalization::getCurrentLocaleDirection() == 'ltr')
    {
        $lang = 'ltr';
    }else{
        $lang = 'rtl';
    }

    return $lang;

}


function menuCheck()
{
    $segment = '/'.Request::segment(2);

    $menu =  App\Menu::where('url',$segment)->first();
    $user_menus= DB::table('slidemenu_users')->where('userid',auth()->user()->id)->where('menuid',$menu->id)->first();
    $data = collect($user_menus)->toArray();
    $permission = json_decode($data['permissions'],true);

    if($permission['create'] === "1"){
        return true;
    }else{
        return false;
    }
}


function NotifyComment()
{

    $tickets = auth()->user()->tickets()->with(['comments' =>function ($q){
      //  if(auth()->user()->admin != 1) {
            $q->where('user_id', '!=', auth()->user()->id)->where('read', 0);
       // }
    }])->get();


    $adminComment =  \App\Comment::where('user_id','!=',auth()->user()->id)->where('read',0)->get();


    $comments =  $tickets->pluck('comments');
   // dd($adminComment);
    $data = array_collapse($comments);

    if(auth()->user()->admin  ==1 ){
        return $adminComment;
    }else{

        return $data;
    }

}


//
//function typeEngine($id)
//{
//    $positoin = \App\Position::findOrFail($id);
//    $attribute_position = json_decode($positoin['attributes'],true);
//    $device = \App\Device::findOrFail($positoin['deviceid']);
//    $attributes_device = json_decode($device['attributes'],true);
//    switch ($attribute_position['ignition']) {
//        case "true":
//            echo " المحرك يعمل";
//            if($positoin['speed'] == 0){
//                echo " متوقف";
//
//                if($attribute_position['digitalinput'] == true){
//                    echo " الرافعة تعمل ";
//                }else{
//                    echo " الرافعه لا تعمل  ";
//
//                    if(isset($attributes_device['minIdleTime']) || !isset($attributes_device['minIdleTime'])){
//
//                        $positoin_time = \App\Position::where('speed' ,">",0)->where('deviceid',$positoin['deviceid'])->orderBy('devicetime','desc')->first();
//
//                        $a = new DateTime($positoin_time['devicetime']);
//                        $b = new DateTime($positoin['devicetime']);
//                        $interval = $a->diff($b);
//                        $lastmovetime =  $interval->format("%H:%I:%S");
//                        $time =  gmdate("H:i:s", 120);
//                        //print_r($interval) ;
//                        if($lastmovetime >= $time || $lastmovetime >= isset($attributes_device['minIdleTime'])){
//                            echo "حالة ثبات ";
//                        }else{
//                            echo " حالة توقف ";
//                        }
//                    }
//
//
//                }
//
//            }else{
//                echo " متحرك";
//                if($positoin['speed'] >= $attributes_device['speedLimit'] ){
//                    echo " سرعه زائده ";
//                }else{
//                    echo " متحرك ";
//                   if($attribute_position['digitalinput'] == true){
//                       echo " كنس ";
//
//                   }else{
//                       echo " متحرك ";
//
//                   }
//                }
//            }
//            break;
//        default:
//            echo "فى حاله الانتظار";
//    }
//
//}





function lastTimeDeviceStop($device){

    return $device->locations()->where('speed','=',0)->orderBy('devicetime','desc')->first();
}


function get_device_status($Position,$Device)
{

   // dd($Position);
    $attribute_position = json_decode($Position['attributes'],true);
    //$device = \App\Device::findOrFail($positoin['deviceid']);
    $attributes_device = json_decode($Device['attributes'],true);
    switch ($attribute_position['ignition']) {
        case 'true':


            if($Position['speed'] === 0){
            $positoin_time = \App\Position::where('speed' ,'>',0)->where('deviceid',$Position['deviceid'])->where('devicetime','<',$Position['devicetime'])->orderBy('devicetime','desc')->first();
            $attributes_device['minIdleTime'] = (isset($attributes_device['minIdleTime'])) ? isset($attributes_device['minIdleTime']) : 120;
            $ideltime = strtotime($Position['devicetime']) - strtotime($positoin_time['devicetime']) ;
            //dd($ideltime);
                if($attribute_position['digitalinput'] == true){
                    return $status = "digitalWork";

                } else{

                    if($ideltime >= $attributes_device['minIdleTime'] ){
                       // echo "حالة ثبات ";
                        return $status = "stability";
                    }else{
                       // echo " حالة توقف ";
                        return array($status = 'stop' , $ideltime = gmdate("H:i:s", $ideltime) );
                    }
                }
            }else{
                if($Position['speed'] >= $attributes_device['speedLimit'] ){
                    //echo " سرعه زائده ";
                    return $status = 'speedExcessive';

                }else{
                    if($attribute_position['digitalinput'] == true){
                        //echo " كنس ";
                        return $status = "sweep";

                    }else{

                        //echo " متحرك ";
                        return $status = "move";
                    }
                }
            }
            break;
        default:
            //echo "محرك مغلق";
            return $status = "ignitionStop";
    }

    return array("Status" =>$status , "Ideltime" => $ideltime );


}



//
//function getUserDevicesIds(){
//    $user = auth()->user();
//
//    if ($user->admin == 1){
//
//        return U->select($selects);
//    }
//
//    return $user->devices()->select($selects);
//}
