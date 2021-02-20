<meta charset="utf-8">
<?php
require_once 'config.php';
set_time_limit(0);
#============ token check ==================
$token = mysqli_fetch_assoc(mysqli_query($kunloc,"SELECT token FROM token ORDER BY RAND() LIMIT 0,1"))['token'];
$live = json_decode(auto("https://graph.facebook.com/4?access_token=$token"),true);
$active = $live['id'];
    if(empty($active))
    {
    exit('Token CRON Die Rồi');
    }else if(isset($active)){ 
    ?>
    <?php 
      $share = mysqli_query($kunloc,"SELECT * FROM log_cheo_share ORDER BY RAND() LIMIT 0,10");
        while($echo = mysqli_fetch_object($share)){
            $account = $echo->account;
            $post = $echo->idpost;
            $user = $echo->username;
            #===========check cmt group ==================
        $get_share = json_decode(auto("https://graph.facebook.com/$post/sharedposts?fields=id,from,privacy&access_token=$token"),true);
        if(isset($get_share['data'][0]['id'])){ 
            foreach ($get_share['data'] as $data) { 
                if($data['from']['id'] == $account){
                   $status = true;
                }
            }
            if($status != true){
                    echo "Tráng thái: Bỏ Share <a href='https://facebook.com/$post' style='color:red'>$post</a> - $user"."<br>";
                    $check = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM danh_sach_den WHERE username = '$user' AND idpost = '$post'"));
                    if(($check->loai == 'share') && ($check->idpost == $post) && ($check->username == $user) && ($check->account == $account)){
                         mysqli_query($kunloc,"UPDATE danh_sach_den SET account= '$account' WHERE idpost = '$post' AND username = '$user'");
                    }else{
                          mysqli_query($kunloc,"INSERT INTO danh_sach_den(idpost, loai, username, account) VALUES ('$post','share','$user','$account')");
                    }
            }else{
                    echo "Tráng thái: Đã Share <a href='https://facebook.com/$post' style='color:red'>$post</a> - $user"."<br>";
            }
            
        }else{
		  echo "Chưa có share bài viết <a href='https://facebook.com/$post' style='color:red'>$post</a>"."<br>";  
        }
    }
    ?>
    <hr>
    <?php 
       $sub = mysqli_query($kunloc,"SELECT * FROM log_cheo_sub ORDER BY RAND() LIMIT 0,100");
        while($echo = mysqli_fetch_object($sub)){
            $account = $echo->account;
            $idfb = $echo->idfb;
            $user = $echo->username;
          #===========check sub group ==================
        $get_sub = json_decode(auto("https://graph.facebook.com/$idfb/subscribers?limit=100000&method=GET&access_token=$token"),true);
        if(isset($get_sub['data'][0]['id'])){
            foreach ($get_sub['data'] as $data) { 
                if ($data['id'] == $account) { 
                    $status = true;
                }
                
            }
            if($status != true){
                    echo "Tráng thái: Bỏ sub <a href='https://facebook.com/$idfb' style='color:red'>$idfb</a> - $user"."<br>";
                    $check = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM danh_sach_den WHERE username = '$user' AND idpost = '$idfb'"));
                    if(($check->loai == 'sub') && ($check->idpost == $idfb) && ($check->username == $user) && ($check->account == $account)){
                         mysqli_query($kunloc,"UPDATE danh_sach_den SET account= '$account' WHERE idpost = '$idfb' AND username = '$user'");
                    }else{
                          mysqli_query($kunloc,"INSERT INTO danh_sach_den(idpost, loai, username, account) VALUES ('$idfb','cmt','$user','$account')");
                    }
            }else{
                    echo "Tráng thái: Đã sub <a href='https://facebook.com/$idfb' style='color:red'>$idfb</a> - $user"."<br>";
            }
        }else{
            echo "Chưa có sub nào hoặc ID SUB không công khai - <a href='https://facebook.com/$idfb' style='color:red'>$idfb</a>"."<br>";  
        }
    }
    ?>
<?php
    }
    function auto($url){
    $data = curl_init();
    curl_setopt($data, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($data, CURLOPT_URL, $url);
    $hasil = curl_exec($data);
    curl_close($data);
    return $hasil;
    }
?>
