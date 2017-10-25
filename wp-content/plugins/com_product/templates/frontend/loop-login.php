<?php 
    global $zController,$zendvn_sp_settings;     
    $vHtml=new HtmlControl();
    $zController->getController("/frontend","ProductController");     
    if(have_posts()){
        while (have_posts()) {
            the_post();
            echo '<h1 class="title-category">'.get_the_title().'</h1><hr>';
        }
    }
    $msg = "";
    $data=$zController->_data["data"];
    $error=$zController->_data["error"];  
    $success=$zController->_data["success"];      
    if(!empty($error)){
        $msg .= '<ul class="comproduct33">';        
        foreach ($error as $key => $val){
            $msg .= '<li>' . $val . '</li>';
        }
        $msg .= '</ul>';
    }
    else{
        if(!empty($success)){
            $msg .= '<ul class="comproduct35">';        
            foreach ($success as $key => $val){
                $msg .= '<li>' . $val . '</li>';
            }
            $msg .= '</ul>';
        }
    }
    if(!empty($msg))
        echo $msg;     
?>
<form method="post" name="frmLogin">
        <table id="com_product30" class="com_product30" border="0" width="50%" cellpadding="0" cellspacing="0">            
            <tbody>                
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value=""></td>
                </tr>
                <tr>
                    <td>Mật khẩu</td>
                    <td><input type="password" name="password" value=""></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="btnCheckLogin" value="Login" class="com_product32">Đăng nhập</button>&nbsp;&nbsp;
                        <a href="<?php echo $register_member_link; ?>" class="com_product32">Đăng ký</a>
                        <input type="hidden" name="action" value="login" />
                        <?php wp_nonce_field("login",'security_code',true);?>              
                    </td>
                </tr>               
            </tbody>    
                        
                        </table>    
</form>