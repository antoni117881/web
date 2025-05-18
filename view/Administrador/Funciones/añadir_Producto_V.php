

<div class="form-container">
    <h2>Añadir Nuevo Producto</h2>
    <form action="?action=guardar" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" min="0" required>
        </div>

        <div class="form-group">
            <label for="categoria">Categoría</label>
            <select name="categoria" id="categoria" required>
                <option value="">Selecciona una categoría</option>
                <option value="Deportivas">Deportivas</option>
                <option value="Elegante">Elegante</option>
                <option value="lujo">Lujo</option>
            </select>
        </div>

      

        <button type="submit" class="submit-button">Añadir Producto</button>
    </form>
</div>
<script>
document.getElementById('formProducto').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    fetch('guardar_producto.php', {
        method: 'POST',
        body: formData
    })
    .then(resp => resp.json())
    .then(data => {
        const mensaje = document.getElementById('respuesta');
        if (data.success) {
            mensaje.innerHTML = `<p style="color:green;">${data.message}</p>`;
            form.reset();
        } else {
            mensaje.innerHTML = `<p style="color:red;">${data.message}</p>`;
        }
    })
    .catch(err => {
        document.getElementById('respuesta').innerHTML = `<p style="color:red;">Error al guardar producto.</p>`;
        console.error(err);
    });
});
</script>
<style>
    .form-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 24px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 12px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        box-sizing: border-box;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        border-color: #4f46e5;
        outline: none;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 100px;
    }

    .submit-button {
        background: linear-gradient(135deg, #4f46e5, #4338ca);
        color: white;
        padding: 12px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        font-size: 1rem;
        width: 100%;
        transition: all 0.3s ease;
    }

    .submit-button:hover {
        background: linear-gradient(135deg, #4338ca, #3b32a6);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
    }

    @media (max-width: 768px) {
        .form-container {
            padding: 16px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .submit-button {
            padding: 10px;
        }
    }
</style>