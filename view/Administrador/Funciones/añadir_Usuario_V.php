<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Añadir Usuario</title>
    <style>
.form-container {
    max-width: 480px;
    margin: 1.5rem auto;
    padding: 20px 24px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

h2 {
    margin-bottom: 1.2rem;
    font-weight: 700;
    color: #222;
    font-size: 1.5rem;
    text-align: center;
}

.form-group {
    margin-bottom: 16px;
}

.form-group label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    color: #444;
    font-size: 0.9rem;
    letter-spacing: 0.02em;
}

.form-control {
    width: 100%;
    padding: 10px 14px;
    border: 1.8px solid #ddd;
    border-radius: 6px;
    font-size: 0.95rem;
    color: #444;
    box-sizing: border-box;
    transition: border-color 0.25s ease, box-shadow 0.25s ease;
    font-weight: 500;
    background-color: #fafafa;
    font-family: inherit;
}

.form-control:focus {
    border-color: #6366f1;
    box-shadow: 0 0 6px rgba(99, 102, 241, 0.4);
    outline: none;
    background-color: #fff;
}

.btn-container {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
    margin-top: 20px;
}

.btn-guardar {
    display: block;
    width: 100%;
    padding: 11px 0;
    background: linear-gradient(135deg, #6366f1, #4f46e5);
    border: none;
    border-radius: 7px;
    font-weight: 700;
    font-size: 1.05rem;
    color: #fff;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
    box-shadow: 0 4px 10px rgba(99, 102, 241, 0.4);
    font-family: inherit;
}



.btn-guardar:hover {
    background: linear-gradient(135deg, #4f46e5, #4338ca);
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(79, 70, 229, 0.5);
}

.required {
    color: red;
    margin-left: 3px;
}

.error-message {
    color: red;
    display: none;
}
    @media (max-width: 480px) {
        .form-container {
            padding: 16px 20px;
            max-width: 95vw;
        }
        h2 {
            font-size: 1.3rem;
        }
        .form-group label {
            font-size: 0.85rem;
        }
        .form-control {
            font-size: 0.9rem;
        }
        .btn-guardar,
        .btn-cancelar {
            font-size: 1rem;
            padding: 10px 0;
        }
    }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Añadir Nuevo Usuario</h2>
    
    <form id="addUserForm" method="POST">
        <div class="form-group">
            <label>Nombre de cuenta<span class="required">*</span></label>
            <input type="text" name="nameAccount" class="form-control" maxlength="12" required>
        </div>

        <div class="form-group">
            <label>Nombre<span class="required">*</span></label>
            <input type="text" name="first_name" class="form-control" maxlength="12" required>
        </div>

        <div class="form-group">
            <label>Apellidos<span class="required">*</span></label>
            <input type="text" name="last_name" class="form-control" maxlength="12" required>
        </div>

        <div class="form-group">
            <label>Email<span class="required">*</span></label>
            <input type="email" name="email" class="form-control" maxlength="20" required>
        </div>

        <div class="form-group">
            <label>Contraseña<span class="required">*</span> (8-12 caracteres)</label>
            <input type="password" name="password" class="form-control" required 
                   minlength="8" maxlength="12" 
                   oninput="validarContraseña(this)">
            <small class="error-message" style="color: red; display: none;">La contraseña debe tener entre 8 y 12 caracteres</small>
        </div>

        <div class="form-group">
            <label>Teléfono</label>
            <input type="tel" name="phone" class="form-control" maxlength="9">
        </div>

        <div class="form-group">
            <label>Dirección</label>
            <input type="text" name="address" class="form-control" maxlength="16">
        </div>

        <div class="form-group">
            <label>Pregunta de seguridad<span class="required">*</span></label>
            <select name="questionList" class="form-control" required>
                <option value="question1">¿Cuál es tu apodo?</option>
                <option value="question2">¿Nombre de tu primera mascota?</option>
                <option value="question3">¿Palabra clave?</option>
            </select>
        </div>

        <div class="form-group">
            <label>Respuesta<span class="required">*</span></label>
            <input type="text" name="response" class="form-control" maxlength="9" required>
        </div>

        <button type="submit" class="btn-guardar">Guardar Usuario</button>
    </form>
</div>

<script>
function validarContraseña(input) {
    const errorMessage = input.parentElement.querySelector('.error-message');
    if (input.value.length < 8 || input.value.length > 12) {
        errorMessage.style.display = 'block';
        input.setCustomValidity('La contraseña debe tener entre 8 y 12 caracteres');
    } else {
        errorMessage.style.display = 'none';
        input.setCustomValidity('');
    }
}

document.getElementById('addUserForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Validar campos requeridos
    const requiredFields = ['nameAccount', 'first_name', 'last_name', 'email', 'password', 'questionList', 'response'];
    for (const field of requiredFields) {
        const input = this.elements[field];
        if (!input.value.trim()) {
            alert('Por favor, complete todos los campos requeridos');
            input.focus();
            return;
        }
    }
    
    // Validar la contraseña
    const password = this.elements['password'];
    if (password.value.length < 8 || password.value.length > 12) {
        alert('La contraseña debe tener entre 8 y 12 caracteres');
        password.focus();
        return;
    }
    
    // Preparar los datos
    const formData = new FormData(this);
    const data = {
        nombre_cuenta: formData.get('nameAccount'),
        nombre: formData.get('first_name'),
        apellidos: formData.get('last_name'),
        email: formData.get('email'),
        contraseña: formData.get('password'),
        direccion: formData.get('address') || '',
        telefono: formData.get('phone') || '',
        pregunta: formData.get('questionList'),
        respuesta: formData.get('response')
    };
    
    console.log('Datos a enviar:', data);
    
    // Enviar los datos
    fetch('../../controller/Usuario/añadirUsuario.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Usuario añadido correctamente');
            window.location.href = '?action=PanelAdmin';
        } else {
            alert('Error: ' + (data.message || 'No se pudo añadir el usuario'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al procesar la solicitud. Por favor, inténtelo de nuevo.');
    });
});
</script>
</body>
</html>
