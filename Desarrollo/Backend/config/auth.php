<?php

return [

    /*
    |----------------------------------------------------------------------
    | Authentication Defaults
    |----------------------------------------------------------------------
    |
    | Esta opción define el "guardia" de autenticación predeterminado y el
    | "broker" de restablecimiento de contraseñas para tu aplicación.
    | Puedes cambiar estos valores según sea necesario, pero estos valores 
    | son perfectos para la mayoría de las aplicaciones.
    |
    */

    'defaults' => [
        'guard' => 'web',  // Usamos el guardia "web" para sesiones
        'passwords' => 'users',
    ],

    /*
    |----------------------------------------------------------------------
    | Authentication Guards
    |----------------------------------------------------------------------
    |
    | Aquí defines cada guardia de autenticación para tu aplicación.
    | Laravel ha definido una configuración predeterminada que utiliza
    | almacenamiento en sesión y el proveedor de usuarios Eloquent.
    |
    | El guardia web ya está configurado para usar sesiones.
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',  // Usamos el driver "session" para gestionar las sesiones
            'provider' => 'users',  // El proveedor de usuarios que usarás
        ],
    ],

    /*
    |----------------------------------------------------------------------
    | User Providers
    |----------------------------------------------------------------------
    |
    | Todos los guardias de autenticación tienen un proveedor de usuarios,
    | que define cómo se obtienen los usuarios de la base de datos o
    | cualquier otro sistema de almacenamiento utilizado por la aplicación.
    |
    | Usaremos el proveedor de usuarios basado en Eloquent para el modelo User.
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',  // Usamos el driver de Eloquent
            'model' => App\Models\User::class,  // Tu modelo de usuario
        ],
    ],

    /*
    |----------------------------------------------------------------------
    | Restablecimiento de Contraseñas
    |----------------------------------------------------------------------
    |
    | Configuración para el restablecimiento de contraseñas, incluyendo
    | la tabla que usará para almacenar tokens de restablecimiento de
    | contraseñas y el proveedor de usuarios que se usa para obtener usuarios.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',  // Tabla para almacenar tokens de restablecimiento
            'expire' => 60,  // Expiración en minutos
            'throttle' => 60,  // Límite para generar más tokens
        ],
    ],

    /*
    |----------------------------------------------------------------------
    | Tiempo de confirmación de la contraseña
    |----------------------------------------------------------------------
    |
    | Define la cantidad de segundos antes de que expire la ventana
    | de confirmación de la contraseña y los usuarios deben ingresar
    | nuevamente su contraseña para confirmar.
    | Por defecto, esta ventana dura 3 horas.
    |
    */

    'password_timeout' => 10800,  // Tres horas de espera antes de confirmar de nuevo.

];
