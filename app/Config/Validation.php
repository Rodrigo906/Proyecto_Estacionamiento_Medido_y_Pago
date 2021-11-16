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

    public $formUsuarioValidation = [

        'username' => [
            'rules' => 'required|is_unique[usuario.username]',
            'errors' => [
                'required' => 'Este campo es obligatorio',
                'is_unique' => 'El usuario ya existe.',
            ],
        ],

        'nombre' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Este campo es obligatorio',
            ],
        ],

        'apellido' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Este campo es obligatorio',
            ],
        ],

        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Este campo es obligatorio',
                'valid_email' => 'Ingrese un email en un formato valido',
            ],
        ],

        'dni' => [
            'rules' => 'required|numeric|exact_length[8]|is_unique[usuario.dni]',
            'errors' => [
                'required' => 'Este campo es obligatorio',
                'numeric' => 'Verifique que su numero de dni no contenga letras',
                'exact_length' => 'Por favor ingrese su dni completo',
                'is_unique' => 'El n° de dni ya se encuentra registrado',
            ],
        ],

        'fecha_nacimiento' => [
            'rules' => 'valid_date',
            'errors' => [
                'valid_date' => 'Ingrese la fecha en formato dd/mm/yyyy',
            ],
        ],

        'contraseña' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Ingrese una contraseña por favor',
            ],
        ],

        'confirmarContraseña' => [
            'rules' => 'required|matches[contraseña]',
            'errors' => [
                'required' => 'Ingrese una contraseña por favor',
                'matches' => 'La confirmacion de contraseña no es correcta, reintentelo por favor',
            ],
        ],
    ];


    public $formVehiculoValidation = [

        'marca' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Este campo es obligatorio',
            ],
        ],

        'patente' => [
            'rules' => 'required|is_unique[vehiculo.patente]',
            'errors' => [
                'required' => 'Este campo es obligatorio',
                'is_unique' => 'Esta patente ya se encuentra registrada en el sistema',
            ],
        ],

    ];

    public $formEstacionarValidation = [

        'patente' => [
            'rules' => 'required|is_unique[vehiculo.patente]',
            'errors' => [
                'required' =>  'Este campo es obligatorio',
                'is_unique' => 'Esta patente aun no se encuentra registrada en el sistema',
            ],
        ],
    ];

    public $formConsultarEstadia = [

        'patente' => [
            'rules' => 'required|is_not_unique[vehiculo.patente]',
            'errors' => [
                'required' =>  'Este campo es obligatorio',
                'is_not_unique' => 'Esta patente aun no se encuentra registrada en el sistema',
            ],
        ],
    ];

    public $formVentaEstadiaValidation = [
        'patente' => [
            'rules' => 'required|is_not_unique[vehiculo.patente]',
            'errors' => [
                'required' => 'Este campo es obligatorio',
                'is_not_unique' => 'Esta patente aun no se encuentra registrada en el sistema',
            ],
        ],

        'zona' => [
            'rules' => 'required|is_not_unique[zona.id_zona]',
            'errors' => [
                'required' =>  'Por favor, seleccione una zona',
                'is_not_unique' => 'Esta patente aun no se encuentra registrada en el sistema',
            ],
        ],



    ];


    public $formLoginValidation = [

        'username' => [
            'rules' => 'required|is_not_unique[usuario.username]',
            'errors' => [
                'required' => 'Este campo es obligatorio',
                'is_not_unique' => 'El nombre de usuario ingresado no existe',
            ],
        ],

        'contraseña' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Este campo es obligatorio',

            ],
        ],
    ];

    public $formActualizacionValidation = [

        'nombre' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Este campo es obligatorio',
            ],
        ],

        'apellido' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Este campo es obligatorio',
            ],
        ],

        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Este campo es obligatorio',
                'valid_email' => 'Ingrese un email en un formato valido',
            ],
        ],

        'fecha_nacimiento' => [
            'rules' => 'valid_date',
            'errors' => [
                'valid_date' => 'Ingrese la fecha en formato dd/mm/yyyy',
            ],
        ],

        'contraseña' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Ingrese una contraseña por favor',
            ],
        ],

        'confirmarContraseña' => [
            'rules' => 'required|matches[contraseña]',
            'errors' => [
                'required' => 'Ingrese una contraseña por favor',
                'matches' => 'La confirmacion de contraseña no es correcta, reintentelo por favor',
            ],
        ],
    ];

    public $formRestablecerContraseñaValidation = [
        'username' => [
            'rules' => 'required|is_not_unique[usuario.username]',
            'errors' => [
                'required' => 'Este campo es obligatorio',
                'is_not_unique' => 'El nombre de usuario ingresado no existe',
            ],
        ],

        'email' => [
            'rules' => 'required|valid_email|is_not_unique[usuario.email]',
            'errors' => [
                'required' => 'Este campo es obligatorio',
                'valid_email' => 'Ingrese un email en un formato valido',
                'is_not_unique' => 'El email ingresado no es correcto',
            ],
        ],
    ];
}
