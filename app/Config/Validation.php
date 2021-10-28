<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

    public $formValidation = [

        'username' => [
            'rules' => 'required|is_unique[usuario.username]',
            'errors' => [
                'required' => 'El campo "nombre de usuario" es obligatorio.' ,
                'is_unique' => 'El usuario ya existe.' ,
             ],
        ],

        'nombre' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'El campo "nombre" es obligatorio.' ,
             ],
        ],

        'apellido' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'El campo "apellido" es obligatorio.' ,
             ],
        ],

        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'El campo "email" es obligatorio.' ,
                'valid_email' => 'Ingrese un email en un formato valido',
             ],
        ],

        'dni' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'El campo "dni" es obligatorio.' ,
                'numeric' => 'Verifique que su numero de dni no contenga letras',
             ],
        ],

        'fecha_nacimiento' => [
            'rules' => 'required|valid_date[d/m/Y]',
            'errors' => [
                'required' => 'El campo "fecha de nacimiento" es obligatorio.' ,
                'valid_date' => 'Ingrese la fecha en formato dd/mm/yy',
             ],
        ],

        'contraseña' => [
            'rules' => 'required|matches[confirmacionContraseña]',
            'errors' => [
                'required' => 'Ingrese una contraseña por favor' ,
                'matches' => 'La confirmacion de contraseña no es correcta, reintentelo por favor',
             ],
        ],
    ];


    
}
