<?php

if(isset($_REQUEST['ajaxform'])) {
	$data = $_REQUEST['ajaxform'];

	$labels = array(
		'name' => 'Имя',
		'phone' => 'Номер телефона',
		'email' => 'E-mail',
		'sum' => 'Первоначальный взнос',
		'complectation' => 'Комплектация',
		'customercar' => 'Марка и модель авто покупателя',
		'brand' => 'Марка',
		'model' => 'Модель',
	);

		$to = 'to@to.ru';
		$subject = 'subj';

		$msg = '';
		foreach ($data as $var => $value) {
			if(isset($labels[$var]))
				$msg.=$labels[$var]." : ".$value."\r\n";
			else
				$msg.=$var." : ".$value."\r\n";
		}

		$headers   = array();
		$headers[] = "MIME-Version: 1.0";
		$headers[] = "Content-type: text/plain; charset=utf-8";
		$headers[] = "From: Promo <robot@promo.ru>";
		$headers[] = "Subject: {$subject}";
		$headers[] = "X-Mailer: PHP/".phpversion();

		if(mail($to, $subject, $msg, implode("\r\n", $headers))) {
			echo 1;
		}
		else {
			echo 0;
		}
}
else {
	echo 0;
}

?>