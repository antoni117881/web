<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Añadir Producto</title>
    <style>
    .form-container {
        max-width: 480px; /* un poco más pequeño */
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
    .form-group input,
    .form-group textarea,
    .form-group select {
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
    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        border-color: #6366f1;
        box-shadow: 0 0 6px rgba(99, 102, 241, 0.4);
        outline: none;
        background-color: #fff;
    }
    .form-group textarea {
        resize: vertical;
        min-height: 90px;
    }
    .submit-button {
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
    .submit-button:hover {
        background: linear-gradient(135deg, #4f46e5, #4338ca);
        transform: translateY(-2px);
        box-shadow: 0 6px 14px rgba(79, 70, 229, 0.5);
    }
    #respuesta {
        margin-top: 14px;
        font-weight: 600;
        font-size: 0.95rem;
        text-align: center;
        min-height: 1.2em;
        font-family: inherit;
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
        .form-group input,
        .form-group textarea,
        .form-group select {
            font-size: 0.9rem;
        }
        .submit-button {
            font-size: 1rem;
            padding: 10px 0;
        }
    }
</style>

</head>
<body>

<div class="form-container">
    <h2>Añadir Nuevo Producto</h2>
    <form id="formProducto" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required />
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" step="0.01" required />
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" min="0" required />
        </div>

        <div class="form-group">
            <label for="categoria">Categoría</label>
            <select name="categoria" id="categoria" required>
                <option value="">Selecciona una categoría</option>
                <option value="Deportivas">Deportivas</option>
                <option value="Elegante">Elegante</option>
                <option value="Lujo">Lujo</option>
            </select>
        </div>

        <button type="submit" class="submit-button">Añadir Producto</button>
    </form>

    <div id="respuesta"></div>
</div>

<script>
document.getElementById('formProducto').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    fetch('controller/producto/guardarProducto_C.php', {
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

</body>
</html>
