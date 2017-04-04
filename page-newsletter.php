<?php 
	global $themePrefix;

	if(!empty($_POST)){
		$user = username_exists( $_POST['email'] );
		if(!$user){
			$user = wp_insert_user(array('user_login' => $_POST['email'], 'user_pass' => $themePrefix.'YOU_SHALL_NOT_PASS'.$themePrefix, 'user_email' => $_POST['email'], 'role' => 'newsletter_subscriber'));
			$user_id = wp_insert_user( $userdata ) ;

			if ( !is_wp_error( $user_id ) ) {
			    echo json_encode(array('status'=>'success', 'message'=>'Cadastro realizado.'));
			}
		} else{
			echo json_encode(array('status'=>'success', 'message'=>'Você já está cadastrado.'));
		}
	} else if(!empty($_GET) && $_GET['action'] == 'export'){
		header ( "Content-type: application/vnd.ms-excel" );
		header ( "Content-Disposition: attachment; filename=newsleter_".get_bloginfo('name')."-".date('d_m_Y').".xls" );
		
		$users = get_users(array('role'=>'newsletter_subscriber'));
		echo '<table><tr><th>Nome</th><th>Email</th></tr>';
		foreach ($users as $user) {
			echo '<tr><td>'.$user->display_name.'</td><td>'.$user->user_email.'</td></tr>';
		}
		echo '</table>';
	}
	else{
		echo json_encode(array('status'=>'error', 'message'=>'Parâmetro inválido.'));
	}
?>