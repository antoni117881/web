<?php
require_once __DIR__ . '/../../../model/Usuario_M.php';
?>

<style>
.form-container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.form-title {
    color: #1a237e;
    text-align: center;
    margin-bottom: 30px;
    font-size: 24px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    color: #333;
    font-weight: 500;
}

.form-control {
    width: 100%;
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
    transition: border-color 0.3s;
}

.form-control:focus {
    border-color: #1a237e;
    outline: none;
    box-shadow: 0 0 0 2px rgba(26,35,126,0.2);
}

.btn-container {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
    margin-top: 30px;
}

.btn-guardar {
    background: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: 500;
    transition: background-color 0.3s;
}

.btn-cancelar {
    background: #f44336;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: 500;
    transition: background-color 0.3s;
}

.btn-guardar:hover {
    background: #45a049;
}

.btn-cancelar:hover {
    background: #da190b;
}

.required {
    color: red;
    margin-left: 3px;
}

.error-message {
    color: red;
    display: none;
}
</style>

<div class="form-container">
    <div class="form-container">
    <h2 class="form-title">Añadir Nuevo Usuario</h2>
    
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

        <div class="btn-container">
            <button type="button" class="btn-cancelar" onclick="cancelar()">Cancelar</button>
            <button type="submit" class="btn-guardar">Guardar Usuario</button>
        </div>
    </form>
</div>

<script>
function cancelar() {
    // Usar POST para volver al panel de administración
    var form = document.createElement('form');
    form.method = 'POST';
    form.action = '?action=PanelAdmin';
    
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'adminAction';
    input.value = 'ver_usuarios';
    
    form.appendChild(input);
    document.body.appendChild(form);
    form.submit();
}

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
            cancelar();
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
