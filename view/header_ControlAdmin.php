<div class="header_ControlAdmin">
    <div class="Container_Panel">
    <h1>Panel de Administrador</h1>
    <div class= "PanelAdmin">
        <input type="button" onclick="location.href='index.php';" value="Añadir Producto" />
        <input type="button" onclick="location.href='index.php';" value="Editar Producto" />
        <input type="button" onclick="location.href='index.php';" value="Eliminar Producto" />
        <input type="button" onclick="location.href='index.php';" value="Modificar Usuarios" />
        <input type="button" onclick="location.href='index.php';" value="Ver Usuarios" />
    </div>
    </div>

    
</div>
<style>
    .Container_Panel{
        background-color:rgb(61, 68, 82);
        margin-top: 20px;
        padding: 50px;
        border-radius: 10px;
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
        
    }
    </style>