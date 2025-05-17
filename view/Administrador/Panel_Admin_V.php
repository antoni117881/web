<div class="header_ControlAdmin">
    <div class="Container_Panel">
    <h1>Panel de Administrador</h1>
    <div class= "PanelAdmin">
        <input type="button" name="Añadir" onclick="handleButtonClick(this.value);" value="Añadir " />
        <input type="button" onclick="handleButtonClick(this.value);"value="Editar " />
        <input type="button" onclick="handleButtonClick(this.value);" value="Eliminar " />
        <input type="button" onclick="handleButtonClick(this.value);" value="Modificar " />
        <input type="button" onclick="handleButtonClick(this.value);" value="Ver " />
    </div>
    </div>

    
</div>
<script>
    function handleButtonClick(value) {
        console.log("Valor Botón presionado:", value);

        // Guardar en localStorage
        localStorage.setItem('valueButtonPanelAdmin', value);

        // Recuperar (por si quieres usarlo después)
        const savedValue = localStorage.getItem('valueButtonPanelAdmin');
        console.log("Valor guardado:", savedValue);
    }
</script>
<style>
    .Container_Panel{
        background-color:rgb(61, 68, 82);
        padding: 50px;
        text-align: center;
        
        
    }
    .Container_Panel h1{
        color: white;
        font-size: 27px;
    }
    .PanelAdmin{
        /* display: grid;
        justify-content: space-between;
        align-items: center; */
        
    }
    
    .PanelAdmin input{
        cursor: pointer;
       margin-top: 20px;
        padding: 10px;
    }
    .PanelAdmin input:hover{
        background-color:rgb(29, 63, 82);
        color: white;
       
        transform: scale(1.1);
    }
    .header_ControlAdmin{
        display: flex;
        justify-content: center;
        height: 100%;
     
    }
    </style>