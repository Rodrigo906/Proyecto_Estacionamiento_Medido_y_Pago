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
            'rules' => 'required|is_unique[vehiculo.patente]|regex_match[/^[A-Z]{3} [0-9]{3}$/]',
            'errors' => [
                'required' => 'Este campo es obligatorio',
                'is_unique' => 'Esta patente ya se encuentra registrada en el sistema',
                'regex_match' => 'Ingrese la patente en formato LLL NNN',
            ],
        ],

        'modelo' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Este campo es obligatorio',
            ],
        ],

    ];

    public $formEstacionarValidation = [

        'patente' => [
            'rules' => 'required',
            'errors' => [
                'required' =>  'Este campo es obligatorio',
            ],
        ],
    ];

    public $formConsultarEstadia = [

        'patente' => [
            'rules' => 'required|is_not_unique[vehiculo.patente]|regex_match[/^[A-Z]{3} [0-9]{3}$/]',
            'errors' => [
                'required' =>  'Este campo es obligatorio',
                'is_not_unique' => 'Esta patente aun no se encuentra registrada en el sistema',
                'regex_match' => 'Ingrese la patente en formato LLL NNN',
            ],
        ],
    ];

    public $formVentaEstadiaValidation = [
        'patente' => [
            'rules' => 'required|is_not_unique[vehiculo.patente]|regex_match[/^[A-Z]{3} [0-9]{3}$/]',
            'errors' => [
                'required' => 'Este campo es obligatorio',
                'is_not_unique' => 'Esta patente aun no se encuentra registrada en el sistema',
                'regex_match' => 'Ingrese la patente en formato LLL NNN',
            ],
        ],

        'zona' => [
            'rules' => 'required|is_not_unique[zona.id_zona]',
            'errors' => [
                'required' =>  'Por favor, seleccione una zona',
                'is_not_unique' => 'Esta patente aun no se encuentra registrada en el sistema',
            ],
        ],

        'cant_horas' => [
            'rules' => 'required',
            'errors' => [
                'required' =>  'Por favor, seleccione una zona',
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


    public $formCargarSaldo = [

        'monto' => [
            'rules' => 'required|decimal',
            'errors' => [
                'required' => 'Este campo es obligatorio',
                'decimal' => 'Solo ingrese valores numericos',
            ],
        ],
        'numero' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Este campo es obligatorio',
                'numeric' => 'Solo ingrese valores numericos',
            ],
        ],
        'codigo_seguridad' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Este campo es obligatorio',
                'numeric' => 'Solo ingrese valores numericos',
            ],
        ],
    ];

    public $formRegistrarInfraccion = [

        'patente' => [
            'rules' => 'required|is_not_unique[vehiculo.patente]|regex_match[/^[A-Z]{3} [0-9]{3}$/]',
            'errors' => [
                'required' =>  'Este campo es obligatorio',
                'is_not_unique' => 'Esta patente aun no se encuentra registrada en el sistema',
                'regex_match' => 'Ingrese la patente en formato LLL NNN',
            ],
        ],

        'motivo' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Este campo es obligatorio',
            ],
        ],

        'fecha' => [
            'rules' => 'required|valid_date',
            'errors' => [
                'required' => 'Este campo es obligatorio',
                'valid_date' => 'Formato de fecha invalido',
            ],
        ],

        'direccion' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Este campo es obligatorio',
            ],
        ],
    ];

    public $formActualizarZona = [
        'precio' => [
            'rules' => 'required|decimal',
            'errors' => [
                'required' => 'Este campo es obligatorio',
                'decimal' => 'Solo ingrese valores numericos',
            ],
        ],

        'horaDesdeManiana' => [
            'rules' => 'required|regex_match[^([0-2][0-9]):([0-6][0-9])$]',
            'errors' => [
                'required' => 'Este campo es obligatorio',
                'regex_match' => 'Formato de hora invalido',
            ],
        ],

        'horaHastaManiana' => [
            'rules' => 'required|regex_match[^([0-2][0-9]):([0-6][0-9])$]',
            'errors' => [
                'required' => 'Este campo es obligatorio',
                'regex_match' => 'Formato de hora invalido',
            ],
        ],

        'horaDesdeTarde' => [
            'rules' => 'required|regex_match[^([0-2][0-9]):([0-6][0-9])$]',
            'errors' => [
                'required' => 'Este campo es obligatorio',
                'regex_match' => 'Formato de hora invalido',
            ],
        ],

        'horaHastaTarde' => [
            'rules' => 'required|regex_match[^([0-2][0-9]):([0-6][0-9])$]',
            'errors' => [
                'required' => 'Este campo es obligatorio',
                'regex_match' => 'Formato de hora invalido',
            ],
        ],
    ];


}
