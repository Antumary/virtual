<?php
	$responses['what is your name'] = "I'm Dia the chatbot";
	// echo "Hello world";
	$responses['tell me about yourself'] = "I am Dia the chatbot. I'm still learning a lot of things so please forgive me if I can't answer you in some cases.";

$responses["fine"] = "Good. I'm happy about that.";
	$responses["i'm fine"] = "Good. I'm happy about that.";
    $responses["i'm good"] = "Good. I'm happy about that.";
    $responses["What is your mission"] ="You can find it in the side bar in home page !";
	 $responses["How to contact you"] =" contact us on : virtualAcademyservice@gmail.com";
	$responses["virtual academy"] = "It is a Learning Portal";
	$responses["courses offered"] ="You can find our courses by clicking  the button courses offered from the sidebar";
    $responses["benefits"]="You can find our benefits by clicking the button benefits from the sidebar";
	$q = $_GET["q"];

	$response = "";

	if ($q != "") {
		# code...
		$q = strtolower($q);
		foreach ($responses as $r => $value) {
			# code...
			if (strpos($r, $q) !== false) {
				# code...
				$response = $value;
			}

		}
	}
	$noresponse = "Sorry I'm still learning. Hence my responses are limited. Ask something else.";
	echo $response === "" ? $noresponse : $response;
?>
