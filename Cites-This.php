<?php  
/* Plugin Name: Cite-This-Post
Description: Adds the possibility of quoting any article in the blog.  
Author: Kirillov Dmitry - (grafchita.ru)
Version: 1.2
Author URI: http://grafchita.ru 
Plugin URI: http://grafchita.ru/blog/category/cites-this/
*/    

// Put functions into one big function we'll call at the plugins_loaded  
// action. This ensures that all required plugin functions are defined.

function get_hello_form1() {
    ?>
    <div class="wrap">
    <h2>Cites This</h2>
    <form method="post" action="options.php">
    <?php wp_nonce_field('update-options'); ?>
    <h3>Add You Twitter</h3>
    <input type="text" name="hello_text_graf" value="<?php echo get_option('hello_text_graf') ?>" /><br /><br />
     <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="hello_text_graf" />
    <input type="submit" name="update" value="Update">
    <h3>Add You First Image</h3>
    <input type="text" name="hello_image_graf" value="<?php echo get_option('hello_image_graf') ?>" /><br /><br />
    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="hello_image_graf" />
    <input type="submit" name="update" value="Update">

    </form>
    </div>
    <? 
} 
function hello_admin_menu(){
    add_options_page('Cites This', 'Cites This', 8, basename(__FILE__), 'get_hello_form1');
}
add_action('admin_menu', 'hello_admin_menu');

function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];
 
  if(empty($first_img)){ //Defines a default image
    $first_img = get_option('hello_image_graf');
  }
  return $first_img;
}

function text_cites() {
echo "<div style=\"float:left;padding:5px;\"><img src=\"";
echo catch_that_image();
echo "\" width=\"100\" alt=\"\" /></div><div style=\"width:350px; padding: 6px; border: solid 1px #456B8F; font: 10px helvetica, verdana, sans-serif; color: #222222; background-color: #ffffff\"><a style=\"font: 13px arial, serif; color: #003399; text-decoration: underline\" href=\"";
echo the_permalink();
echo "\"target=\"_blank\">\n";
echo the_title();
echo "</a><br />\n";
echo the_time(__('F jS, Y', 'DeepMix'));
echo "<br />\n";
echo the_excerpt();
echo "<div align=\"right\" style=\"width:350px\"><p style=\"text-align:right;\">&copy; \n";
echo the_time(__('F jS, Y', 'DeepMix'));
echo " - <a style=\"font: 13px arial, serif; color: #003399; text-decoration: underline\" href=\"";
echo get_settings('home');
echo "\" target=\"_blank\">\n";
echo bloginfo('name');
echo "</a></p></div></div>\n";
}

function text_cites_lj() {
echo "<div style=\"float:left;padding:5px;\"><img src=\"";
echo catch_that_image();
echo "\" width=\"100\" alt=\"\" /></div><div style=\"width:350px; padding: 6px; border: solid 1px #456B8F; font: 10px helvetica, verdana, sans-serif; color: #222222; background-color: #ffffff\"><a style=\"font: 13px arial, serif; color: #003399; text-decoration: underline\" href=\"";
echo the_permalink();
echo "\"target=\"_blank\">\n";
echo the_title();
echo "</a><br />\n";
echo the_time(__('F jS, Y', 'DeepMix'));
echo "<br />\n";
echo the_excerpt();
echo "<div align=\"right\" style=\"width:350px\"><p style=\"text-align:right;\">&copy; \n";
echo the_time(__('F jS, Y', 'DeepMix'));
echo " - <a style=\"font: 13px arial, serif; color: #003399; text-decoration: underline\" href=\"";
echo get_settings('home');
echo "\" target=\"_blank\">\n";
echo bloginfo('name');
echo "</a></p></div></div>\n";
}

function widget_grafchitaru() {
echo "<h3>&#1062;&#1048;&#1058;&#1048;&#1056;&#1054;&#1042;&#1040;&#1058;&#1068; &#1057;&#1058;&#1040;&#1058;&#1068;&#1070; &#1042; &#1057;&#1042;&#1054;&#1045;&#1052; &#1041;&#1051;&#1054;&#1043;&#1045;</h3><strong>&#1057;&#1082;&#1086;&#1087;&#1080;&#1088;&#1086;&#1074;&#1072;&#1090;&#1100; &#1089;&#1086;&#1076;&#1077;&#1088;&#1078;&#1080;&#1084;&#1086;&#1077; &#1086;&#1082;&#1086;&#1096;&#1082;&#1072; &#1080; &#1074;&#1089;&#1090;&#1072;&#1074;&#1080;&#1090;&#1100; &#1074; &#1088;&#1077;&#1078;&#1080;&#1084;&#1077; HTML, &#1074; &#1089;&#1074;&#1086;&#1081; &#1073;&#1083;&#1086;&#1075;.</strong><br /><br /><textarea name=\"textarea\" cols=\"50\" rows=\"2\">\n";
echo text_cites_lj();
echo "</textarea>\n";

echo "<script language=\"JavaScript\">  \n";
echo "  function hide(obj) {  \n";
echo "  if(document.getElementById(obj).style.display == 'block') \n";
echo "  {document.getElementById(obj).style.display = 'none';  \n";
echo "  } \n";
echo "  else \n";
echo "  {document.getElementById(obj).style.display = 'block';  \n";
echo "  } \n";
echo "  }  \n";
echo "  </script>  \n";
echo "  <a onclick=\"hide('sub1')\"><br /><br /><h3><img src=\"/wp-content/plugins/Cites-This/images/eye.jpg\">&#1055;&#1088;&#1086;&#1089;&#1084;&#1086;&#1090;&#1088; &#1094;&#1080;&#1090;&#1072;&#1090;&#1099;</h3></a><br>  \n";
echo "   \n";
echo "  <span id='sub1' style=\"display: none;\">  \n";
echo text_cites();
echo "  </span>  \n";



//knopki
echo "<table><tr><td>\n"; 
//lj
echo "<nobr><noindex><form method=\"post\" action=http://www.livejournal.com/update.bml name=\"updateForm\" rel=\"nofollow\" target=\"_blank\"><div style=\"display:none;visible:false\"><input type=\"text\" maxlength=\"100\" name=\"subject\" id=\"subject\" class=\"text\" size=\"43\" value=\"\n";
echo the_title();
echo "\"/><textarea rows=\"1\" cols=\"1\" name=\"event\">\n";
echo text_cites_lj();
echo "</textarea></div><input type=\"image\" src=\"/wp-content/plugins/Cites-This/images/lj.jpg\" alt=\"&#1042;&#1099; &#1084;&#1086;&#1078;&#1077;&#1090;&#1077; &#1083;&#1077;&#1075;&#1082;&#1086; &#1087;&#1077;&#1088;&#1077;&#1087;&#1086;&#1089;&#1090;&#1080;&#1090;&#1100; &#1101;&#1090;&#1091; &#1094;&#1080;&#1090;&#1072;&#1090;&#1091; &#1074; &#1046;&#1046;. &#1044;&#1083;&#1103; &#1101;&#1090;&#1086;&#1075;&#1086; &#1076;&#1086;&#1089;&#1090;&#1072;&#1090;&#1086;&#1095;&#1085;&#1086; &#1083;&#1080;&#1096;&#1100; &#1085;&#1072;&#1078;&#1072;&#1090;&#1100; &#1085;&#1072; &#1082;&#1085;&#1086;&#1087;&#1082;&#1091; &#1080; &#1086;&#1090;&#1082;&#1088;&#1086;&#1077;&#1090;&#1089;&#1103; &#1085;&#1086;&#1074;&#1086;&#1077; &#1086;&#1082;&#1085;&#1086;.\" title=\"&#1042;&#1099; &#1084;&#1086;&#1078;&#1077;&#1090;&#1077; &#1083;&#1077;&#1075;&#1082;&#1086; &#1087;&#1077;&#1088;&#1077;&#1087;&#1086;&#1089;&#1090;&#1080;&#1090;&#1100; &#1101;&#1090;&#1091; &#1094;&#1080;&#1090;&#1072;&#1090;&#1091; &#1074; &#1046;&#1046;. &#1044;&#1083;&#1103; &#1101;&#1090;&#1086;&#1075;&#1086; &#1076;&#1086;&#1089;&#1090;&#1072;&#1090;&#1086;&#1095;&#1085;&#1086; &#1083;&#1080;&#1096;&#1100; &#1085;&#1072;&#1078;&#1072;&#1090;&#1100; &#1085;&#1072; &#1082;&#1085;&#1086;&#1087;&#1082;&#1091; &#1080; &#1086;&#1090;&#1082;&#1088;&#1086;&#1077;&#1090;&#1089;&#1103; &#1085;&#1086;&#1074;&#1086;&#1077; &#1086;&#1082;&#1085;&#1086;.\" value=\"&#1054;&#1087;&#1091;&#1073;&#1083;&#1080;&#1082;&#1086;&#1074;&#1072;&#1090;&#1100; &#1074; &#1046;&#1046;\"></form></noindex>\n";
echo "</td><td>\n"; 
//twitter
echo "<noindex><a rel=\"nofollow\" target=\"_blank\" href=\"http://twitter.com/home?status=RT @\n";
echo $twittergra;
echo get_option('hello_text_graf');
echo ": \n";
echo the_permalink();
echo " \n";
echo the_title();
echo "\" title=\"&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100; &#1074; Twitter\"><img src=\"/wp-content/plugins/Cites-This/images/twitter.jpg\" alt=\"&#1054;&#1087;&#1091;&#1073;&#1083;&#1080;&#1082;&#1086;&#1074;&#1072;&#1090;&#1100; &#1074; twitter.com\"></a></noindex>\n";
echo "</td><td>\n";

//facebook
echo "<noindex><a rel=\"nofollow\" target=\"blank\" href=\"http://www.facebook.com/sharer.php?u=\n";
echo the_permalink();
echo "\"><img src=\"/wp-content/plugins/Cites-This/images/fb.jpg\" title=\"&#1055;&#1086;&#1076;&#1077;&#1083;&#1080;&#1090;&#1100;&#1089;&#1103; &#1074; Facebook\"></a></noindex>\n";
echo "</td><td>\n"; 
//vkontakte
echo "<noindex><a href=\"http://vkontakte.ru/share.php?url=\n";
echo the_permalink();
echo "\" target=\"_blank\" rel=\"nofollow\"><img src=\"/wp-content/plugins/Cites-This/images/vkontakte.gif\" title=\"&#1055;&#1086;&#1076;&#1077;&#1083;&#1080;&#1090;&#1100;&#1089;&#1103; &#1042;&#1050;&#1086;&#1085;&#1090;&#1072;&#1082;&#1090;&#1077;\"></a></noindex>\n";
echo "</td><td>\n"; 
//moymir
echo "<noindex><a target=\"_blank\" rel=\"nofollow\" href=\"http://connect.mail.ru/share?share_url=\n";
echo the_permalink();
echo "\"><img   src=\"/wp-content/plugins/Cites-This/images/mail.gif\" title=\"&#1055;&#1086;&#1076;&#1077;&#1083;&#1080;&#1090;&#1100;&#1089;&#1103; &#1042; &#1052;&#1086;&#1077;&#1084; &#1052;&#1080;&#1088;&#1077;\"></a></noindex>\n";
echo "</td><td>\n";
//moykrug
echo "<noindex><a target=\"_blank\" rel=\"nofollow\" href=\"http://my.ya.ru/posts_add_link.xml?URL=\n";
echo the_permalink();
echo "&title=\n";
echo the_title();
echo"&body=\n";
echo the_excerpt();
echo "\"><img   src=\"/wp-content/plugins/Cites-This/images/yandex.png\" title=\"&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100; &#1085;&#1072; &#1071;&#1085;&#1076;&#1077;&#1082;&#1089;\"></a></noindex>\n";
echo "</td><td>\n";

//friendfeed
echo "<noindex><a target=\"_blank\" rel=\"nofollow\" href=\"http://www.friendfeed.com/share?title=\n";
echo the_title();
echo the_permalink();
echo "\"><img   src=\"/wp-content/plugins/Cites-This/images/ff.jpg\" title=\"&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100; &#1074; FriendFeed\"></a></noindex>\n";
echo "</td><td>\n";

//liveinternet
echo "<noindex><a target=\"_blank\" rel=\"nofollow\" href=\"http://www.liveinternet.ru/journal_post.php?action=l_add&amp;cnurl=";
echo the_permalink();
echo"&headerofpost=\n";
echo the_title();
echo"&LiNewPostForm=\n";
echo the_excerpt();
echo "\"><img   src=\"/wp-content/plugins/Cites-This/images/liru.gif\" title=\"&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100; &#1074; LiveInternet\"></a></noindex>\n";
echo "</td><td>\n";

//blogger
echo "<noindex><a target=\"_blank\" rel=\"nofollow\" href=\"http://www.blogger.com/blog_this.pyra?t&amp;u=\n";
echo the_permalink();
echo "&amp;n=";
echo the_title();
echo "&amp;a=ADD_SERVICE_FLAG&amp;passive=true&amp;alinsu=0&amp;aplinsu=0&amp;alwf=true&amp;hl=ru&amp;skipvpage=true&amp;rm=false&amp;showra=1&amp;fpui=2&amp;naui=8";
echo "\"><img   src=\"/wp-content/plugins/Cites-This/images/blogger.jpg\" title=\"&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100; &#1074; blogger\"></a></noindex>\n";
echo "</td><td>\n";

//odnoklassniki
echo "<noindex><a href=\"http://www.odnoklassniki.ru/dk?st.cmd=addShare&amp;st.s=0&amp;st._surl=\n";
echo the_permalink();
echo "&title=\n";
echo the_title();
echo "&srcURL=http://grafchita.ru/\" rel=\"nofollow\" target=\"_blank\"><img src=\"/wp-content/plugins/Cites-This/images/odnoklassniki.jpg\" title=\"&#1054;&#1087;&#1091;&#1073;&#1083;&#1080;&#1082;&#1086;&#1074;&#1072;&#1090;&#1100; &#1074; &#1054;&#1076;&#1085;&#1086;&#1082;&#1083;&#1072;&#1089;&#1089;&#1085;&#1080;&#1082;&#1080;\"></a></noindex> \n";
echo "</td><td>\n";
 
//google
echo "<noindex><a href=\"http://www.google.com/reader/link?url=\n";
echo the_permalink();
echo "&title=\n";
echo the_title();
echo "&srcURL=http://grafchita.ru/\" rel=\"nofollow\" target=\"_blank\"><img src=\"/wp-content/plugins/Cites-This/images/Buzz.jpg\" title=\"&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100; &#1074; Google Buzz\"></a></noindex> \n";
echo "</td><tr><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><a style=\"font: 10px arial, serif; color: #003399; text-decoration: underline\" href=\"http://grafchita.ru\">&#1057;&#1075;&#1077;&#1085;&#1077;&#1088;&#1080;&#1088;&#1086;&#1074;&#1072;&#1085;&#1086; &#1087;&#1083;&#1072;&#1075;&#1080;&#1085;&#1086;&#1084; Cites-This-Post</a></td></tr></table>\n";

}
?>