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
        $like = mysqli_query($kunloc,"SELECT * FROM log_cheo_like ORDER BY RAND() LIMIT 0,10");
        while($echo = mysqli_fetch_object($like)){
            $account = $echo->account;
            $post = $echo->idpost;
            $user = $echo->username;
            $post_group= json_decode(auto("https://graph.facebook.com/$post/?fields=id,privacy,object_id&method=get&access_token=$token"),true);
            $post_user = json_decode(auto("https://graph.facebook.com/$post/?access_token=$token"),true);  
                if(isset($post_group['id']) && isset($post_group['privacy']['value']) == 'EVERYONE'){
                    foreach($post_group['likes']['data'] as $data){
                           if($data['id'] == $account)
                           {
                                $status = true;
                           } 
                    }
                        
                    if($status == true){
                             echo "Tráng thái: Đã Like <a href='https://facebook.com/$post' style='color:red'>$post</a> - $user"."<br>";
                        }else{
                            echo "Tráng thái: Bỏ Like <a href='https://facebook.com/$post' style='color:red'>$post</a> - $user"."<br>";
                            $check = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM danh_sach_den WHERE username = '$user' AND idpost = '$post'"));
                            if(($check->loai == 'like') && ($check->idpost == $post) && ($check->username == $user) && ($check->account == $account)){
                                 mysqli_query($kunloc,"UPDATE danh_sach_den SET account= '$account' WHERE idpost = '$post' AND username = '$user'");
                            }else{
                                 mysqli_query($kunloc,"INSERT INTO danh_sach_den(idpost, loai, username, account) VALUES ('$post','like','$user','$account')");
                            }
                           
                        } 
                    
                }else if(isset($post_user['id']) || isset($post_user['privacy']['value']) == 'EVERYONE'){
                        foreach($post_user['likes']['data'] as $data){
                           if($data['id'] == $account)
                           {
                                $status = true;
                           } 
                        }
                        
                        if($status == true){
                             echo "Tráng thái: Đã Like <a href='https://facebook.com/$post' style='color:red'>$post</a> - $user"."<br>";
                        }else{
                            echo "Tráng thái: Bỏ Like <a href='https://facebook.com/$post' style='color:red'>$post</a> - $user"."<br>";
                            $check = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM danh_sach_den WHERE username = '$user' AND idpost = '$post'"));
                            if(($check->loai == 'like') && ($check->idpost == $post) && ($check->username == $user) && ($check->account == $account)){
                                 mysqli_query($kunloc,"UPDATE danh_sach_den SET account= '$account' WHERE idpost = '$post' AND username = '$user'");
                            }else{
                                 mysqli_query($kunloc,"INSERT INTO danh_sach_den(idpost, loai, username, account) VALUES ('$post','like','$user','$account')");
                            }
                           
                        }   
                }else{
                   echo "Chưa có like hoặc bài viết không tồn tại - <a href='https://facebook.com/$post' style='color:red'>$post</a>"."<br>";  
                }
          }
    ?>
    <hr>
    <?php 
        $camxuc = mysqli_query($kunloc,"SELECT * FROM log_cheo_camxuc ORDER BY RAND() LIMIT 0,10");
        while($echo = mysqli_fetch_object($camxuc)){
            $account = $echo->account;
            $post = $echo->idpost;
            $user = $echo->username;
            #===========check cảm xúc ==================
            $app = json_decode(auto("https://graph.facebook.com/$post/?access_token=$token"),true);
            $type = mysqli_fetch_assoc(mysqli_query($kunloc,"SELECT loai FROM muacamxuc WHERE idpost = '$post'"))['loai'];
            if(isset($app['likes']['data'])){
             $reactions = json_decode(auto("https://graph.facebook.com/$post/reactions?access_token=$token"),true);
                foreach ($reactions['data'] as $data){
                   if (($data['id'] == $account) && ($data['type'] == $type)) { 
                        $status = true;
                   }
                }
                if($status == true){
                    echo "Tráng thái: Đã Cảm Xúc <a href='https://facebook.com/$post' style='color:red'>$post</a> - $user"."<br>";
                }else{
                        echo "Tráng thái: Bỏ Cảm Xúc <a href='https://facebook.com/$post' style='color:red'>$post</a> - $user"."<br>";
                            $check = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM danh_sach_den WHERE username = '$user' AND idpost = '$post'"));
                            if(($check->loai == 'camxuc') && ($check->idpost == $post) && ($check->username == $user) && ($check->account == $account)){
                                 mysqli_query($kunloc,"UPDATE danh_sach_den SET account= '$account' WHERE idpost = '$post' AND username = '$user'");
                            }else{
                                 mysqli_query($kunloc,"INSERT INTO danh_sach_den(idpost, loai, username, account) VALUES ('$post','camxuc','$user','$account')");
                            }
                    
                }
            }else if(isset($app['object_id'])){
                $reac_group = json_decode(auto("https://graph.facebook.com/$post/reactions?access_token=$token"),true);
                foreach ($reac_group['data'] as $data){
                    if (($data['id'] == $account) && ($data['type'] == $type)) {
                        $status = true;
                    }
                }
                if($status == true){
                    echo "Tráng thái: Đã Cảm Xúc <a href='https://facebook.com/$post' style='color:red'>$post</a> - $user"."<br>";
                }else{
                    echo "Tráng thái: Bỏ Cảm Xúc <a href='https://facebook.com/$post' style='color:red'>$post</a> - $user"."<br>";
                    $check = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM danh_sach_den WHERE username = '$user' AND idpost = '$post'"));
                            if(($check->loai == 'camxuc') && ($check->idpost == $post) && ($check->username == $user) && ($check->account == $account)){
                                 mysqli_query($kunloc,"UPDATE danh_sach_den SET account= '$account' WHERE idpost = '$post' AND username = '$user'");
                            }else{
                                 mysqli_query($kunloc,"INSERT INTO danh_sach_den(idpost, loai, username, account) VALUES ('$post','camxuc','$user','$account')");
                            }
                   
                }
            }else{
               echo "Chưa có cảm xúc hoặc bài viết không tồn tại - <a href='https://facebook.com/$post' style='color:red'>$post</a>"."<br>";  
            }
    }
    ?>
    <hr>
    <?php
        $cmt = mysqli_query($kunloc,"SELECT * FROM log_cheo_cmt ORDER BY RAND() LIMIT 0,10");
        while($echo = mysqli_fetch_object($cmt)){
            $account = $echo->account;
            $post = $echo->idpost;
            $user = $echo->username;
            #===========check cmt group ==================
        $get_cmt = json_decode(auto("https://graph.facebook.com/$post/comments?limit=1000&access_token=$token"),true);
        if(isset($get_cmt['data'])){ 
            foreach ($get_cmt['data'] as $data) { 
                if(($data['from']['id'] == $account) && isset($data['message'])){
                   $status = true;
                }
            }
            if($status == true){
                  echo "Tráng thái: Đã CMT <a href='https://facebook.com/$post' style='color:red'>$post</a> - $user"."<br>";  
            }else{
                 echo "Tráng thái: Bỏ CMT <a href='https://facebook.com/$post' style='color:red'>$post</a> - $user"."<br>";
                    $check = mysqli_fetch_object(mysqli_query($kunloc,"SELECT * FROM danh_sach_den WHERE username = '$user' AND idpost = '$post'"));
                    if(($check->loai == 'cmt') && ($check->idpost == $post) && ($check->username == $user) && ($check->account == $account)){
                         mysqli_query($kunloc,"UPDATE danh_sach_den SET account= '$account' WHERE idpost = '$post' AND username = '$user'");
                    }else{
                          mysqli_query($kunloc,"INSERT INTO danh_sach_den(idpost, loai, username, account) VALUES ('$post','cmt','$user','$account')");
                    }
                   
            }
            
        }else{
		  echo "Chưa có cmt hoặc bài viết không tồn tại - <a href='https://facebook.com/$post' style='color:red'>$post</a>"."<br>";  
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
