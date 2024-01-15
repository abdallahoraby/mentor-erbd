<?php
return [
	'app' => [
		'title' => 'General',
		'desc' => 'All the general settings for application.',
		'icon' => 'fa fa-sunglasses',

		'elements' => [
            [
                'type' => 'url', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'video', // unique name for field
                'label' => 'Video link', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => 'col-md-6 mt-3', // any class for input
                'value' => 'https://api.nilecruisez.com/video/slidervideo.mp4', // default value if you want
            ],
            [
                'type' => 'email', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'email', // unique name for field
                'label' => 'email', // you know what label it is
                'rules' => 'email', // validation rule of laravel
                'class' => 'col-md-6 mt-3', // any class for input
                'value' => '', // default value if you want
            ],
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'phone', // unique name for field
                'label' => 'phone', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => 'col-md-6 mt-3', // any class for input
                'value' => '', // default value if you want
            ],

            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'whatsapp', // unique name for field
                'label' => 'whatsapp', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => 'col-md-6 mt-3', // any class for input
                'value' => '', // default value if you want
            ],
			[
				'type' => 'url', // input fields type
				'data' => 'string', // data type, string, int, boolean
				'name' => 'facebook', // unique name for field
				'label' => 'facebook link', // you know what label it is
				'rules' => '', // validation rule of laravel
				'class' => 'col-md-6 mt-3', // any class for input
				'value' => '', // default value if you want
			],
			[
				'type' => 'url', // input fields type
				'data' => 'string', // data type, string, int, boolean
				'name' => 'twitter', // unique name for field
				'label' => 'twitter link', // you know what label it is
				'rules' => '', // validation rule of laravel
				'class' => 'col-md-6 mt-3', // any class for input
				'value' => 'https://twitter.com/', // default value if you want
			],
			[
				'type' => 'url', // input fields type
				'data' => 'string', // data type, string, int, boolean
				'name' => 'linkedin', // unique name for field
				'label' => 'linkedin link', // you know what label it is
				'rules' => '', // validation rule of laravel
				'class' => 'col-md-6 mt-3', // any class for input
				'value' => 'https://www.linkedin.com/', // default value if you want
			],
			[
				'type' => 'url', // input fields type
				'data' => 'string', // data type, string, int, boolean
				'name' => 'instgram', // unique name for field
				'label' => 'instgram link', // you know what label it is
				'rules' => '', // validation rule of laravel
				'class' => 'col-md-6 mt-3', // any class for input
				'value' => 'https://www.instagram.com/', // default value if you want
			],
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'meta_title', // unique name for field
                'label' => 'meta title', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => 'col-md-12 mt-3', // any class for input
                'value' => '', // default value if you want
            ],

            [
                'type' => 'textarea', // input fields type
                'data' => 'text', // data type, string, int, boolean
                'name' => 'meta_description', // unique name for field
                'label' => 'meta description', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => 'col-md-12 mt-3', // any class for input
                'value' => '', // default value if you want
            ],

            [
                'type' => 'textarea', // input fields type
                'data' => 'text', // data type, string, int, boolean
                'name' => 'emails', // unique name for field
                'label' => 'Emails', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => 'col-md-12 mt-3', // any class for input
                'value' => '', // default value if you want
            ],

            [
                'type' => 'textarea', // input fields type
                'data' => 'text', // data type, string, int, boolean
                'name' => 'header', // unique name for field
                'label' => 'Header', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => 'col-md-12 mt-3', // any class for input
                'value' => '', // default value if you want
            ],

            [
                'type' => 'textarea', // input fields type
                'data' => 'text', // data type, string, int, boolean
                'name' => 'body', // unique name for field
                'label' => 'Body', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => 'col-md-12 mt-3', // any class for input
                'value' => '', // default value if you want
            ],

            [
                'type' => 'textarea', // input fields type
                'data' => 'text', // data type, string, int, boolean
                'name' => 'footer', // unique name for field
                'label' => 'footer', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => 'col-md-12 mt-3', // any class for input
                'value' => '', // default value if you want
            ],

		],
	],

];
