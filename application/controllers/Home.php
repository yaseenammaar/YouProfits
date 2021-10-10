<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {



	public function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('form', 'url'));
         $this->load->library('encrypt');
         $this->load->library('form_validation'); 
         $this->load->library('session'); 
         $this->load->helper('cookie');
         // Please Define SerVer Path
         define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'');
         ini_set('max_execution_time', 0);
        //  unset($_SESSION['trim_videos']);
         
         
 }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
       if(!isset($_SESSION['is_login'])){
          return redirect("home/login");
        }
        if(!isset($_GET['redirect'])){
          $_SESSION['step']=1;  
        }
        if(isset($_GET['render_id']) && $_GET['render_id']!=""){
          $videos=$this->db->where('id',$_GET['render_id'])->get('rendered_videos')->result_array();
          if(count($videos)>0){
           $_SESSION['render_id']=$_GET['render_id'];
           $video_ids=json_decode($videos[0]['video_id']);
           $count=count($video_ids);
           for($i=0;$i<=$count;$i++){
              $vid=$this->db->where('id',$video_ids[$i])->get('copy_video')->result_array();
              $this->db->where('id',$video_ids[$i])->update('upload_video',["url"=>$vid[0]['url']]);
           }
           $_SESSION['step']=2;

           return redirect('home'); 
          }
        }
        if(isset($_SESSION['step'])){
          switch($_SESSION['step']){
            case 1:
             $page='select.php';
             $title="Upload Video - YouProfits";
             break;
            case 2:
            $page= 'arrange.php';
            $title="Arrange Videos - YouProfits";
             break;
            case 3:
            $page= 'trim.php';
            $title="Edit Video - YouProfits";
             break;
            case 4:
            $page= 'addtext.php';
            $title="Texting - YouProfits";
             break;
             case 5:
            $page= 'render.php';
            $title="Texting - YouProfits";
             break;
          }
        }
        if($page=='addtext.php'){
            $red='addtext';
        }else{
            $red='index';
        }
        $this->load->view("crazyspects/".$red,["title"=>$title,"page"=>$page]);  
	}
    public function login(){
      $this->load->view("crazyspects/login",["title"=>"Login - YouProfits"]);   
    }
	public function register(){
	  if(isset($_SESSION['is_login'])){
         return redirect('home');
      }
      $this->load->view("crazyspects/register",["title"=>"Register - YouProfits"]);  
	}
	
	public function sign_up(){
	    if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['password'])){
	       $name=$this->input->post('name'); 
	       $phone=$this->input->post('phone'); 
	       $mail=$this->input->post('email'); 
	       $pass=$this->input->post('password'); 
	       $confirm_password=$this->input->post('confirm_password'); 
	       if($confirm_password==$pass){
	          if($this->db->where(["emailId"=>$mail])->get('tblusers')->num_rows()>0){
	            $data=["status"=>0,"err"=>"This Email Id Already Exist!"];  
	          }else{
	              $query=$this->db->insert('tblusers',['Name'=>$name,'emailId'=>$mail,'mobileNumber'=>$phone,'userPassword'=>md5($confirm_password),'regDate'=>date('Y-m-d'),"isActive"=>1]);
	              if($query){
	                $data=["status"=>1,"err"=>"Your Account Registered Successfully!"];     
	              }else{
	               $data=["status"=>0,"err"=>"Sorry! We Can't Available to handle this request try again later!"];   
	              }
	          } 
	       }else{
	           $data=["status"=>0,"err"=>"Please Enter Both Password Same!"];
	       }
	       
	    }else{
	      $data=["status"=>0,"err"=>"Input Data Missing"];   
	    }
	    echo json_encode($data);
	}
    public function profile(){
     if(!isset($_SESSION['is_login'])){
         return redirect('home');
     }
     $this->load->view("crazyspects/index",["title"=>"Profile Details - YouProfits","page"=>"profile.php"]);   
    }
    
    public function sign_in(){
        if(isset($_POST['email']) and isset($_POST['password'])){
         $phone=$this->input->post('email'); 
         $pass=$this->input->post('password');
         $data=$this->db->where(["emailId"=>$phone,"userPassword"=>md5($pass)])->get('tblusers');
         if($data->num_rows()>0){
            $user=$data->result_array();
            if($user[0]['is_bann']==1){
              $data=["status"=>0,"err"=>"Your Account Is Banned Please Contact Admin"]; 
              echo json_encode($data);
              exit();
            }
            $_SESSION['user']=$user[0];
            $_SESSION['is_login']=true;
            $data=["status"=>1,"err"=>"Welcome Back ".$_SESSION['user']['Name']."!"];
            $this->db->where('id',$_SESSION['user']['id'])->update('tblusers',["last_login"=>time()]);
            $_SESSION['step']=1;
         }else{
            $data=["status"=>0,"err"=>"You entered wrong Details"];  
         }
        }else{
          $data=["status"=>0,"err"=>"Input Data Missing"];  
        }
        echo json_encode($data);
    }

    public function update_profile(){
     if(isset($_POST['name'])){
      $update['Name']=$this->input->post('name'); 
      $update['emailId']=$this->input->post('email'); 
      $update['mobileNumber']=$this->input->post('mobile'); 
      $update['lastUpdationDate']=date('Y-m-d');
      $update['YoutubeAPIKey']=$this->input->post('apikey'); 
      $update['YoutubeAPISecret']=$this->input->post('apisec');
      $config['file_name'] = time().'-'.$_FILES["image"]['name'];
      $config['upload_path' ]  = 'uploads/profile/'; 
      $config['allowed_types'] = 'gif|jpg|png'; 
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('image')) {
        $data=["status"=>0,"err"=>$this->upload->display_errors()];
      }else{ 
        $update['profile'] = $this->upload->file_name;
      }
      $this->db->where('id',$_SESSION['user']['id'])->update('tblusers',$update);
      $userdata=$this->db->where('id',$_SESSION['user']['id'])->get('tblusers')->result_array();
      $_SESSION['user']=$userdata[0];
      $data=["status"=>1,"err"=>"Profile Updated!"];
    }else{
      $data=["status"=>0,"err"=>"Required Field Missing!"];
    }
    echo json_encode($data);
    }

    public function logout(){
      $this->session->sess_destroy();
      return redirect('home/login');
    } 
    public function manage_ajax(){
      $data['status']=1;
      require SERVER_PATH.'/vendor/autoload.php';
      $ffmpeg = FFMpeg\FFMpeg::create();
      if($data['status']!=0){
      $config['max_size'] = 1024 * 100;
      $config['file_name'] = time().'-'.$_FILES["file"]['name'];
      $config['upload_path' ]  = 'uploads/videos/'; 
      $config['allowed_types'] = 'wmv|mp4|avi|mov|3gp'; 
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('file')) {
        $data=["status"=>0,"err"=>$this->upload->display_errors()];
      }else{
        $insert['url'] = $this->upload->file_name; 
        $copy_insert['url']=$this->upload->file_name;
        $video = $ffmpeg->open(SERVER_PATH.'/uploads/videos/'.$insert['url']);
        $file_name = uniqid().'-Thumbnail.jpg';
        $thumbnail_path=SERVER_PATH."/uploads/thumbnails/".$file_name;
        $video
        ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(2))
        ->save($thumbnail_path);
        $res['thumbnail'] = base_url('uploads/thumbnails/'.$file_name);
$output_file=time()."thumb.jpg";
include_once(SERVER_PATH.'/plugins/Video_details/getid3/getid3.php');
$getID3 = new getID3;
$file = $getID3->analyze(SERVER_PATH.'/uploads/videos/'.$config['file_name']);
$cmd="ffmpeg -i ".SERVER_PATH."/uploads/thumbnails/".$file_name." -vf scale=".$file['video']['resolution_x'].":".$file['video']['resolution_y']." ".SERVER_PATH."/uploads/thumbnails/".$output_file;
exec($cmd);
unlink(SERVER_PATH."/uploads/thumbnails/".$file_name);
        $insert['thumbnail']=$output_file;
      }

     }

     if($data['status']!=0){
      $insert['user_id']=$_SESSION['user']['id'];
      $insert['is_delete']=0;
      $this->db->insert('upload_video',$insert);
      $copy_insert['id']=$this->db->insert_id();
      $this->db->insert('copy_video',$copy_insert);
      $data=["status"=>1,"res"=>$res['thumbnail']];
     }
     echo json_encode($data);
    }

    function get_youtube_result(){
    error_reporting(E_ERROR | E_WARNING | E_PARSE); 
    define('MAX_RESULTS',30);
    $str=$this->input->post('str');
    $apikey = $_SESSION['user']['YoutubeAPIKey']; 
    if($apikey!=""){
    $googleApiUrl='https://youtube.googleapis.com/youtube/v3/search?part=snippet&maxResults=' .MAX_RESULTS. '&order=relevance&q='. urlencode($str) .'&type=video&videoLicense=creativeCommon&key='.$apikey;
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);

    curl_close($ch);
    $data = json_decode($response);
    $value = json_decode(json_encode($data), true);
    $html="";
    for ($i = 0; $i < MAX_RESULTS; $i++) {
      $id=$value['items'][$i]['id']['videoId'];
      $title=$value['items'][$i]['snippet']['title'];
      $thumbnail=$value['items'][$i]['snippet']['thumbnails']['medium']['url'];
      $channelTitle=$value['items'][$i]['snippet']['channelTitle'];
      $attr="'".$thumbnail."','".$id."'";
      if($thumbnail==""){
        continue;
      }
      $html.='<tr><td class="txt-oflo">'.$title.'</td>
       <td><img class="img-preview" src="'.$thumbnail.'"></td>
       <td class="txt-oflo">'.$channelTitle.'</td>
       <td><a href="javascript:void(0)" onclick="save_youtube_video('.$attr.')" class="fw-normal">Add</a></td>
       </tr>';
    }
    if($html!=""){
    $data=["status"=>1,"result"=>$html];
    }else{
      $data=["status"=>0,"err"=>"No Youtube Videos Found"];  
    }
  }else{
    $data=["status"=>0,"err"=>"API Key Not Found!"];
  }
  echo json_encode($data);
  }
  public function download_video(){
    $thumbnail=$this->input->post('thumb');
    $video_id=$this->input->post('video_id');
    if($video_id!=""){
$image_url = $thumbnail;
$file1=time().'-1234.jpg';
$save_as = SERVER_PATH.'/uploads/thumbnails/'.$file1;
$ch = curl_init($image_url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US)");
$raw_data = curl_exec($ch);
curl_close($ch);
$fp = fopen($save_as, 'x');
fwrite($fp, $raw_data);
fclose($fp);
$output_file=time()."thumb.jpg";

     $second = time()."-youtube.mp4";
     $command_exec = escapeshellcmd('python3 '.SERVER_PATH.'/python/script.py '.$video_id.' '.$second);
     $str_output = exec($command_exec);
     if(!empty($str_output)){
       $insert['url']=$second;
include_once(SERVER_PATH.'/plugins/Video_details/getid3/getid3.php');
$getID3 = new getID3;
$file = $getID3->analyze(SERVER_PATH.'/uploads/videos/'.$second);
$cmd="ffmpeg -i ".SERVER_PATH."/uploads/thumbnails/".$file1." -vf scale=".$file['video']['resolution_x'].":".$file['video']['resolution_y']." ".SERVER_PATH."/uploads/thumbnails/".$output_file;
exec($cmd);
unlink(SERVER_PATH."/uploads/thumbnails/".$file);
     $insert['thumbnail']=$output_file;
       $copy_insert['url']=$second;
       $insert['user_id']=$_SESSION['user']['id'];
       $insert['is_delete']=0;
       $res['thumbnail'] = base_url('uploads/thumbnails/'.$insert['thumbnail']);
       $this->db->insert('upload_video',$insert);
       $copy_insert['id']=$this->db->insert_id();
       $this->db->insert('copy_video',$copy_insert);
       $data=["status"=>1,"res"=>$res['thumbnail']];
     }else{
      $data=["status"=>0,"err"=>"Video size shuld be less than 100 mb"];
     }
    }else{
        $data=["status"=>0,"err"=>"The video is not found, please check YouTube URL."];
    } 
    echo json_encode($data);
  }

  public function update_status_video(){
    $vid=$this->input->post('vid');
    $video=$this->db->where(["video_id"=>$vid,"user_id"=>$_SESSION['user']['id']])->get('select_video')->result_array();
    if(count($video)>0){
       $this->db->where('id',$video[0]['id'])->delete('select_video');
    }else{
      $this->db->insert('select_video',["video_id"=>$vid,"user_id"=>$_SESSION['user']['id']]);
    }
    echo 'true';
    die();
  }

  public function manage_step(){
    $step=$this->input->post('step');
    if($step!=""){
      $_SESSION['step']=$step;
    }
    echo $_SESSION['step'];
  }

  public function manage_sorting(){
   $class=$this->input->post('classs');
   $sorting_num=$this->input->post('num');
   $get_id=explode(" ",$class);
   $this->db->where('id',$get_id[1])->update('select_video',["sorting_num"=>$sorting_num]);
   echo true;
  }

  public function manage_trim_video(){
      require_once SERVER_PATH.'/vendor/autoload.php';
      $ffmpeg = FFMpeg\FFMpeg::create();
    if($_POST['video_duration']>$_POST['start_trim']){
        $_SESSION['trim_videos'][$_POST['video_id']]=$_POST;
        // $this->db->where(["user_id"=>$_SESSION['user']['id'],"video_id"=>$_POST['video_id']])->delete('select_video');
    
      $data=["status"=>1];
      $_SESSION['user_can_next']=1;
    }else{
      $data=["status"=>0,"err"=>"Start trim Time should be less than then video duration"];
    }
    echo json_encode($data);
  }

  function merge_video(){
    include_once(SERVER_PATH.'/plugins/Video_details/getid3/getid3.php');
    require SERVER_PATH.'/vendor/autoload.php';
    $ffmpeg = FFMpeg\FFMpeg::create();
    if(isset($_SESSION['trim_videos']) && count($_SESSION['trim_videos'])>0){
       foreach($_SESSION['trim_videos'] as $key=>$_POST){
     $video=$this->db->where('id',$_POST['video_id'])->get('upload_video')->result_array();
      $videodbl = $ffmpeg->open(SERVER_PATH."/uploads/videos/".$video[0]['url']);
      $video_new_name=time().$_SESSION['user']['id']."new.mp4";
      $clip = $videodbl->clip(FFMpeg\Coordinate\TimeCode::fromSeconds($_POST['start_trim']), FFMpeg\Coordinate\TimeCode::fromSeconds($_POST['end_trim']));
      $clip->save(new FFMpeg\Format\Video\X264(), SERVER_PATH."/uploads/videos/".$video_new_name);
      $insert['trimStart']=$_POST['start_trim'];
      $insert['trimEnd']=$_POST['end_trim'];
      $insert['video_id']=$video[0]['id'];
      $insert['user_id']=$_SESSION['user']['id'];
      $this->db->insert('saved_video',$insert);
      $this->db->where(["user_id"=>$_SESSION['user']['id'],"video_id"=>$_POST['video_id']])->update('select_video',["is_saved"=>1]);
      $this->db->where("id",$video[0]['id'])->update('upload_video',["url"=>$video_new_name]);
      unlink(SERVER_PATH."/uploads/videos/".$video[0]['url']); 
       } 
       unset($_SESSION['trim_videos']);
    }
    
    $videos=$this->db->where(['user_id'=>$_SESSION['user']['id']])->order_by('sorting_num','asc')->get('select_video')->result_array();
    if(count($videos)>1){
      foreach($videos as $key=>$vid){
        $video=$this->db->where('id',$vid['video_id'])->get('upload_video')->result_array();
        $_SESSION['recent_video'][]=$vid['video_id'];
        $vide[]=SERVER_PATH."/uploads/videos/".$video[0]['url'];
        // $this->db->where("id",$vid['id'])->delete('select_video');
      }
      file_put_contents(SERVER_PATH.'/uploads/user_text'.$_SESSION['user']['id'].'.txt', implode("\n", array_map(function ($path) {
       return 'file ' . addslashes($path);
      }, $vide)));
      $video_mergeurl=$_SESSION['user']['id'].time().'merge.mp4';
      $cmd="ffmpeg -f concat -safe 0 -i ".SERVER_PATH."/uploads/user_text".$_SESSION['user']['id'].".txt -c copy ".SERVER_PATH."/uploads/videos/".$video_mergeurl;
      exec($cmd);
      $video_merge=$_SESSION['user']['id'].uniqid().'merge.mp4';
      $cmd="ffmpeg -i ".SERVER_PATH."/uploads/videos/".$video_mergeurl." -vf scale=640:480 ".SERVER_PATH."/uploads/videos/".$video_merge;
      exec($cmd);
          unlink(SERVER_PATH."/uploads/videos/".$video_mergeurl);
          $video_mergeurl=$video_merge;
          
    }else{
       $delete=false;
       $video=$this->db->where('id',$videos[0]['video_id'])->get('upload_video')->result_array();
       $video_mergeurl=$video[0]['url'];
    }
    if($_SESSION['user']['is_pro']!=1){
          if($_SESSION['user']['is_admin']!=1){
      $getID3 = new getID3;
              $file = $getID3->analyze(SERVER_PATH.'/uploads/videos/'.$video_mergeurl);
              $vid_duration=round($file['playtime_seconds']);
              $five=60*5;
              if($vid_duration>=$five){
                echo json_encode(["status"=>0,"err"=>"Video Length should be less then or equal then 5 mins!"]);
                // $_SESSION['step']=2;
                exit(); 
              }
          }
        
    }
      $merge_videos=$this->db->where('user_id',$_SESSION['user']['id'])->get('merge_videos')->result_array();
      $video123 = $ffmpeg->open(SERVER_PATH.'/uploads/videos/'.$video_mergeurl);
        $file_name = uniqid().'-Thumbnail.jpg';
        $thumbnail_path=SERVER_PATH."/uploads/thumbnails/".$file_name;
        $video123
        ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(1))
        ->save($thumbnail_path);
        if (!file_exists(SERVER_PATH."/uploads/thumbnails/".$file_name)){
          $video123 = $ffmpeg->open(SERVER_PATH.'/uploads/videos/'.$video_mergeurl);
        $file_name = uniqid().'-Thumbnail.jpg';
        $thumbnail_path=SERVER_PATH."/uploads/thumbnails/".$file_name;
        $video123
        ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(1))
        ->save($thumbnail_path);
        }
      $insert['thumbnail']=$file_name;
      $videos=$this->db->where(['user_id'=>$_SESSION['user']['id']])->order_by('sorting_num','asc')->get('select_video')->result_array();
      if(count($videos)>0){
      foreach($videos as $key=>$vid){
        $vids=$this->db->where("id",$vid['video_id'])->get('upload_video');
        if($vids->num_rows()>0){
            $vidzs=$vids->result_array();
            if(!isset($delete)){
              unlink(SERVER_PATH."/uploads/videos/".$vidzs[0]['url']);
            }
            $this->db->where("id",$vidzs[0]['id'])->delete('upload_video');
        }
        $this->db->where("id",$vid['id'])->delete('select_video');  
      }
      }
      if(count($merge_videos)>0){
        $this->db->where('user_id',$_SESSION['user']['id'])->delete('merge_videos');
        $this->db->insert('merge_videos',["user_id"=>$_SESSION['user']['id'],"url"=>$video_mergeurl,"thumbnail"=>$insert['thumbnail']]);
      }else{
        $this->db->insert('merge_videos',["user_id"=>$_SESSION['user']['id'],"url"=>$video_mergeurl,"thumbnail"=>$insert['thumbnail']]);
      }
    echo json_encode(["status"=>1,"err"=>"Video Length should be less then or equal then 5 mins!"]);
  }

  function manage_render_video(){
$re=json_decode($_POST['json'],true);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

    require_once SERVER_PATH.'/vendor/autoload.php';
    include_once(SERVER_PATH.'/plugins/Video_details/getid3/getid3.php');
    $getID3 = new getID3;
    $ffmpeg = FFMpeg\FFMpeg::create();
    $video_path=SERVER_PATH."/uploads/videos/";
    $new_textfile=rand(111,999)."text.txt";
    $txtfile = fopen($video_path.$new_textfile,"w");
    $new_vido_url="Output".time().".mp4";
    $final='';
    // new_code
     $selected_videos=$this->db->where('user_id',$_SESSION['user']['id'])->order_by('sorting_num','asc')->get('select_video'); 
    //  print_r($_SESSION['trim_videos']);
    //  die();
     if($selected_videos->num_rows()>0){
         $secondvideo=0;
         foreach($selected_videos->result_array() as $key=>$select_video){
            $upload_video=$this->db->where('id',$select_video['video_id'])->get('upload_video')->result_array();
            
            if(isset($_SESSION['trim_videos'][$select_video['video_id']])){
                $txt="file ".$video_path.$upload_video[0]['url']."\n";
                $txt .="inpoint ".$_SESSION['trim_videos'][$select_video['video_id']]['start_trim']."\n";
                $txt .="outpoint ".$_SESSION['trim_videos'][$select_video['video_id']]['end_trim']."\n";
                // fwrite($file, $txt);
                // $txt="";
                // Code Here
                unset($_SESSION['trim_videos'][$select_video['video_id']]);
            }else{
              $file = $getID3->analyze(SERVER_PATH.'/uploads/videos/'.$upload_video[0]['url']);
              $txt="file ".$video_path.$upload_video[0]['url']."\n";
              $txt .="inpoint "."0\n";
              $txt .="outpoint ".round($file['playtime_seconds'])."\n";
            }
            $final .=$txt;
            
            $file = $getID3->analyze(SERVER_PATH.'/uploads/videos/'.$upload_video[0]['url']);
            $secondvideo=$secondvideo+round($file['playtime_seconds']);
            $video[]=$upload_video[0]['url'];
            $this->db->where('id',$select_video['video_id'])->delete('upload_video');
         }
         fwrite($txtfile, $final);
         $file = $getID3->analyze(SERVER_PATH.'/uploads/videos/'.$video[0]);
         $cmd="ffmpeg -f concat -safe 0 -i ".$video_path.$new_textfile." -vf scale=".$file['video']['resolution_x'].":".$file['video']['resolution_y'].",crop=".$file['video']['resolution_x'].":".$file['video']['resolution_y']." -preset slow -crf 18 ".$video_path.$new_vido_url;
         exec($cmd);
     }
     unlink($video_path.$new_textfile);
     foreach($video as $key=>$vid){
             unlink($video_path.$vid);
         }
    // end new code here
    //   $vid=$this->db->where('user_id',$_SESSION['user']['id'])->get('merge_videos')->result_array();
      
$apikey="AIzaSyCpCsdT8FvIbZCS7JnEtKZG4-K0Nr5eukw";
if($apikey!=""){
    $googleApiUrl = 'https://www.googleapis.com/webfonts/v1/webfonts?key=' . $apikey;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);

    curl_close($ch);
    $data = json_decode($response);
    $value = json_decode(json_encode($data), true);
    
 }
    
         $serverpath=$_SERVER['DOCUMENT_ROOT'].'/video_editor_3/uploads/';
         $json=json_decode($_POST['json']);
         $i=0;
         $video = $ffmpeg->open($video_path.$new_vido_url);
         $new_video=time().$_SESSION['user']['id']."_render.mp4";
         $command="";
         $images="";
         $overlay='"';
         $is_image=false;
         $v=0;
         $imgcount=0;
        foreach($json->pages as $key=>$page){
           foreach($page->children as $id=>$child){
              if($child->type=='text'){
                  $i++;
               $text=$child->text;
               $font_size=$child->fontSize;
               $font_color=$child->fill;
               if(isset($value)){
                   foreach($value['items'] as $key=>$font){
                     if($font['family']==$child->fontFamily){
                         $font_family=$font['files']['regular'];
                         if(file_exists(SERVER_PATH."/uploads/fonts/".$font['family'].".ttf")){
                            $font_family=SERVER_PATH."/uploads/fonts/".$font['family'].".ttf"; 
                         }else{
                            $query=file_get_contents($font['files']['regular']);
                            file_put_contents(SERVER_PATH."/uploads/fonts/".$font['family'].".ttf",$query);
                            $font_family=SERVER_PATH."/uploads/fonts/".$font['family'].".ttf";
                         }
                     }
                   }
                   }
                   if(!isset($font_family)){
                      $font_family=SERVER_PATH."/uploads/fonts/Calibri.TTF"; 
                   }
               if($font_color!='black'){
                   $rgb=$child->fill;
                   $res=str_replace("rgba","",$rgb);
                   $res=str_replace("(","",$res);
                   $res=str_replace(")","",$res);
                   $res1=explode(",",$res);
                   $rgb=$res1;
                   $hex_color=sprintf("#%02x%02x%02x",$rgb[0],$rgb[1],$rgb[2]);
                   $font_color=$hex_color;
                   
                   
               }
               $child->x=$child->x+20;
               $pos='x='.$child->x.': y='.$child->y;
               if($command!=""){
                 $command .=",";  
               }
               $command .= "drawtext=text='$text': fontfile='{$font_family}': fontcolor=".$font_color.": fontsize=".$font_size.": ".$pos;
              }
              elseif($child->type=='image'){
                $imgcount++;
                if($imgcount==1){
                    continue;
                }
                $is_image=true;
                $x_asix=$child->x;
                $y_asix=$child->y;
                $imglay=$child->src;
                $content = file_get_contents($imglay);
                $imglay="image123".uniqid().".png";
                $imglay1="image123".uniqid().".png";
                file_put_contents(SERVER_PATH."/uploads/".$imglay, $content);
                $cmd="ffmpeg -i ".SERVER_PATH."/uploads/".$imglay." -vf scale=".$child->width.":".$child->height." ".SERVER_PATH."/uploads/".$imglay1;
                exec($cmd);
                unlink(SERVER_PATH."/uploads/".$imglay);
                $images .=" -i ".SERVER_PATH."/uploads/".$imglay1;
                $j=$v+1;
                if($v>0){
                    $vi="v".$v;
                }else{
                    $vi=$v;
                }
                if($v>=1){
                 $overlay .=";";   
                }
                $overlay .=" [".$vi."][".$j."] overlay=".$x_asix.":".$y_asix.":enable='between(t,0,1000)'[v".$j."]";
                
                $v++;
              }
           } 
        }
    if(count($re['pages'][0]['children'])>1){
     if($v>2){   
     $overlay=substr_replace($overlay,"",-1);
     }
     if($command!=""){
     $video->filters()->custom("$command");
     $video->save(new FFMpeg\Format\Video\X264(), $video_path.$new_video);
     }else{
         $new_video=$new_vido_url;
     }
     if($is_image==true){
     $new_video_img="render_".uniqid()."_vid.mp4";
     if(file_exists($video_path.$new_video)){
     $overlay .='"';
     $cmd="ffmpeg -i ".$video_path.$new_video." ".$images." -filter_complex ".$overlay."  -map [v".$j."] -map 0:a? -c:a copy ".$video_path.$new_video_img;
     }else{
        $video_path.$new_video." this file is not exist";
     }
     exec($cmd);
     unlink($video_path.$new_video);
     $new_video=$new_video_img;
     }
     unlink(SERVER_PATH."/uploads/videos/".$new_vido_url);
    }else{
       $new_video= $new_vido_url;
    }
     if($this->db->insert('rendered_videos',["user_id"=>$_SESSION['user']['id'],"url"=>$new_video,"isDeleted"=>0,"time"=>time()])){
         
     }else{
         print_r($this->db->error());
         die();
     }
    //  if(isset($_SESSION['render_id']) && $_SESSION['render_id']!=""){
    //   $video_old_render=$this->db->where('id',$_SESSION['render_id'])->get('rendered_videos')->result_array();
    //   unlink(SERVER_PATH."/uploads/videos/".$video_old_render[0]['url']);
    //   $this->db->where('id',$_SESSION['render_id'])->update('rendered_videos',["url"=>$new_video]);
    //   unset($_SESSION['render_id']);
    //  }else{
     
    //  }
     
     unset($_SESSION['recent_video']);
     $_SESSION['step']=5;
    //  $olddd=$this->db->where('user_id',$_SESSION['user']['id'])->get('merge_videos')->result_array();
     
    //  $this->db->where('user_id',$_SESSION['user']['id'])->delete('merge_videos');
     $data=["status"=>1,"err"=>"Congo!"];
    echo json_encode($data);
    
  }

  public function delete_video(){
   $id=$this->input->post('video');
   $video=$this->db->where('id',$id)->get('upload_video')->result_array();
   unlink(SERVER_PATH."/uploads/videos/".$video[0]['url']);
   $this->db->where('id',$id)->update('upload_video',["is_delete"=>1]);
  }

  public function delete_render_video($id){
   $video=$this->db->where('id',$id)->get('rendered_videos')->result_array();
   unlink(SERVER_PATH."/uploads/videos/".$video[0]['url']);
   $this->db->where('id',$id)->update('rendered_videos',["isDeleted"=>1]);
   return redirect('home/render_videos');
  }
  
  public function manage_user(){
      if($_SESSION['user']['is_admin']==1){
        $this->load->view("crazyspects/index",["title"=>"Manage User - YouProfits","page"=>"manage_user.php"]);    
      }else{
      return redirect('home');
      }
  }
  public function change_type($id){
     if($_SESSION['user']['is_admin']==1){
        $user=$this->db->where('id',$id)->get('tblusers')->result_array(); 
        if($user[0]['is_pro']==1){
            $data=["is_pro"=>0];
        }else{
          $data=["is_pro"=>1];  
        }
        $this->db->where("id",$id)->update("tblusers",$data);
        return redirect('home/manage_user');
      }else{
      return redirect('home');
      } 
  }
  
  public function delete_user($id){
    if($_SESSION['user']['is_admin']==1){
        $this->db->where("id",$id)->delete("tblusers");
        return redirect('home/manage_user');
      }else{
      return redirect('home');
      }   
  }
  
  public function change_account_type($id){
     if($_SESSION['user']['is_admin']==1){
        $user=$this->db->where('id',$id)->get('tblusers')->result_array(); 
        if($user[0]['is_bann']==1){
            $data=["is_bann"=>0];
        }else{
          $data=["is_bann"=>1];  
        }
        $this->db->where("id",$id)->update("tblusers",$data);
        return redirect('home/manage_user');
      }else{
      return redirect('home');
      } 
  }
  public function get_image_merge(){
      require_once SERVER_PATH.'/vendor/autoload.php';
      include_once(SERVER_PATH.'/plugins/Video_details/getid3/getid3.php');
      $getID3 = new getID3;
     $video=$this->db->where(['user_id'=>$_SESSION['user']['id']])->order_by('sorting_num','asc')->limit(1)->get('select_video')->result_array();
     $vid=$this->db->where('id',$video[0]['video_id'])->get('upload_video')->result_array();
        $thumb=base_url("/uploads/thumbnails/".$vid[0]['thumbnail']);
        $file = $getID3->analyze(SERVER_PATH.'/uploads/videos/'.$vid[0]['url']);
        list($width, $height, $type, $attr) = getimagesize($thumb);
        $json='{"width":'.$file['video']['resolution_x'].',"height":'.$file['video']['resolution_y'].',"fonts":[],"pages":[{"id":"lNjvxH3alm","children":[{"id":"cjwX-a3hLN","type":"image","x":1,"y":1,"rotation":0,"opacity":1,"locked":false,"blurEnabled":false,"blurRadius":10,"brightnessEnabled":false,"brightness":0,"sepiaEnabled":false,"grayscaleEnabled":false,"shadowEnabled":false,"shadowBlur":5,"shadowOffsetX":0,"shadowOffsetY":0,"shadowColor":"black","width":'.$file['video']['resolution_x'].',"height":'.$file['video']['resolution_y'].',"src":"'.$thumb.'","cropX":0,"cropY":0,"cropWidth":1,"cropHeight":1,"cornerRadius":0,"flipX":false,"flipY":false,"clipSrc":"","borderColor":"black","borderSize":0}],"background":"white"}]}';
        echo $json; 
     
  }
  public function render_videos(){
    if(!isset($_SESSION['is_login'])){
      return redirect("home/login");
    } 
    $title="Rendered videos - YouProfits";
    $page='render_videos.php';
    $this->load->view("crazyspects/index",["title"=>$title,"page"=>$page]);  
  }
  public function checkrenderlimit(){
    if(!isset($_SESSION['is_login'])){
      echo false;
      exit();
    }  
    include_once(SERVER_PATH.'/plugins/Video_details/getid3/getid3.php');
    $getID3 = new getID3;
    $secondvideo=0;
    $selected_videos=$this->db->where('user_id',$_SESSION['user']['id'])->order_by('sorting_num','asc')->get('select_video');
    foreach($selected_videos->result_array() as $key=>$select_video){
            $upload_video=$this->db->where('id',$select_video['video_id'])->get('upload_video')->result_array();
            if(isset($_SESSION['trim_videos'][$select_video['video_id']])){
             $secondvideo=$secondvideo+round($_SESSION['trim_videos'][$select_video['video_id']]['end_trim']-$_SESSION['trim_videos'][$select_video['video_id']]['start_trim']);
            }else{
             $file = $getID3->analyze(SERVER_PATH.'/uploads/videos/'.$upload_video[0]['url']);
             $secondvideo=$secondvideo+round($file['playtime_seconds']);   
            }
            
            
         }
    if($_SESSION['user']['is_pro']!=1){
    if($_SESSION['user']['is_admin']!=1){
              $before_time=strtotime('-24 hours', time());
              $render_vidos_count=$this->db->query("select * from rendered_videos where time>='{$before_time}' and user_id='{$_SESSION['user']['id']}'")->result_array();
              if(count($render_vidos_count)>=5){
                  echo false;
                  exit();
              }
              $five=60*5;
              if($secondvideo>=$five){
                echo false;
                exit();
              }
          }
    }
    echo true;
  }
    
}

      
