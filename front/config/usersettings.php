<?php

return [
	"email_reminder" => [
	    "description" => "Send me an email when days until expire is:",
        "validator" => "required|numeric",
        "default" => "30"
    ]
];