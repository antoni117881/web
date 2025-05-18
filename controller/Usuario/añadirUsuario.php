<?php
// Evitar cualquier salida antes del encabezado
ob_start();

require_once __DIR__ . '/../../model/Usuario_M.php';
require_once __DIR__ . '/../../model/conection_BD.php';

header('Content-Type: application/json');

try {
    // Habilitar todos los errores
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    $raw = file_get_contents("php://input");
    error_log("Datos recibidos: " . $raw);
    
    try {
        // Decodificar el JSON recibido
        $data = json_decode(file_get_contents('php://input'), true);
        
        if (!$data) {
            throw new Exception('No se recibieron datos');
        }

        // Validar nombre de cuenta
        if (empty($data['nombre_cuenta'])) {
            throw new Exception('El campo Nombre de Usuario no puede estar vacío.');
        } elseif (strlen($data['nombre_cuenta']) < 4 || strlen($data['nombre_cuenta']) > 12) {
            throw new Exception('El nombre de la cuenta debe tener entre 4 y 12 caracteres.');
        }

        // Validar contraseña
        if (empty($data['contraseña'])) {
            throw new Exception('El campo Contraseña no puede estar vacío.');
        } elseif (strlen($data['contraseña']) < 8 || strlen($data['contraseña']) > 12) {
            throw new Exception('La contraseña debe tener entre 8 y 12 caracteres.');
        }

        // Validar apellidos
        if (empty($data['apellidos'])) {
            throw new Exception('El campo Apellido no puede estar vacío.');
        } elseif (strlen($data['apellidos']) < 4 || strlen($data['apellidos']) > 12) {
            throw new Exception('El apellido debe tener entre 4 y 12 caracteres.');
        }

        // Validar nombre
        if (empty($data['nombre'])) {
            throw new Exception('El campo Nombre no puede estar vacío.');
        } elseif (strlen($data['nombre']) < 4 || strlen($data['nombre']) > 12) {
            throw new Exception('El nombre debe tener entre 4 y 12 caracteres.');
        }

        // Validar email
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception('El correo electronico debe tener un formato valido: Ejemplo..@gmail.com');
        }

        // Validar dirección
        if (!empty($data['direccion']) && (strlen($data['direccion']) < 8 || strlen($data['direccion']) > 16)) {
            throw new Exception('La direccion debe tener entre 8 y 16 caracteres.');
        }

        // Validar teléfono
        if (!empty($data['telefono']) && strlen($data['telefono']) !== 9) {
            throw new Exception('El número de teléfono debe tener exactamente 9 dígitos.');
        }

        // Validar pregunta
        if (empty($data['pregunta'])) {
            throw new Exception('Tiene que elegir una pregunta');
        }

        // Validar respuesta
        if (empty($data['respuesta'])) {
            throw new Exception('Tienes que rellenar el campo de Respuesta');
        } elseif (strlen($data['respuesta']) > 8) {
            throw new Exception('Solo puede introducir 8 caracteres');
        }

        // Obtener conexión usando el singleton
        $conection = DB::getInstance();

        // Verificar si el email ya existe
        $usuario = new Usuario_M();
        if ($usuario->emailExists($conection, $data['email'])) {
            throw new Exception('El email ya está registrado');
        }

        error_log("========== INICIO DEBUG ===========");
        error_log("Datos recibidos del formulario: " . print_r($data, true));
    
        // Preparar los datos para insertar
        $userData = [
            'nombre_cuenta' => $data['nombre_cuenta'],
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'email' => $data['email'],
            'contraseña' => password_hash($data['contraseña'], PASSWORD_DEFAULT),
            'telefono' => $data['telefono'] ?? '',
            'direccion' => $data['direccion'] ?? '',
            'pregunta' => $data['pregunta'],
            'respuesta' => $data['respuesta']
        ];
        
        error_log("Datos preparados para inserción:");
        error_log(print_r($userData, true));
        
        try {
            // Intentar añadir el usuario usando addUser
            $result = $usuario->addUser($conection, $userData);
            
            if ($result === true) {
                $response = [
                    'success' => true,
                    'message' => 'Usuario añadido correctamente'
                ];
            } else {
                throw new Exception('Error al añadir el usuario');
            }
        } catch (PDOException $e) {
            error_log("Error PDO: " . $e->getMessage());
            $response = [
                'success' => false,
                'message' => 'Error en la base de datos: ' . $e->getMessage()
            ];
        } catch (Exception $e) {
            error_log("Error general: " . $e->getMessage());
            $response = [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
        
        error_log("========== FIN DEBUG ===========");
    } catch (PDOException $e) {
        error_log("Error PDO completo: " . $e->getMessage());
        error_log("Código de error: " . $e->getCode());
        error_log("Traza: " . $e->getTraceAsString());
        throw new Exception($e->getMessage());
    }
    
} catch (Exception $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

// Limpiar cualquier salida previa
ob_end_clean();

// Enviar respuesta JSON
echo json_encode($response);
exit;
