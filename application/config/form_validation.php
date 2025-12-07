<?php
$config = array(
    'auto_creation' => array(
        array(
            'field' => 'razotajs_id',
            'label' => 'Razotajs',
            'rules' => 'required|integer'
        ),
        array(
            'field' => 'uzskaites_datums',
            'label' => 'Uzskaites datums',
            'rules' => 'required|regex_match[/^\d{4}-\d{2}-\d{2}$/]'
        ),
        array(
            'field' => 'registracijas_numurs',
            'label' => 'Registracijas numurs',
            'rules' => 'required|exact_length[6]|regex_match[/^[A-Z]{2}[0-9]{4}$/]' //YYYY-MM-DD
        ),
        array(
            'field' => 'modelis',
            'label' => 'Modelis',
            'rules' => 'required|alpha_numeric_spaces|trim|max_length[255]'
        ),
        array(
            'field' => 'ir_uzskaite',
            'label' => 'Ir uzskaite',
            'rules' => 'integer|in_list[0,1]'
        ),
    ),
    
    'login_auth' => array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|trim|max_length[100]'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|max_length[255]'
        )
    )
);